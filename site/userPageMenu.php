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
$sigma = new sigmaConnect();

$userPagesQuery="SELECT pagecounter, nome FROM pagina WHERE userid='$userid' AND ativa=true;";
$sigma->connect();
$sigma->submitSQLquery($userPagesQuery);
$userPagesResult=$sigma->getResult();



echo("<h3>Pages that belong to user $userid:</h3>");
echo("<h4><a href=\"insertPage.php?userid=$userid\">Insert a new Page</a></h4>");
echo("<table border=\"0\" cellspacing=\"10\">\n"); foreach($userPagesResult as $row)
{
    echo("<tr>\n");
    echo("<td><a href=\"pageMenu.php?userid=$userid&page_counter={$row['pagecounter']}&page_name={$row['nome']}\">Choose</a></td>\n");
    echo("<td>{$row['nome']}</td>\n");
    echo("<td><a href=\"removePage.php?userid=$userid&pagecounter={$row['pagecounter']}\">Remove Page</a></td>\n");
    echo("</tr>\n");
}
echo("</table>\n");
$sigma->disconnect();

?>

</body>
</html>

