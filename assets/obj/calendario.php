<?php

class Calendario{
	public $DOM;
	public $mes;

	public function __construct($destaques, $mes, $ano){

		//Array que guarda a quantidade de dias de cada mês
		$dias_mes = [31,28,31,30,31,30,31,31,30,31,30,31];

		//Array que guarda os nomes dos meses 0 = Janeiro ... 11 = Dezembro
		$nome_mes = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

		//Filtra a seleção do ano para o ano atual ou o ano escolhido, insira 0 para o ano atual
		$ano_selecionado = ($ano == 0) ? intval(date('Y')) : $ano;

		//Filtra a seleção do mes para o mes atual ou o mes escolhido, insira 0 para o mes atual
		$mes_selecionado = ($mes == 0) ? intval(date('m')) : $mes;

		//Variavel que guarda a quantidade de linhas no calendário, MUITO IMPORTANTE
		$q_linhas = 5; 

		//Variavel recebe um inteiro que representa o primeiro dia da semana do mes selecionado 0 = Domingo
		$inicio = date('w', strtotime("01-".$mes_selecionado."-".$ano_selecionado));

		//Bloco para verificar se o ano é bissexto e realizar os devidos ajustes
		if ($ano_selecionado%400 == 0 || ($ano_selecionado%4 == 0 && $ano_selecionado%100 != 0)) {
			$dias_mes[1] = 29;
			if ($inicio == 0 && $mes_selecionado == 2) {
				$q_linhas = 4;
			}
		}

		//Como a contegem do array começa com 0, essa linha faz o ajustes dos meses, ex: mes 12 - 1 = 11 = Dezembro
		$mes_selecionado--;

		//Guarda o nome do mes selecionado
		$this->mes = $nome_mes[$mes_selecionado];

		if ($inicio > 0) {
			$inicio--;
		}

		//Faz a seleção do mês passado, necessário para fazer o prefixo do calendário
		$mes_passado = $mes_selecionado - 1;
		if ($mes_passado < 0) {
			$mes_passado = 11;
			
		}

		//Faz o calculo necessário para iniciar o prefixo, de acordo com a quantidade de dias do mês passado
		$dia_select = $dias_mes[$mes_passado] - $inicio;
		$prefix = true;

		if ($inicio == 0) {
			$prefix = false;
			$radical = true;
			$dia_select = 1;
		}

		//Estrutura de repetição que forma as linhas do calendário
		for ($i=0; $i < $q_linhas; $i++) {
			$lista_dias .= "<tr>";

			//Estrutura que forma as células
			for ($d=0; $d < 7; $d++) {
				$value = "";
				$attr  = "";

				//Prefixo - Parte referente ao mês anterior, que preenche os dias da semana vazios
				if ($prefix) {
					$lista_dias .= "<td class='calendario-prefix'>".$dia_select."</td>";
					$dia_select++;

					//Verifica o fim do prefixo checando se ele já ultrapassou a quantidade de dias do mês passado
					if ($dia_select > $dias_mes[$mes_passado]) {
						$prefix = false;
						$radical = true;
						$dia_select = 1;
					}

				//Radica - Parte principal do calendário
				} else if ($radical){

					//Verifica se o dia da celula está incluso no array de destaques escolhidos e adiciona a classe referente ao design
					if(in_array($dia_select, $destaques)){
						$attr = "class='calendario-destaque'";
					}

					$lista_dias .= "<td $attr>".$dia_select."</td>";
					$dia_select++;

					//Verifica o fim da parte principal do calendário e inicia o sufixo caso retorne true
					if ($dia_select > $dias_mes[$mes_selecionado]) {
						$radical = false;
						$sufix = true;
						$dia_select = 1;
					}
				} else if ($sufix){
					$lista_dias .= "<td class='calendario-sufix'>".$dia_select."</td>";
					$dia_select++;
				}
			}
			$lista_dias .= "</tr>";
		}

		//Variavel guarda a parte superior da tabela
		$header = "<table class='calendario-table'>
					<thead>
						<tr>
							<th>Dom</th>
							<th>Seg</th>
							<th>Ter</th>
							<th>Qua</th>
							<th>Qui</th>
							<th>Sex</th>
							<th>Sáb</th>
						</tr>
					</thead>
					<tbody>";

		$this->DOM = $header.$lista_dias."</tbody></table>";
	}
}

?>