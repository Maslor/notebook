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

$sigma->submitSQLquery("DELETE FROM pagina WHERE userid='$userid' AND pagecounter='$pagecounter'");

$sigma->disconnect();


?>
