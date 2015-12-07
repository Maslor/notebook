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
$sigma = new sigmaConnect();

$sigma->connect();
$sigma->submitSQLquery("SELECT userid FROM utilizador ORDER BY userid ASC;");

echo("<h3>Choose a User:</h3>");
echo("<table border=\"0\" cellspacing=\"10\">\n"); foreach($sigma->getResult() as $row)
{
    echo("<tr>\n");
    echo("<td><a href=\"userMenu.php?userid={$row['userid']}\">Choose</a></td>\n");
    echo("<td>{$row['userid']}</td>\n");
    echo("</tr>\n");
}
echo("</table>\n");
$sigma->disconnect();
?>

</body>
</html>