<html>
<body>
<h3>New Page <?=$_REQUEST['userid']?></h3>
<form action="newPageBackend.php" method="post">
    <p><input type="hidden" name=""
              value="<?=$_REQUEST['account_number']?>"/></p>
    <p>New balance: <input type="text" name="balance"/></p>
    <p><input type="submit" value="Submit"/></p>
</form>
</body>
</html>