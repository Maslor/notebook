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

$sigma->submitSQLquery("UPDATE tipo_registo SET ativo=false WHERE userid='$userid' AND typecnt='$typecnt'");

$sigma->disconnect();

header("Location: http://web.ist.utl.pt/ist178081/site/userRegMenu.php?userid=$userid"); /* Redirect browser */
exit();
?>
