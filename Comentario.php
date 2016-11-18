<?php 
include "conectar.php";
$nome = strip_tags($_POST['nome']);
$email= strip_tags($_POST['email']);
$comentario = strip_tags($_POST['comentario']);

$resultado = mysqli_query($conexao, "INSERT INTO comentarios (nome,email,comentario) VALUES ('".$nome."','".$email
."','".$comentario."')") or die("Não foi possível executar a SQL: ".mysqli_error($conexao));
      if($resultado === TRUE){
            echo "<br/>Usuário inserido com sucesso!";
      } else {
            echo "<br/>Erro na inserção!";
      }
      // fechamento da conexão   
      mysqli_close($conexao);
?>

