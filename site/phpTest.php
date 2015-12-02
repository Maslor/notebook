
<?php

$host="db.ist.utl.pt";	// o MySQL esta disponivel nesta maquina
$user="ist178081";	// -> substituir pelo nome de utilizador
$password="TagusFTW";	// -> substituir pela password (dada pelo mysql_reset, ou atualizada pelo utilizador)
$dbname = $user;	// a BD tem nome identico ao utilizador

$connection = new PDO("mysql:host=" . $host. ";dbname=" . $dbname, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

echo("<p>Connected to MySQL database $dbname on $host as user $user</p>\n");

$example = 'example';
$wellArray = array (
    'Arrays are a lot of fun.',
    'Bootstrap is an amazing development tool to use with PHP',
    'With bootstrap you can quickly code and design beautiful websites'
);
$connection = null;

echo("<p>Connection closed.</p>\n");

echo("<p>Test completed successfully.</p>\n");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHP in HTML Example</title>

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>
<h1>Short code <?=$example;?></h1>
<? foreach($wellArray as $well) {
    print "<div>$well</div>";
}
?>
</body>
</html>