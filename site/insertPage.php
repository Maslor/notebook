<html>
<body>
<h3>New Page for User <?=$_REQUEST['userid']?></h3>
<form action="newPageBackend.php" method="post">
    <p><input type="hidden" name=""
              value="<?=$_REQUEST['account_number']?>"/></p>
    <p>New Page name: <input type="text" name="nome"/></p>
    <p><input type="submit" value="Submit"/></p>
</form>
</body>
</html>