<?php
include('../../lib/DAO/DAO_Assuntos.php');

$id = $_GET['id'];

$dao = new DAO_Assuntos();
$dao->apaga($id);

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
		Registro #<?php echo $id; ?> apagado com sucesso!
	</div>
</body>
</html>