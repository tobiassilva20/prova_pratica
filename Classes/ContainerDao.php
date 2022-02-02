<?php 
require_once 'Conexao.php';
require_once 'Container.php';

class ContainerDao{
		public function salvar(Container $container){
		$sql = "INSERT INTO container (cliente, numero, tipo, status, categoria) VALUES (?,?,?,?,?)";

		//Chama a conexão
		$stmt = Conexao::getConn()->prepare($sql);

		$stmt->bindValue(1, $container->getCliente());
		$stmt->bindValue(2, $container->getNumero());
		$stmt->bindValue(3, $container->getTipo());
		$stmt->bindValue(4, $container->getStatus());
		$stmt->bindValue(5, $container->getCategoria());
				
		return $stmt->execute();
	}

	public function buscarUm($numero){
		$sql = 'SELECT * FROM container where numero = ?';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $numero);
		$stmt->execute();
		$resultSet = $stmt->fetch(\PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {

			$container = new Container();
			$container->setId($resultSet['id']);
			$container->setCliente($resultSet['cliente']);
			$container->setCliente($resultSet['cliente']);
			$container->setNumero($resultSet['numero']);
			$container->setTipo($resultSet['tipo']);
			$container->setStatus($resultSet['status']);
			$container->setCategoria($resultSet['categoria']);
			return $container;
			
		}else{
			return null;
		}
	}

	public function buscarTodos(){
		$sql = 'SELECT * FROM container ';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultSet;
		}else{
			return [];
		}
	}

	public function alterar(Container $container){
		$sql = "UPDATE container SET cliente = ?, numero = ?, tipo = ?,  status = ?, categoria = ?  WHERE id = ?";

		$stmt = Conexao::getConn()->prepare($sql);

		$stmt->bindValue(1, $container->getCliente());
		$stmt->bindValue(2, $container->getNumero());
		$stmt->bindValue(3, $container->getTipo());
		$stmt->bindValue(4, $container->getStatus());
		$stmt->bindValue(5, $container->getCategoria());
		$stmt->bindValue(6, $container->getId());

		return $stmt->execute();
	}

	public function excluir($numero){
		$sql = "DELETE FROM container WHERE id=?";

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $numero);
		return $stmt->execute();
	}

	public function gerarRelatorioConteiner(){
		
		$sql = 'SELECT * FROM container ORDER BY cliente ASC';

		//Chama a conexão
		$stmt = Conexao::getConn()->prepare($sql);
			
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultSet;
		}else{
			return [];
		}
	}
}


?>