

<?php
$servername = "localhost";
$username = "pmecomne_labaci";
$password = "8Ji3d4I15ouU";
$dbname = "pmecomne_labaci";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM vaiabrirempresa ORDER BY id";
$result = $conn->query($sql);


$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Abra sua empresa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Abra sua empresa</h2>
  <p>Exclua um registro utiizando o botão "Excluir" em Ações.</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Tipo de empresa</th>
        <th>Terá funcionários</th>
        <th>Previsão de faturamento</th>
        <th>Ramo de atividade</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
  
        <?php 
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["tipodeempresa"] . "</td>";
                echo "<td>" . $row["terafuncionarios"] . "</td>";
                echo "<td>" . $row["previsaodefaturamento"] . "</td>";
                echo "<td>" . $row["ramodeatividade"] . "</td>";
                echo "<td><button onclick='excluir(". $row["id"] .")'>Excluir</button></td>";
                  echo "</tr>";
                
            }
        } else {
            echo "0 results";
        }
        
        ?>
      
    </tbody>
  </table>
</div>

<script>
function excluir(id){
    
    console.log(id)
    
    $.post("https://4pme.com/clientes/labaci/form/api/excluir.php", {
        id: id,
        bd: "vaiabrirempresa"
    }, function(result){
        console.log(result)
        location.reload();
    });
};
</script>
</body>
</html>
