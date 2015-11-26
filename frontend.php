<html>
<title>Notebook</title>
<body>
<h1>Pages</h1>
<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ist178081';

$conn = new sqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
	exit('Connection failed: ' . $conn->connect_error);
}

$query = 'SELECT * FROM pagina';
$result = $conn->squery($query);

$jsonArray = array();

if($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
		$jsonArrayItem = array();
		$jsonArrayItem['label'] = $row['nome'];
		$jsonArrayItem['value'] = $row['userid'];
	}
}

$conn->close();
header('Content-type: application/json');

echo json_encode($jsonArray);
