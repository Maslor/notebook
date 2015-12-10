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

include("sigmaConnect.php");
$userid=$_REQUEST['userid'];

$userRegsQuery="SELECT typecounter, regcounter, nome FROM registo WHERE userid='$userid' AND ativo=true;";
$userRegsTypesQuery="SELECT typecnt, nome FROM tipo_registo WHERE userid='$userid' AND ativo=true;";

$sigma = new sigmaConnect();

$sigma->connect();
$sigma->submitSQLquery($userRegsQuery);
$userRegsResult=$sigma->getResult();
$sigma->submitSQLquery($userRegsTypesQuery);
$userRegsTypesResult=$sigma->getResult();

echo("<h3>Registries that belong to user $userid:</h3>");
echo("<table border=\"0\" cellspacing=\"10\">\n"); foreach($userRegsResult as $row)
{
    echo("<tr>\n");
    echo("<td><a href=\"regMenu.php?userid={$row['nome']}\">Choose</a></td>\n");
    echo("<td>{$row['nome']}</td>\n");
    echo("<td><a href=\"removeRegistry.php?userid=$userid&regcounter={$row['regcounter']}&typecounter={$row['typecounter']}\">Remove Registry</a></td>\n");
    echo("</tr>\n");
}
echo("</table>\n");

echo("<h3>Registry Types that belong to user $userid:</h3>");
echo("<table border=\"0\" cellspacing=\"10\">\n"); foreach($userRegsTypesResult as $row)
{
    echo("<tr>\n");
    echo("<td><a href=\"regTypeMenu.php?userid={$row['nome']}\">Choose</a></td>\n");
    echo("<td>{$row['nome']}</td>\n");
    echo("<td><a href=\"removeRegType.php?userid=$userid&typecnt={$row['typecnt']}\">Remove Registry Type</a></td>\n");
    echo("</tr>\n");
}
echo("</table>\n");
$sigma->disconnect();
?>

</body>
</html>