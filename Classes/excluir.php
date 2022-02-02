<?php 
		require_once 'Conexao.php';
		require_once 'Container.php';
		require_once 'ContainerDao.php';
		require_once 'Movimentacao.php';
		require_once 'MovimentacaoDao.php';	
		
		session_start();
		
		if(isset($_GET['id1'])){
			$id1 = $_GET['id1'];
			$contDao = new ContainerDao();
			$contDao->excluir($id1);
		}
		if(isset($_GET['id2'])){
			$id2 = $_GET['id2'];
			$movDao = new MovimentacaoDao();
			$movDao->excluir($id2);
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
	alert("Deletado com sucesso!");
</script>
<div class="container my-5"><a class="button is-info" href="../index.php">Ir ao início</a></div>
</body>
</html>