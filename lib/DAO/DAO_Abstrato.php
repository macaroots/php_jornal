<?php
class DAO_Abstrato {
	function conecta() {
		$conexao = new PDO('mysql:host=localhost;dbname=renato', 'renato', '123');
		return $conexao;
	}
}