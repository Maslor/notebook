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
$typecounter = $_REQUEST['typecounter'];
$regcounter = $_REQUEST['regcounter'];

try {
    $sigma->startTransaction();
    $sigma->submitSQLquery("UPDATE registo SET ativo=false WHERE userid='$userid' AND regcounter='$regcounter' AND typecounter='$typecounter';");
    $sigma->commitTransaction();
}catch (Exception $e) {
    echo($e->getMessage());
    $sigma->rollbackTransaction();
}

$sigma->disconnect();

header("Location: http://web.ist.utl.pt/ist178081/site/userRegMenu.php?userid=$userid"); /* Redirect browser */
exit();
?>
