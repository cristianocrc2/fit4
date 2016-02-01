<!DOCTYPE html>
<html>
	<head>
		<title>Transmissão NFE FIT4</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- JQUERY -->
		<script type="text/javascript" src="assets/js/jquery-2.1.4.js"></script>

		<!-- OPEN -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">

		<!-- BOOTSTRAP -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css">
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>

		<!-- DEFAULT -->
		<link rel="stylesheet" type="text/css" href="assets/css/default.css">
		<script type="text/javascript" src="assets/js/default.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h1>Nota Fiscal Eletrônica - FIT4</h1>
				</div>
				<div class="col-lg-6 col-md-6 panel panel-default">
				<h3>Transmissão</h3>
					<div class="upload_div">
						<form method="post" action="controller.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="file">XML File</label>
								<input type="hidden" name="password" value="senha">
								<input type="hidden" name="function" value="transmissao">
								<input type="file" name="xml" id="xml"><br />
								<input type="submit" name="submit" value="Enviar Nota" class="btn btn-default">
							</div>
						</form>						
					</div> <!-- UPLOAD DIV -->
				</div>	<!-- COL-LG-6 COL-MD-6 -->	
				<div class="col-lg-6 col-md-6 panel panel-default">
					<h3>Pedido de inutilização</h3>
					<form method="post" action="controller.php">
					<input type="hidden" name="function" value="inutilizacao">
					<input type="hidden" name="password" value="senha">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label for="ano">Ano</label>
									<input type="text" id="ano" name="ano" class="form-control">
								</div>
							</div>
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label for="serie">Série</label>
									<input type="text" id="serie" name="serie" value="1" class="form-control">
								</div>
							</div>
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label for="ininmr">Número Inicial</label>
									<input type="text" id="ininmr" name="ininmr" class="form-control">
								</div>
							</div>
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label for="fimnmr">Número Final</label>
									<input type="text" id="fimnmr" name="fimnmr" class="form-control">
								</div>
							</div>
							<div class="col-lg-9 col-md-9">
								<div class="form-group">
									<label for="justificativa">Justificativa</label>
									<textarea id="justificativa" name="justificativa" class="form-control"></textarea>
								</div>
							</div>
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<input type="submit" value="Enviar Pedido" class="btn btn-warning" style="margin-top: 20px;">
								</div>
							</div>
						</div>
					</form>
				</div> <!-- COL-LG-6 COL-MD-6 -->		
			</div> <!-- ROW -->
		</div> <!-- CONTAINER -->
	</body>
</html>
