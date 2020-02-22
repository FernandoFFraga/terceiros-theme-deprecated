<pre><?php 

require('assets/obj/caixa.php');

$caixa = new Caixa("Titulo", "fas fa-briefcase"); //Titulo e Icone

$conteudo = [ 
	"action"     => "../",
	"method"     => "post",
	"buttonName" => "enviar",
	"loadText"   => "Enviando...",
	"countRows"  => 2,
	0 => [
		"countCels" => 2,
		0 => [
			"name" => "teste0",
			"id" => "teste0",
			"type" => "text",
			"required" => true,
			"autoComplete" => true,
			"placeholder" => "input de teste",
			"extraClass" => "teste",
			"labelText" => "Teste",
			"value" => "aa",
		],
		1 => [
			"name" => "teste1",
			"id" => "teste1",
			"type" => "text",
			"required" => true,
			"autoComplete" => true,
			"placeholder" => "input de teste",
			"extraClass" => "teste",
			"labelText" => "Teste",
			"value" => "bb",
		],
	],
	1 => [
		"countCels" => 1,
		0 => [
			"name" => "teste2",
			"id" => "teste2",
			"type" => "text",
			"required" => true,
			"autoComplete" => true,
			"placeholder" => "input de teste",
			"extraClass" => "teste",
			"labelText" => "Teste",
			"value" => "cc",
		],
	],
];

print_r($conteudo);

$caixa->fillBody('3', $conteudo); //Preencher corpo


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
		<?php echo $caixa->DOM;?>
	</div>
</body>
</html>