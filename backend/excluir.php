<?php
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents("php://input"));

$id = $_POST["id"];
$bd = $_POST["bd"];



// var_dump($_POST);
// exit;

$servername = "localhost";
$username = "pmecomne_labaci";
$password = "8Ji3d4I15ouU";
$dbname = "pmecomne_labaci";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM '$bd' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Item excluído com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>