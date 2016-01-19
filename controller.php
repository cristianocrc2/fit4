<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	include_once 'nfe/bootstrap.php';
	use NFePHP\NFe\ToolsNFe;
	
	if(isset($_POST['password']) && $_POST['password'] == "senha"){ //Se estiver setada e correta a senha de upload
		$uploaddir = 'C:\\xampp\\htdocs\\cristiano\\fit4\\nfe\\enviadas'; //Instancia variavel com o destino do arquivo
		if(!is_dir($uploaddir)){ //Se não existe
			mkdir($uploaddir); //Cria o destino
		}

		$uploadfile = $uploaddir ."\\". basename($_FILES['xml']['name']); //Contrói o namespace completo do file

		if (move_uploaded_file($_FILES['xml']['tmp_name'], $uploadfile)) { //Se conclui o upload
		    
			$nfe = new ToolsNFe('../../config/config.json');
			$nfe->setModelo('55');

			$aResposta = array();
			$chave = '35150258716523000119550010000000091000000090';
			$tpAmb = '2';
			$aXml = file_get_contents("/var/www/nfe/homologacao/assinadas/$chave-nfe.xml");
			$idLote = '';
			$indSinc = '0';
			$flagZip = false;
			$retorno = $nfe->sefazEnviaLote($aXml, $tpAmb, $idLote, $aResposta, $indSinc, $flagZip);
			echo '<br><br><PRE>';
			echo htmlspecialchars($nfe->soapDebug);
			echo '</PRE><BR>';
			print_r($aResposta);
			echo "<br>";


		} else {
		    echo "Possível ataque de upload de arquivo!\n";
		}
	}