<?php
include('../../lib/DAO/DAO_Noticias.php');
include('../../lib/DAO/DAO_Assuntos.php');

$daoAssuntos = new DAO_Assuntos();
$assuntos = $daoAssuntos->lista();

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$daoNoticias = new DAO_Noticias();
	$noticia = $daoNoticias->getPorId($id);
}
else {
	$noticia = array(
		'id' => -1,
		'titulo' => '',
		'texto' => '',
		'foto' => '',
		'id_assunto' => -1,
		'premium' => false
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
			<input type="hidden" name="id" value="<?php echo $noticia['id']; ?>" />
			<div>
				<label for="titulo">Título</label>
				<input id="titulo" name="titulo" type="text" value="<?php echo $noticia['titulo']; ?>" />
			</div>
			<div>
				<label for="texto">Texto</label>
				<textarea id="texto" name="texto"><?php echo $noticia['texto']; ?></textarea>
			</div>
			<div>
				<label for="foto">Foto</label>
				<input id="foto" name="foto" type="file" value="<?php echo $noticia['foto']; ?>" />
			</div>
			<div>
				<label for="assunto">Assunto</label>
				<select id="assunto" name="id_assunto">
<?php
foreach ($assuntos as $assunto) {
?>
					<option value="<?php echo $assunto['id']; ?>"<?php echo ($assunto['id'] == $noticia['id_assunto'])?' selected':''; ?>><?php echo $assunto['nome']; ?></option>
<?php
}
?>
				</select>
			</div>
			<div>
				<label for="premium">Premium</label>
				<input id="premium" name="premium" type="checkbox" value="1" />
			</div>
			<input type="submit" />
		</form>
	</div>
</body>
</html>