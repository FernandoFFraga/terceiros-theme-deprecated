<pre><?php 

require('assets/obj/caixa.php');

$caixa = new Caixa('Caixa de teste', 'fas fa-briefcase');

$tabela = ["Fernando|Fraga", "Yan|Menezes", "Anderson|Azevedo", "Anderson|Azevedo"];
$tabela['th'] = "Nome|Sobrenome";



$foot = "aa";

$caixa->fillBody('2', $tabela);
$caixa->fillFooter('1', $foot);
print_r($tabela);
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