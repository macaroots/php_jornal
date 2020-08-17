<?php
require_once('DAO_Abstrato.php');
class DAO_Noticias extends DAO_Abstrato {
	
	function lista() {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM jor_noticias';
			$consulta = $conexao->prepare($sql);
			$consulta->execute();
			$lista = $consulta->fetchAll();
			
			$conexao = null;
			
			return $lista;
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
	
	function listaPorAssunto($idAssunto) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM jor_noticias WHERE id_assunto = ?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $idAssunto);
			$consulta->execute();
			$lista = $consulta->fetchAll();
			
			$conexao = null;
			
			return $lista;
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
	
	function listaPremium($premium=true) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM jor_noticias WHERE premium = ?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $premium);
			$consulta->execute();
			$lista = $consulta->fetchAll();
			
			$conexao = null;
			
			return $lista;
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
	
	function insere($noticia) {
		try {
			$conexao = $this->conecta();
			
			$sql = "INSERT INTO jor_noticias (id_assunto, titulo, texto, foto, premium) VALUES (:id_assunto, :titulo, :texto, :foto, :premium)";
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(':id_assunto', $noticia['id_assunto']);
			$consulta->bindParam(':titulo', $noticia['titulo']);
			$consulta->bindParam(':texto', $noticia['texto']);
			$consulta->bindParam(':foto', $noticia['foto']);
			$consulta->bindParam(':premium', $noticia['premium']);
			$consulta->execute();
			
			$id = $conexao->lastInsertId();
			
			$conexao = null;
			
			return $id;			
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage(); 
			return null;
		}

	}
	
	function edita($noticia, $id) {
		try {
			$conexao = $this->conecta();
			
			$sql = "UPDATE jor_noticias SET id_assunto=:id_assunto, titulo=:titulo, texto=:texto, foto=:foto, premium=:premium WHERE id=:id";
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(':id_assunto', $noticia['id_assunto']);
			$consulta->bindParam(':titulo', $noticia['titulo']);
			$consulta->bindParam(':texto', $noticia['texto']);
			$consulta->bindParam(':foto', $noticia['foto']);
			$consulta->bindParam(':premium', $noticia['premium']);
			$consulta->bindParam(':id', $id);
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
			
			$sql = 'SELECT * FROM jor_noticias WHERE id=?';
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
			
			$sql = 'DELETE FROM jor_noticias WHERE id=?';
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