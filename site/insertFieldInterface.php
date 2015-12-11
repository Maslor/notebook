<html>
<head>
    <title>Notebook</title>
</head>
<body>

<form action="insertField.php?userid=<?=$_REQUEST['userid']?>&typecnt=<?=$_REQUEST['typecnt']?>" method="post">
    <p>New Field Name: <input type="text" name="name"/></p>
    <p><input type="submit" value="Submit"/></p>
</form>
</body>
</html>