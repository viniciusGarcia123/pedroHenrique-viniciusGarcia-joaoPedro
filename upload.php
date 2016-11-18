            <?php
            $arquivo = $_FILES['ARQUIVO'];
			$tamanho_maximo=$_POST['MAX_SIZE_FILE'];		

			$tipos_aceitos = array(	"image/gif",
									"image/png",
									"image/bmp",
									"image/jpeg");
									
			if($arquivo['error'] != 0) {
				echo '<p style="font-weight:bold;color:red">Erro no Upload do arquivo<br>';
				switch($arquivo['error']) {
				case  UPLOAD_ERR_INI_SIZE:
					echo 'O Arquivo excede o tamanho máximo permitido.';
					break;
				case UPLOAD_ERR_FORM_SIZE:
					echo 'O Arquivo enviado é muito grande.';
					break;
				case  UPLOAD_ERR_PARTIAL:
					echo 'O upload não foi completo.';
					break;
				case UPLOAD_ERR_NO_FILE:
					echo 'Nenhum arquivo foi informado para upload.';	
					break;
				}
				echo '</p>';
				exit;
			}
			if($arquivo['size']==0 OR $arquivo['tmp_name']==NULL) {
				echo '<p style="font-weight:bold;color:red">Nenhum arquivo enviado.</p>';
				exit;
			}
			if($arquivo['size']>$tamanho_maximo) {
				echo '<p style="font-weight:bold;color:red">O Arquivo enviado é muito grande
					(Tamanho Máximo = ' . $tamanho_maximo . ' bytes).</p>';
				exit;
			}
			if(array_search($arquivo['type'],$tipos_aceitos)===FALSE) {
				echo '<p style="font-weight:bold;color:red">O Arquivo enviado é do tipo (' . 
						$arquivo['type'] . ') não aceito para upload. 
						Os tipos aceitos são:	</p>';
				echo '<pre>';
				print_r($tipos_aceitos);
				echo '</pre>';
				exit;
			}
			
			
			if (!file_exists('imagem')) {
							mkdir('imagem', 0777, true);
						}
			$destino = 'imagem/' . $arquivo['name'];
			if(move_uploaded_file($arquivo['tmp_name'],$destino)) {
				// Tudo Ok, mostramos os dados
				echo "<img id='perfil' src='$destino' border=0>";
			}
			else {
				echo '<p style="font-weight:bold;color:red">Ocorreu um erro durante o upload</p>';
			}
		?>