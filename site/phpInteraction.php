<?php
/**
 * Created by PhpStorm.
 * User: Maslor
 * Date: 06/12/15
 * Time: 19:17
 */

$host="db.ist.utl.pt";	// o MySQL esta disponivel nesta maquina
$user="ist178081";	// -> substituir pelo nome de utilizador
$password="TagusFTW";	// -> substituir pela password (dada pelo mysql_reset, ou atualizada pelo utilizador)
$dbname = $user;	// a BD tem nome identico ao utilizador

$connection = new PDO("mysql:host=" . $host. ";dbname=" . $dbname, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

echo("<p>Connected to MySQL database $dbname on $host as user $user</p>\n");

$connection = null;

echo("<p>Connection closed.</p>\n");

?>

<!DOCTYPE html>
<html>
    <head></head>
    <body></body>
</html>