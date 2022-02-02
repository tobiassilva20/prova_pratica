<?php 
	
		require_once 'Conexao.php';
		require_once 'Container.php';
		require_once 'ContainerDao.php';
		require_once 'Movimentacao.php';
		require_once 'MovimentacaoDao.php';

	if(isset($_POST['salvar_cont'])){
		$cliente = $_POST['cliente'];
		$numero = $_POST['numero'];
		$tipo = $_POST['tipo'];
		$status = $_POST['status'];
		$categoria = $_POST['categoria'];

		$container = new Container();

		$container->setCliente($cliente);
		$container->setNumero($numero);
		$container->setTipo($tipo);
		$container->setStatus($status);
		$container->setCategoria($categoria);
		$contDao = new ContainerDao();
		$contDao->salvar($container);
	}

	if(isset($_POST['salvar_mov'])){
		$tipo = $_POST['tipo'];
		$dataInicio = $_POST['inicio'];
		$dataTermino = $_POST['termino'];

		$movimentacao = new Movimentacao();

		$movimentacao->setTipo($tipo);
		$movimentacao->setDataInicio($dataInicio);
		$movimentacao->setDataTermino($dataTermino);

		$movDao = new MovimentacaoDao();
		$movDao->salvar($movimentacao);
	}

	if(isset($_POST['editar_cont'])){

		$id = $_POST['id'];
		$cliente = $_POST['cliente'];
		$numero = $_POST['numero'];
		$tipo = $_POST['tipo'];
		$status = $_POST['status'];
		$categoria = $_POST['categoria'];

		$container = new Container();

		$container->setId($id);
		$container->setCliente($cliente);
		$container->setNumero($numero);
		$container->setTipo($tipo);
		$container->setStatus($status);
		$container->setCategoria($categoria);
		$contDao = new ContainerDao();
		$contDao->alterar($container);
	}

	if(isset($_POST['editar_mov'])){

		$id = $_POST['id'];
		$tipo = $_POST['tipo'];
		$dataInicio = $_POST['inicio'];
		$dataTermino = $_POST['termino'];

		$movimentacao = new Movimentacao();

		$movimentacao->setId($id);
		$movimentacao->setTipo($tipo);
		$movimentacao->setDataInicio($dataInicio);
		$movimentacao->setDataTermino($dataTermino);

		$movDao = new MovimentacaoDao();
		$movDao->alterar($movimentacao);
	}

 ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
	<title>Document</title>
</head>
<body>
<script type="text/javascript">
	alert("Salvo com sucesso!");
</script>
<div class="container my-5"><a class="button is-info" href="../index.php">Ir ao início</a></div>
</body>
</html>