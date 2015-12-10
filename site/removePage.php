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
$pagecounter = $_REQUEST['pagecounter'];

$sigma->submitSQLquery("UPDATE pagina SET ativa=false WHERE userid='$userid' AND pagecounter='$pagecounter'");

$sigma->disconnect();

header("Location: http://web.ist.utl.pt/ist178081/site/userPageMenu.php?userid=$userid"); /* Redirect browser */
exit();
?>
