<?php   
        if (isset($_SESSIONf['usuario'])){ 
            echo "<article class='comentario'>
                  <form method='post' action='Comentario.php' style='width:290px; height:25px'>
                    Nome: <input type='hidden' name='nome' value=".$_COOKIE['usuario']."/>".$_COOKIE['usuario']."<br/>
                    Comentário: <textarea name='comentario' style='width:286px; height:120px'></textarea><br/>
                    <input type='submit' name='submit' value='Enviar Comentário' />
                </form>
                </article>";
                }else{
        
            echo "<article class='comentario'>
                <form method='post' action='Comentario.php' style='width:290px; height:25px'>
                    Nome: <input type='text' name='nome' /><br/>
                    Email: <input type='email' name='email'/><br/>
                    Comentário: <textarea name='comentario' style='width:286px; height:120px'></textarea><br/>
                    <input type='submit' name='submit' value='Enviar Comentário' />
                </form>
                </article>";
        }
        
        function comentario($control){
            include "conectar.php";
           $sql ="SELECT nome,comentario FROM comentarios WHERE controle=".$control;
        $resultado =mysqli_query($conexao,$sql or die("Não foi possível executar a SQL: ".mysqli_error()));
        if($resultado){
            while($row = mysqli_fech_array($resultado){
             echo $row['nome']." : ".$row['comentario'];
            }    
        }
    }
?>