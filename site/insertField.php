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
$typecnt=$_REQUEST['typecnt'];

$sigma->submitSQLquery("SELECT max(campocnt) as campocnt FROM campo");
$maxFieldCnt=$sigma->getResult();
$sigma->submitSQLquery("SELECT max(contador_sequencia) as contador_sequencia FROM sequencia");
$maxIdSeq=$sigma->getResult();

foreach($maxFieldCnt as $row)
{
    $newFieldCnt = $row['campocnt'] + 1;
}

foreach($maxIdSeq as $row)
{
    $newIdSeq = $row['contador_sequencia'] + 1;
}

echo $userid . "\n";
echo $typecnt . "\n";
echo $newFieldCnt . "\n";
echo $name . "\n";
echo $newIdSeq . "\n";


$sigma->submitSQLquery("INSERT INTO sequencia (userid, contador_sequencia, moment) VALUES ('$userid', '$newIdSeq', now())");
$sigma->submitSQLquery("INSERT INTO campo (userid, typecnt, campocnt, nome, idseq, ativo) VALUES ('$userid', '$typecnt', '$newFieldCnt', '$name', '$newIdSeq', true)");

$sigma->disconnect();

#header("Location: http://web.ist.utl.pt/ist178081/site/userRegMenu.php?userid=$userid"); /* Redirect browser */
#exit();

?>

