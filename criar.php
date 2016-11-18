<?php
  function insereUsuario($nome, $senha, $usuario,$email){
      // conctando ao BD
      include "conectar.php";

      // executando a operação de SQL
      $resultado = mysqli_query($conexao, "INSERT INTO usuarios(nome,usuario,senha,email) VALUES ('".$nome."','".$usuario."','".$senha."','".$email."')") or die("Não foi possível executar a SQL: ".mysqli_error($conexao));
      if($resultado === TRUE){
            echo "<br/>Usuário inserido com sucesso!";
      } else {
            echo "<br/>Erro na inserção!";
      }
      // fechamento da conexão   
      mysqli_close($conexao);
  }
?>
