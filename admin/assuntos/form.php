<?php
require('../../lib/DAO/DAO_Assuntos.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$dao = new DAO_Assuntos();
	$assunto = $dao->getPorId($id);
}
else {
	$assunto = array(
		'id' => -1,
		'nome' => ''
	);
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
		<form method="POST" action="cadastrar.php">
			<input type="hidden" name="id" value="<?php echo $assunto['id']; ?>" />
			<div>
				<label for="nome">Nome</label>
				<input id="nome" name="nome" type="text" value="<?php echo $assunto['nome']; ?>" />
			</div>
			<input type="submit" />
		</form>
	</div>
</body>
</html>