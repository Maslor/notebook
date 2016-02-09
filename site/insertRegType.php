<?php
/**
 * Created by PhpStorm.
 * User: Maslor
 * Date: 10/12/15
 * Time: 02:26
 */

include("sigmaConnect.php");
$sigma = new sigmaConnect();
$sigma->connect();

$userid=$_REQUEST['userid'];
$name=$_REQUEST['name'];

try {
    $sigma->startTransaction();
    $sigma->submitSQLquery("SELECT max(typecnt) as typecnt FROM tipo_registo");
    $sigma->commitTransaction();
}catch (Exception $e) {
    echo($e->getMessage());
    $sigma->rollbackTransaction();
}
$maxTypeCnt=$sigma->getResult();

try {
    $sigma->startTransaction();
    $sigma->submitSQLquery("SELECT max(contador_sequencia) as contador_sequencia FROM sequencia");
    $sigma->commitTransaction();
}catch (Exception $e) {
    echo($e->getMessage());
    $sigma->rollbackTransaction();
}
$maxIdSeq=$sigma->getResult();

foreach($maxTypeCnt as $row)
{
    $newRegTypeCnt = $row['typecnt'] + 1;
}

foreach($maxIdSeq as $row)
{
    $newIdSeq = $row['contador_sequencia'] + 1;
}

echo $userid, $newIdSeq, $name, $newRegTypeCnt;

try {
    $sigma->startTransaction();
    $sigma->submitSQLquery("INSERT INTO sequencia (userid, contador_sequencia, moment) VALUES ('$userid', '$newIdSeq', now())");
    $sigma->submitSQLquery("INSERT INTO tipo_registo (userid, typecnt, nome, idseq, ativo) VALUES ('$userid', '$newRegTypeCnt', '$name', '$newIdSeq', true)");
    $sigma->commitTransaction();
} catch (Exception $e) {
    echo($e->getMessage());
    $sigma->rollbackTransaction();
}

$sigma->disconnect();

header("Location: http://web.ist.utl.pt/ist178081/site/userRegMenu.php?userid=$userid"); /* Redirect browser */
exit();

?>

