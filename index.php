<?php
		require_once 'Classes/Conexao.php';
		require_once 'Classes/Container.php';
		require_once 'Classes/ContainerDao.php';
		require_once 'Classes/Movimentacao.php';
		require_once 'Classes/MovimentacaoDao.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Controle Portuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
	<script src="https://use.fontawesome.com/ba7e4828e1.js"></script>
	
</head>
<body>
	<div class="container is-info my-5">
		<h1 class="is-size-4">SISTEMA DE CONTROLE PORTUÁRIO</h1>
	</div>
	<section class="container my-5">
		<div class="tabs is-boxed is-medium">
  <ul>
    <li class="tab is-active" onclick="openTab(event,'conteineres')">
      <a>
        <span class="icon is-small"><i class="fa fa-cubes" aria-hidden="true"></i></span>
        <span>Contêineres</span>
      </a>
    </li>
    <li class="tab" onclick="openTab(event,'movimentacao')">
      <a>
        <span class="icon is-small"><i class="fa fa-truck" aria-hidden="true"></i></span>
        <span>Movimentações</span>
      </a>
    </li>
    <li class="tab" onclick="openTab(event,'relatorios')">
      <a>
        <span class="icon is-small"><i class="fa fa-file-text" aria-hidden="true"></i></span>
        <span>Relátorios</span>
      </a>
    </li>
  </ul>
</div>
</section>

	<section class="my-5 content-tab" id="conteineres">
		
		<div class="container">
			<div class="container is-info">
				<h1 class="is-size-4">Contêineres Cadastrados</h1>
			</div>
			<table class="table is-striped is-bordered">
				<thead>
					<tr>
						<td>Cliente:</td>
						<td>Número:</td>
						<td>Tipo:</td>
						<td>Status:</td>
						<td>Categoria:</td>
						<td>Ações:</td>
					</tr>
				</thead>
				<tbody>

					<?php 
						$contDao = new ContainerDao();

						if(!empty($contDao->buscarTodos())){
							foreach ($contDao->buscarTodos() as $container) {
						
					 ?>
					<tr>
						<td><?php echo $container['cliente'];?> </td>
						<td><?php echo $container['numero'];?> </td>
						<td><?php echo $container['tipo'];?> </td>
						<td><?php echo $container['status'];?> </td>
						<td><?php echo $container['categoria'];?> </td>
						<td><a class="has-text-red" href="editar_cont.php?numero=<?php echo $container['numero'];?>"><i class="fa fa-pencil fa-2x" aria-hidden="true" style="color: #f1c40f;"></i></a>-
							<a href="Classes/excluir.php?id1=<?php echo $container['id'];?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style=" color: red;"></i></a>
						</td>		
					</tr>

					<?php 
						}
					}

					?>
				</tbody>

			</table>
			<div><a class="button is-primary" href="novo.php">Incluir</a></div>
		</div>

	</section>

	<section class="my-5  content-tab" id="movimentacao" style="display: none;">
		<div class="container" >
			<div class="container is-info">
				<h1 class="is-size-4">Movimentações Cadastradas</h1>
			</div>
			<table class="table is-striped is-bordered">
				<thead>
					<tr>
						<td>Tipo:</td>
						<td>Data_Início:</td>
						<td>Data_Término:</td>
						<td>Ações:</td>
						
					</tr>
				</thead>
				<tbody>

					<?php 
						$movDao = new MovimentacaoDao();

						if(!empty($movDao->buscarTodos())){
							foreach ($movDao->buscarTodos() as $movimentacao) {
						
					 ?>
					<tr>
						<td><?php echo $movimentacao['tipo'];?> </td>
						<td><?php echo $movimentacao['data_inicio'];?> </td>
						<td><?php echo $movimentacao['data_termino'];?> </td>
						<td><a class="has-text-red" href="editar_mov.php?id=<?php echo $movimentacao['id'];?>"><i class="fa fa-pencil fa-2x" aria-hidden="true" style="color: #f1c40f;"></i></a>-
							<a href="Classes/excluir.php?id2=<?php echo $movimentacao['id'];?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style=" color: red;"></i></a>
						</td>		
					</tr>

					<?php 
							}
						}
					?>
				</tbody>
			</table>
			<div><a class="button is-primary" href="nova.php">Incluir</a></div>
		</div>
	</section>

		<section class="my-5  content-tab" id="relatorios" style="display: none;">
		<div class="container" >
			<caption><h1 class="is-size-6">Retórios de Contêineres por cliente:</h1></caption>
			<table class="table is-striped is-bordered">
				<thead>
					<tr>
						<td>Cliente:</td>
						<td>Número:</td>
						<td>Tipo:</td>
						<td>Status:</td>
						<td>Categoria:</td>
					</tr>
				</thead>
				<tbody>

					<?php 
						$contDao = new ContainerDao();

						if(!empty($contDao->gerarRelatorioConteiner())){
							foreach ($contDao->gerarRelatorioConteiner() as $container) {
						
					 ?>
					<tr>
						<td><?php echo $container['cliente'];?> </td>
						<td><?php echo $container['numero'];?> </td>
						<td><?php echo $container['tipo'];?> </td>
						<td><?php echo $container['status'];?> </td>
						<td><?php echo $container['categoria'];?> </td>		
					</tr>

					<?php 
						}
					}

					?>
				</tbody>

			</table>
			<?php 
				$import = 0;
				$export = 0;

				foreach ($contDao->gerarRelatorioConteiner() as $container) {
					if($container['categoria'] == 'Exportação'){
						$export++;
					}else{
						$import++;
					}
				}
			 ?>
			<div>Total de Importações: <?php echo $import; ?></div>
			<div>Total de Exportações: <?php echo $export; ?></div>
		</div>
			<hr>
		<div class="container" >
			<caption><h1 class="is-size-6">Retórios de Movimentações por tipo:</h1></caption>
			<table class="table is-striped is-bordered">
				<thead>
					<tr>
						<td>Tipo:</td>
						<td>Data_Início:</td>
						<td>Data_Término:</td>
					</tr>
				</thead>
				<tbody>

					<?php 
						$movDao = new MovimentacaoDao();

						if(!empty($movDao->gerarRelatorioMovimentacao())){
							foreach ($movDao->gerarRelatorioMovimentacao() as $movimentacao) {
						
					 ?>
					<tr>
						<td><?php echo $movimentacao['tipo'];?> </td>
						<td><?php echo $movimentacao['data_inicio'];?> </td>
						<td><?php echo $movimentacao['data_termino'];?> </td>		
					</tr>

					<?php 
						}
					}

					?>
				</tbody>
			</table>
		</div>
	</section>

	<script type="text/javascript">
		function openTab(evt, tabName) {
  			var i, x, tablinks;
  			x = document.getElementsByClassName("content-tab");
  			for (i = 0; i < x.length; i++) {
      			x[i].style.display = "none";
  			}
  			tablinks = document.getElementsByClassName("tab");
  			for (i = 0; i < x.length; i++) {
      			tablinks[i].className = tablinks[i].className.replace(" is-active", "");
  			}
  			document.getElementById(tabName).style.display = "block";
  			evt.currentTarget.className += " is-active";
		}
	</script>
</body>
</html>