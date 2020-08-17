<?php
include('../../lib/DAO/DAO_Noticias.php');

try {
	$id = $_POST['id'];
	$noticia = array(
		'titulo' => $_POST['titulo'],
		'texto' => $_POST['texto'],
		'foto' => $_POST['foto'],
		'id_assunto' => $_POST['id_assunto'],
		'premium' => isset($_POST['premium'])?1:0
	);

	$dao = new DAO_Noticias();
	
	if ($id == -1) {
		$id = $dao->insere($noticia);
		$acao = 'inserido';
	}
	else {
		$dao->edita($noticia, $id);
		$acao = 'editado';
	}
	
	//header('Location: listar.php');
	
} catch (PDOException $e) {
	print 'Error!: ' . $e->getMessage(); 
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de adminstração</title>
	<meta charset="utf-8" />
</head>
<body>
<?php include('../cabecalho.php'); ?>
	<div>
		Registro #<?php echo $id; ?> <?php echo $acao; ?> com sucesso!
	</div>
</body>
</html>