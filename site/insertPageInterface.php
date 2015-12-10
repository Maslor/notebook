<html>
<head>
    <title>Notebook</title>
</head>
<body>

<form action="insertPage.php?userid=<?=$_REQUEST['userid']?>" method="post">
    <p>New Page Name: <input type="text" name="name"/></p>
    <p><input type="submit" value="Submit"/></p>
</form>
</body>
</html>