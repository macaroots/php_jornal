<?php
require('lib/DAO/DAO_Noticias.php');

$dao = new DAO_Noticias();
$noticiasPremium = $dao->listaPremium();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Jornal super legal</title>
	<meta charset="utf-8" />
</head>
<body>
	<header>
		<h1>Jornal super legal</h1>
		<nav>
			<ul>
				<li><a href="/~renato/php_jornal/index.php">Início</a></li>
				<li><a href="/~renato/php_jornal/admin/index.php">Admin</a></li>
			</ul>
		</nav>
	</header>
	
	<div>
		<h2>Notícias Premium</h2>
		<div>
<?php
foreach ($noticiasPremium as $noticia) {
?>
			<div>
				<span><?php echo $noticia['titulo']; ?></span>
				<span><?php echo $noticia['data']; ?></span>
			</div>
<?php
}
?>
		</div>
	</div>
</body>
</html>