<?php 
	require_once 'Classes/Container.php';
	require_once 'Classes/ContainerDao.php';

	$numero = $_GET['numero'];
	
	$contDao = new ContainerDao();
	$container = new Container();
	$container = $contDao->buscarUm($numero);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
	<title>Cadastrar Contêiner</title>
</head>
<body>
	<section class="my-5" style="padding-left: 50px;">
		<div class="container" style="max-width: 50%;">
			<div class="container my-5">
				<h2 class="is-size-4">Preencha os campos abaixo:</h2>
			</div>
			<form action="Classes/salvar.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $container->getId();?>">
				<div class="field">
					<label class="label">Cliente:</label>
					<div class="control">
						<input class="input is-two-thirds" type="text" id="cliente" name="cliente" required placeholder="Descrição do Cliente" value="<?php echo $container->getCliente();?>">
					</div>
				</div>
				<div class="field">
					<label class="label">Número:</label>
					<div class="control">
						<input class="input is-two-thirds" type="text" id="numero" name="numero"  required placeholder="Ex.: CONT1234567" value="<?php echo $container->getNumero();?>">
					</div>
				</div>
				<div class="is-flex">
					<div class="field">
						<label class="label">Tipo:</label>
						<div class="control">
							<div class="select">
      							<select id="tipo" name="tipo">
      								<option selected="selected" value="<?php echo $container->GetTipo();?>"><?php echo $container->GetTipo();?></option>
        							<option value="20">20</option>
        							<option value="40">40</option>
      							</select>
    						</div>
						</div>
					</div>
					<div class="field mx-2">
						<label class="label">Status:</label>
						<div class="control">
							<div class="select">
      							<select id="status" name="status">
      								<option  value="<?php echo $container->GetStatus();?>"><?php echo $container->GetStatus();?></option>
        							<option value="Vazio">Vazio</option>
        							<option value="Cheio">Cheio</option>
      							</select>
    						</div>
						</div>
					</div>
					<div class="field mx-2">
						<label class="label">Categoria:</label>
						<div class="control">
							<div class="select">
      							<select id="categoria" name="categoria">
      								<option selected="selected" value="<?php echo $container->GetCategoria();?>"><?php echo $container->GetCategoria();?></option>
        							<option value="Importação">Importação</option>
        							<option value="Exportação">Exportação</option>
      							</select>
    						</div>
						</div>
					</div>
				</div>
				<div class="field is-grouped">
  					<div class="control">
    					<button type="submit" class="button is-link" name="editar_cont">Salvar</button>
  					</div>
  					<div class="control">
    					<a class="button is-link is-light" href="index.php">Voltar</a>
  					</div>
				</div>
			</form>
		</div>
	</section>
</body>
</html>