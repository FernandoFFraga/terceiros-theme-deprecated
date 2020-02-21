<pre><?php 

require('assets/obj/caixa.php');

$caixa = new Caixa("Titulo", "fas fa-briefcase"); //Titulo e Icone

$html = "<span class='customizar'>Conteúdo de exemplo</span>";
$caixa->fillBody('1', $html); //Preencher corpo

$conteudo = array(  
	"link" => "https://exemplo.com",
	"text" => "Acessar",
);

$caixa->fillFooter('2', $conteudo); //Preencher rodapé

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
		<?php echo $caixa->DOM; 
			$caixa->fillBody('1', 'aaa'); //Preencher corpo
			echo $caixa->DOM;
		?>

	</div>
</body>
</html>