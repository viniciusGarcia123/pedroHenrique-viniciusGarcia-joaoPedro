<?php
    $nome = strip_tags($_POST['nome']); 
    $usuario = strip_tags($_POST['usuario']); 
    $senha = strip_tags($_POST['senha']); 
    $senha2 = strip_tags($_POST['senha2']); 
    $senhac = sha1($senha);
    $senhac2 = sha1($senha2);
    $erro = 0;
    
$mensagem1="";
$mensagem2="";
$mensagem3="";
$mensagem4="";
$mensagem5="";

    if (empty($nome) or strlen($nome)<4){
        $mensagem1 = "Digite o nome corretamente<br>";
        $erro = 1;
    }
    
    if (empty($usuario) or strlen($nome)<4){
        $mensagem2 = "Digite um nome de usuário válido<br>";
        $erro = 1;
    }
    
    if(empty($senha)||strlen($senha)<4){
        $mensagem3 = "Digite uma senha válida<br>";
        $erro = 1;
    }
    if(empty($senha2)||strlen($senha2)<4){
        $mensagem4 = "Digite uma senha válida<br>";
        $erro = 1;
    }
    if( $senhac !=$senhac2 ){
        $mensagem5 = "Senhas não conferem! Tente novamente!<br>";
        $erro = 1;
    }
    if ($erro==0){
        include "criar.php";
        insereUsuario($nome,$senhac,$usuario,$email);
        $mensagem = "Cadastrado com sucesso.";
    }else{
        $mensagem = $mensagem1.$mensagem2.$mensagem3.$mensagem4.$mensagem5.$mensagem6;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href=cadastro.css>
    <?php include "topo.php"; ?>
</head>
<body>
<article>
    <p>
    <?php echo "$mensagem"?>
    </p>
</article>
    <footer>
        <?php include "footerzin.php"; ?>
    </footer>
</body>
</html>