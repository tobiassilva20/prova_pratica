<?php 
require_once 'Conexao.php';
require_once 'Movimentacao.php';

class MovimentacaoDao{

	public function salvar(Movimentacao $movimentacao){
		$sql = "INSERT INTO movimentacao (tipo, data_inicio, data_termino) VALUES (?,?,?)";

		//Chama a conexão
		$stmt = Conexao::getConn()->prepare($sql);

		$stmt->bindValue(1, $movimentacao->getTipo());
		$stmt->bindValue(2, $movimentacao->getDataInicio());
		$stmt->bindValue(3, $movimentacao->getDataTermino());
				
		return $stmt->execute();
	}

	public function buscarTodos(){
		$sql = 'SELECT * FROM movimentacao';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultSet;
		}else{
			return [];
		}
	}

	public function buscarUma($id){
		$sql = 'SELECT * FROM movimentacao where id = ?';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$resultSet = $stmt->fetch(\PDO::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {

			$movimentacao = new Movimentacao();
			$movimentacao->setId($resultSet['id']);
			$movimentacao->setTipo($resultSet['tipo']);
			$movimentacao->setDataInicio($resultSet['data_inicio']);
			$movimentacao->setDataTermino($resultSet['data_termino']);
			return $movimentacao;
			
		}else{
			return null;
		}
	}

	public function alterar(Movimentacao $movimentacao){
		
		$sql = "UPDATE movimentacao SET tipo = ?, data_inicio = ?, data_termino = ? WHERE id = ?";

		//Chama a conexão
		$stmt = Conexao::getConn()->prepare($sql);

		$stmt->bindValue(1, $movimentacao->getTipo());
		$stmt->bindValue(2, $movimentacao->getDataInicio());
		$stmt->bindValue(3, $movimentacao->getDataTermino());
		$stmt->bindValue(4, $movimentacao->getId());
				
		return $stmt->execute();
	}

	public function excluir($id){
		$sql = "DELETE FROM movimentacao WHERE id = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		return $stmt->execute();
	}

	public function gerarRelatorioMovimentacao(){
		
		$sql = 'SELECT * FROM movimentacao ORDER BY tipo ASC';

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
