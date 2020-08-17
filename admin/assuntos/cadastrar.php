<?php
include('../../lib/DAO/DAO_Assuntos.php');

$id = $_POST['id'];
$assunto = array(
	'id' => $id,
	'nome' => $_POST['nome']
);

$dao = new DAO_Assuntos();

if ($id == -1) {
	$id = $dao->insere($assunto);
	$acao = 'inserido';
}
else {
	$dao->edita($assunto, $id);
	$acao = 'editado';
}

//header('Location: listar.php');
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