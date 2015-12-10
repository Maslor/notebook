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

$sigma->submitSQLquery("SELECT max(pagecounter) as pagecounter FROM pagina");
$maxPageCounter=$sigma->getResult();
$sigma->submitSQLquery("SELECT max(idseq) as idseq FROM pagina");
$maxPageIdSeq=$sigma->getResult();

foreach($maxPageCounter as $row)
{
    $newPageCounter = $row['pagecounter'] + 1;
}

foreach($maxPageIdSeq as $row)
{
    $newPageIdSeq = $row['idseq'] + 1;
}

$sigma->submitSQLquery("INSERT INTO sequencia (userid, contador_sequencia, moment) VALUES ('$userid', '$newPageIdSeq', now())");
$sigma->submitSQLquery("INSERT INTO pagina (userid, pagecounter, nome, idseq, ativa) VALUES ('$userid', '$newPageCounter', '$name', '$newPageIdSeq', true)");

$sigma->disconnect();

header("Location: http://web.ist.utl.pt/ist178081/site/userPageMenu.php?userid=$userid"); /* Redirect browser */
exit();

?>

