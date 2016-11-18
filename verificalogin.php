<?php
	$name = strip_tags($_POST['usuario']);
    $senhac = sha1(strip_tags($_POST['senha']));
    
    // conctando ao BD
    include "conectar.php";
	$query="SELECT * from usuarios WHERE (usuario=? AND senha=?)";
	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "ss", $name, $senhac);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $id, $nome, $usuario, $senha, $email,$foto);
		mysqli_stmt_fetch($stmt);
		if ($usuario == $name && $senha == $senhac) {
			session_start();
            $_SESSION['usuario'] = $name;
			header('location:login.php');
		}	  
		else {
			echo  "<script>alert('Dados não conferem!');</script>";
			$varia = 10;
			 if($varia == 10){
			 	header('location:login.php');
			 }
		}
		mysqli_stmt_close($stmt);
	} else {
		echo "Falha no statment";
	}
	mysqli_close($conexao);
?>