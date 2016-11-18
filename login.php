<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href=estiloform.css>
    <?php include "topo.php"; ?>
</head>
<body>
<article>
       <?php
       if (isset($_SESSION['usuario'])){
           echo' <p>Olá'.$_SESSION['usuario'].'"</p> 
           <form method="POST" enctype="multipart/form-data" action="upload.php">
			<fieldset>
				<legend>Upload de arquivos</legend>
				<label for="arquivos">Arquivo: </label>
				<input type="hidden" name="MAX_SIZE_FILE" value="100000"> <br />
				<input type="file" name="ARQUIVO" id="arquivo"> <br />
				<input type="submit" value="Enviar o arquivo">
			</fieldset>';
			
       }else{
            echo "<form action='verificalogin.php' method='POST'>
			 <p><label for='login'>Login</label></p>
				<p><label for='nome'>Nome:</label><input type='text' name='usuario' id='usuariot' required /></p>
				<p><label for='senha'>Senha:</label><input type='password' name='senha' id='senha' required/></p>
				<p><a href='form.php'>Nao possui conta cadastre-se aqui.</a></p>
				<p><input type='submit' value='ENVIAR'></p>
		</form>";
       }
       ?>
</article>
    <footer>
        <?php include "footerzin.php"; ?>
    </footer>
</body>
</html>