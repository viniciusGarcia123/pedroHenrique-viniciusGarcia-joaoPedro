<?php

function salva($tam, $nome, $arquivo)
{
    $retorno = false;
    
    //Define tamanho e tipos aceitos
    $tipos_aceitos = array("image/x-png","image/png", "image/jpeg", "image/gif", "image/bmp");

    //Validação do arquivo recebido
    if($arquivo['error'] != 0) //diferente de zero quer dizer que teve erro
    {
        switch($arquivo['error'])
        {
            //tamanho maior que o php suporta
            case UPLOAD_ERR_INI_SIZE:
                echo "Erro! O Arquivo excede o tamanho máximo permitido";
                exit;
                break;

            //tamanho maior que o definido no formulário
            case UPLOAD_ERR_FORM_SIZE:
                echo "Erro! Arquivo muito grande.";
                exit;
            break;

            //aqruivo não chegou completo
            case  UPLOAD_ERR_PARTIAL:
                echo "Erro! Envio não concluído.";
                exit;
            break;

            //não enviou arquivo
            case UPLOAD_ERR_NO_FILE:
                echo "Erro! Você não enviou um arquivo.";
                exit;
            break;	
        }

    } else {

        //verifica se o arquivo tem o tipo permitido
        if(array_search($arquivo['type'],$tipos_aceitos)===FALSE) {
            echo "Erro! Tipo de dados não permitido.<br/>
                    Utilize apenas JPG, PNG, BMP ou GIF".$arquivo['type'];
            exit;
        }

        //verifica se o arquivo é vazio
        if($arquivo['size']==0 OR $arquivo['tmp_name']==NULL) {
            echo "Erro! Arquivo vazio.";
            exit;
        }

        //Tamanho maior que o permitido
        if($arquivo['size']>$tam) {
            echo "Erro! Arquivo maior que o permitido.";
            exit;
        }

        //diz onde será salvo
        if (!file_exists('img/usuarios/'.$nome)) {
            mkdir('img/usuarios/'.$nome, 0777, true);
        }
        $destino = 'img/usuarios/'.$nome.'/' . $arquivo['name'];

        //move o temporário para o destino e verifica se tudo está ok
        if(  move_uploaded_file($arquivo['tmp_name'],$destino)  ) {
            $retorno = true;
        }
        else {
            echo "Erro ao salvar o arquivo.";
        }

    }
    return $retorno;
}

?>