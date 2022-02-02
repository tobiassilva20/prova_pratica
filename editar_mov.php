<?php 
	require_once 'Classes/Movimentacao.php';
	require_once 'Classes/MovimentacaoDao.php';

	$id = $_GET['id'];
	
	$movDao = new MovimentacaoDao();
	$movimentacao = new Movimentacao();
	$movimentacao = $movDao->buscarUma($id);
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
	<title>Cadastrar Movimentações</title>
</head>
<body>
	<section class="my-5" style="padding-left: 50px;">
		<div class="container" style="max-width: 50%;">
			<div class="container my-5">
				<h2 class="is-size-4">Preencha os campos abaixo:</h2>
			</div>
			<form action="Classes/salvar.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $movimentacao->getId();?>">
				<div class="field">
					<label class="label">Tipo:</label>
					<div class="control">
						<input class="input is-two-thirds" type="text" name="tipo" required placeholder="Descrição da Movimentação" value="<?php echo $movimentacao->getTipo();?>">
					</div>
				</div>
				
				<div class="is-flex">
					<div class="field">
						<label class="label">Data e hora de início:</label>
						<div class="control">
							<input class="input is-two-thirds" type="datetime-local" name="inicio" required value="<?php echo date('Y-m-d\TH:i', strtotime($movimentacao->getDataInicio())); ?>" disabled>
							<input class="input is-two-thirds" type="hidden" name="inicio" required value="<?php echo date('Y-m-d\TH:i', strtotime($movimentacao->getDataInicio())); ?>">
						</div>
					</div>
					<div class="field mx-5">
						<label class="label">Data e hora de termíno</label>
						<div class="control">
						<input class="input is-two-thirds" type="datetime-local" name="termino" required value="<?php echo date('Y-m-d\TH:i', strtotime($movimentacao->getDataTermino()));?>">
					</div>
					</div>
				</div>
				<div class="field is-grouped">
  						<div class="control">
    						<button class="button is-link" name="editar_mov">Salvar</button>
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