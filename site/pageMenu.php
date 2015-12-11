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
$page=$_REQUEST['pagecounter'];
$name=$_REQUEST['page_name'];
$sigma = new sigmaConnect();

$pageRegistriesQuery="select registo.nome from registo cross join reg_pag
where ativo=true
	and registo.userid = reg_pag.userid
    and registo.typecounter = reg_pag.typeid
    and registo.regcounter = reg_pag.regid
    and pageid='$pagecounter'";
$sigma->connect();
$sigma->submitSQLquery($userPagesQuery);
$pageRegistriesResult=$sigma->getResult();

echo("<h3>Page $name registries:</h3>");
echo("<h3>$pageRegistriesResult</h3>");

echo("<table border=\"0\" cellspacing=\"10\">\n"); foreach($pageRegistriesResult as $row)
{
    echo("<tr>\n");
    echo("<td>{$row['nome']}</td>\n");
    echo("<td><a href=\"removePage.php?userid=$userid&pagecounter={$row['pagecounter']}\">Remove Page</a></td>\n");
    echo("</tr>\n");
}
echo("</table>\n");

$sigma->disconnect();
?>

</body>
</html>

