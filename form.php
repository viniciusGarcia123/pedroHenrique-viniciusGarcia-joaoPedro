<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href=estiloform.css>
    <?php include "topo.php"; ?>
</head>
<body>
<article>
        <form action="cadastro.php" method="POST">
            <p><label for="nome">Nome:</label><input type="text" name="nome" id="nome" required/></p.>
            <p><label for="usuario">Nome de Usuário:<input type="text" name="usuario" id="usuario"></label></p>
            <p><label for="senha">Senha:</label><input type="password" name="senha" id="senha" maxlength="8" required/></p>
            <p><label for="senha2">Repita a senha:</label><input type="password" name="senha2" id="senha2" maxlength="8" required/>*</p>
            
            <input type="submit" value="Enviar" name="enviar" id="botao">
        </form>
</article>
    <footer>
        <?php include "footerzin.php"; ?>
    </footer>
</body>
</html>