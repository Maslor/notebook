<html>
<head>
    <title>Notebook</title>

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Maslor
 * Date: 06/12/15
 * Time: 19:17
 */

$userid = $_REQUEST['userid'];
$OPTIONS = ['Paginas', 'Registos'];

echo("<h3>Menu do utilizador $userid </h3>\n");
echo("<h4>$OPTIONS[0]<a href=\"userPageMenu.php?userid=$userid\">Choose</a></h4>\n");
echo("<h4>$OPTIONS[1]<a href=\"userRegMenu.php?userid=$userid\">Choose</a></h4>\n");

?>

</body>
</html>