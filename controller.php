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
		    
			$nfe = new ToolsNFe('C:/xampp/htdocs/cristiano/fit4/nfe/config.json');
			$nfe->setModelo('55');
			

			// ========================= TRANSMISSÃO SEFAZ =====================

			$tpAmb = '2'; //tipo de ambiente (Homologação)
			$aResposta = array(); // Instancia um array de respostas			
			$aXml = file_get_contents($uploadfile); //Pega o arquivo xml
			$idLote = '';
			$indSinc = '0';
			$flagZip = false;
			$retorno = $nfe->sefazEnviaLote($aXml, $tpAmb, $idLote, $aResposta, $indSinc, $flagZip); //Se comunica com a sefaz
			$numero_recibo = $aResposta['nRec']; //Recebe o numero do recibo

			//========================== CONSULTA RETORNO (RECIBO) ==============

			$tpAmb = '2'; //tipo de ambiente (Homologação)
			$aRespostaRecibo = array();
			$recibo = $numero_recibo;
			$retorno = $nfe->sefazConsultaRecibo($recibo, $tpAmb, $aRespostaRecibo); //envia o recibo para receber protocolo
			$protocolo = $aRespostaRecibo['nRec']; //recebe numero do protocolo

			//============================ ADICIONA PROTOCOLO AO XML ============== 
			
			$aRespostaProtocolo = array();

			$pathNFefile = $uploadfile; //Caminho para o xml
			$pathProtfile = 'C:/xampp/htdocs/cristiano/fit4/enviadas/homologacao/temporarias/'.date("Ym").'/'.$protocolo.'-retConsReciNFe.xml'; //Caminho para o protocolo
			$saveFile = true;
			$retorno = $nfe->addProtocolo($pathNFefile, $pathProtfile, $saveFile); //Adiciona o protocolo a xml
			$string = $retorno; //Recebe o xml protocolado

			header('Content-type: text/plain');
			header('Content-Length: ' . strlen( $string ) ); 													//EFETUA O DOWNLOAD
			header('Content-Disposition: attachment; filename="NFe-FIT4-'.md5(uniqid(rand(), true)).'.xml"');

			echo $string;
	
			




		} else {
		    echo "Possível ataque de upload de arquivo!\n";
		}
	}