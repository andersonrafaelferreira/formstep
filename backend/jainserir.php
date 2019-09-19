<?php
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents("php://input"));

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$cnpj = $_POST["cnpj"];
$nomedaempresa = $_POST["nomedaempresa"];
$ndeempregados = $_POST["ndeempregados"];
$faturamentomensal = $_POST["faturamentomensal"];
$tipodeinstituicao = $_POST["tipodeinstituicao"];


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

if(strlen($cnpj) == 0){
    $insert = "INSERT INTO jatemempresa (nome, email, telefone)
    VALUES ('$nome', '$email', '$telefone')";
    
    if ($conn->query($insert) === TRUE) {
        echo "Step 1 - OK";
    } else {
        echo "Error: " . $insert . "<br>" . $conn->error;
    }
}else{
    $update = "UPDATE jatemempresa SET cnpj='$cnpj', nomedaempresa='$nomedaempresa', ndeempregados='$ndeempregados', faturamentomensal='$faturamentomensal', tipodeinstituicao='$tipodeinstituicao' WHERE email='$email'";
    if ($conn->query($update) === TRUE) {
        echo "Sucesso!";
    } else {
        echo "Erro ao gravar dados: " . $conn->error;
    }
}

$conn->close();
?>