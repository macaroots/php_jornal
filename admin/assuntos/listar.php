<?php
include('../../lib/DAO/DAO_Assuntos.php');
$dao = new DAO_Assuntos();
$assuntos = $dao->lista();
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
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
<?php
if (!empty($assuntos)) {
	foreach ($assuntos as $linha) {
?>			
				<tr>
					<td><?php echo $linha['id']; ?></td>
					<td><?php echo $linha['nome']; ?></td>
					<td>
						<a href="form.php?id=<?php echo $linha['id']; ?>">editar</a>
						<a onClick="return confirm('Certeza que quer apagar #<?php echo $linha['id']; ?>?');" href="apagar.php?id=<?php echo $linha['id']; ?>">apagar</a>
					</td>
				</tr>
<?php
	}
}
else {
?>
				<tr>
					<td colspan="2">Registros não encontrados</td>
				</tr>
<?php
}
?>
			</tbody>
		</table>
	</div>
</body>
</html>