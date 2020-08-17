<?php
include('../../lib/DAO/DAO_Noticias.php');
$dao = new DAO_Noticias();

$noticias = $dao->lista();
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
					<th>Data</th>
					<th>Assunto</th>
					<th>Título</th>
					<th>Premium</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
<?php
if (!empty($noticias)) {
	foreach ($noticias as $linha) {
?>			
				<tr>
					<td><?php echo $linha['id']; ?></td>
					<td><?php echo $linha['data']; ?></td>
					<td><?php echo $linha['id_assunto']; ?></td>
					<td><?php echo $linha['titulo']; ?></td>
					<td><?php echo $linha['premium']; ?></td>
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
					<td colspan="6">Registros não encontrados</td>
				</tr>
<?php
}
?>
			</tbody>
		</table>
	</div>
</body>
</html>