<?php

	require_once('assets/obj/calendario.php');
	$calendario = new Calendario([1, 2, 3], 1, 2019);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Ambiente de teste</title>
	<link rel="stylesheet" href="assets/css/terceiros-theme.css">
</head>
<body>
	<style>
		.controle{
			width: 400px;
			min-height: 400px;
			
		}
	</style>
	<div class="controle">
		<?php echo $calendario->DOM; ?>
	</div>
</body>
</html>