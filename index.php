<pre><?php 

require('assets/obj/caixa.php');

$caixa = new Caixa('Caixa de teste', 'fas fa-briefcase');

$tipo = "2";

$conteudo = ["Cerveja|32", "Refrigerante|50"]; //Duas linhas com duas células
$conteudo['th'] = "Produto|Estoque";



$cont['link'] = "https://www.google.com";
$cont['text'] = "ACESSAR";

$caixa->fillBody($tipo, $conteudo);
$caixa->fillFooter('2', $cont);
print_r($cont);
?></pre>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Ambiente de teste</title>
	<link rel="stylesheet" href="assets/css/terceiros-theme.css">
	<script src="https://kit.fontawesome.com/b31b35b064.js"></script>
</head>
<body>
	<style>
		.controle{
			width: 500px;
		}
	</style>
	<div class="controle">
		<?php echo $caixa->DOM; ?>
	</div>
</body>
</html>