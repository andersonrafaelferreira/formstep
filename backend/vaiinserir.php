<?php
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents("php://input"));

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$tipodeempresa = $_POST["tipodeempresa"];
$terafuncionarios = $_POST["terafuncionarios"];
$previsaodefaturamento = $_POST["previsaodefaturamento"];
$ramodeatividade = $_POST["ramodeatividade"];

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

if(strlen($tipodeempresa) == 0){
    $insert = "INSERT INTO vaiabrirempresa (nome, email, telefone)
    VALUES ('$nome', '$email', '$telefone')";
    
    if ($conn->query($insert) === TRUE) {
        echo "Step 1 - OK";
    } else {
        echo "Error: " . $insert . "<br>" . $conn->error;
    }
}else{
    $update = "UPDATE vaiabrirempresa SET tipodeempresa='$tipodeempresa', terafuncionarios='$terafuncionarios', previsaodefaturamento='$previsaodefaturamento', ramodeatividade='$ramodeatividade' WHERE email='$email'";
    if ($conn->query($update) === TRUE) {
        echo "Sucesso!";
    } else {
        echo "Erro ao gravar dados: " . $conn->error;
    }
}

// $sql = "INSERT INTO vaiabrirempresa (nome, email, telefone)
// VALUES ('$nome', '$email', '$telefone')";

// if ($conn->query($sql) === TRUE) {
//     echo var_dump($_POST);
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>