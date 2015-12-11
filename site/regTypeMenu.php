<html>
<head>
    <title>Notebook</title>

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
</head>

<?php
/**
 * Created by PhpStorm.
 * User: Maslor
 * Date: 07/12/15
 * Time: 23:37
 */

include("sigmaConnect.php");
$userid=$_REQUEST['userid'];
$typecnt=$_REQUEST['typecnt'];
$regTypeName=$_REQUEST['name'];

$regTypeFieldsQuery="SELECT campo.nome, campocnt FROM campo CROSS JOIN tipo_registo WHERE campo.ativo=true AND tipo_registo.ativo=true AND campo.userid=tipo_registo.userid AND campo.typecnt=tipo_registo.typecnt AND campo.userid='$userid' AND campo.typecnt='$typecnt'";
$sigma = new sigmaConnect();

$sigma->connect();
$sigma->submitSQLquery($regTypeFieldsQuery);
$regTypeFieldsResult=$sigma->getResult();

echo("<h3>Fields that belong to Registry Type $regTypeName:</h3>");
echo("<table border=\"0\" cellspacing=\"10\">\n"); foreach($regTypeFieldsResult as $row)
{
    echo("<tr>\n");
    echo("<td>{$row['nome']}</td>\n");
    echo("<td><a href=\"removeField.php?userid=$userid&typecnt=$typecnt&name=$regTypeName&campocnt={$row['campocnt']}\">Remove Field</a></td>\n");
    echo("</tr>\n");
}
echo "</table>\n";
echo("<h4><a href=\"insertFieldInterface.php?userid=$userid&typecnt=$typecnt\">Insert a new Field</a></h4>");
$sigma->disconnect();
echo("</table>\n");
