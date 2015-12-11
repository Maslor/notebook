<?php
/**
 * Created by PhpStorm.
 * User: Maslor
 * Date: 10/12/15
 * Time: 00:21
 */

include("sigmaConnect.php");
$sigma = new sigmaConnect();
$sigma->connect();

$userid = $_REQUEST['userid'];
$typecnt = $_REQUEST['typecnt'];
$campocnt = $_REQUEST['campocnt'];
$name = $_REQUEST['name'];

echo $userid . "\n";
echo $typecnt . "\n";
echo $name . "\n";
echo $campocnt . "\n";

$sigma->submitSQLquery("UPDATE campo SET ativo=false WHERE userid='$userid' AND typecnt='$typecnt' AND campocnt='$campocnt'");

$sigma->disconnect();

header("Location: http://web.ist.utl.pt/ist178081/site/regTypeMenu.php?userid=$userid&name=$name&typecnt=$typecnt"); /* Redirect browser */
exit();
?>
