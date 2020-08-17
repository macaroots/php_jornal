<?php
require_once('DAO_Abstrato.php');
class DAO_Assuntos extends DAO_Abstrato  {
	
	function lista() {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM jor_assuntos';
			$consulta = $conexao->prepare($sql);
			$consulta->execute();
			$lista = $consulta->fetchAll();
			
			$conexao = null;
			
			return $lista;
		} catch (Exception $e) {
			throw new Exception('Error!: ' . $e->getMessage(), 1046, $e); 
			return null;
		}

	}
	
	function insere($assunto) {
		try {
			$conexao = $this->conecta();
			
			$sql = "INSERT INTO jor_assuntos VALUES (DEFAULT, :nome)";
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(':nome', $assunto['nome']);
			$consulta->execute();
			
			$id = $conexao->lastInsertId();
			
			$conexao = null;
			
			return $id;			
		} catch (PDOException $e) {
			throw $e; 
		}

	}
	
	function edita($assunto, $id) {
		try {
			$conexao = $this->conecta();
			
			$sql = "UPDATE jor_assuntos SET nome=:nome WHERE id=:id";
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(':id', $assunto['id']);
			$consulta->bindParam(':nome', $assunto['nome']);
			$consulta->execute();
			
			$conexao = null;
				
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage(); 
			return null;
		}

	}
	
	function getPorId($id) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM jor_assuntos WHERE id=?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $id);
			$consulta->execute();
			$linha = $consulta->fetch();
			
			$conexao = null;
			
			return $linha;
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
	
	function apaga($id) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'DELETE FROM jor_assuntos WHERE id=?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $id);
			$consulta->execute();
			
			$conexao = null;
			
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
}