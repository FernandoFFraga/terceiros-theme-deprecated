# Objetivo

Este é um pacote de assets desenvolvido para auxiliar na criação e desenvolvimento de painéis administrativos.

# Assets

## Calendário
Para utilizar o calendário é necessário importar o objeto desejado:
```php
require_once('assets/obj/calendario.php');
```

E também é necessário linkar o arquivo de estilo:
```html
<link rel="stylesheet" href="assets/css/terceiros-theme.css">
```
É necessário de passar 3 valores na criação do objeto:
* Dias para destaques (Devem ser passados dentro de um array de inteiros)
* Mês (Para usar o mês atual use o valor 0 [int])
* Ano (Para usar o ano atual use o valor 0 [int])

### Criação do objeto

```php
$array_destaques = [1, 2, 3]; //Dias que serão destacados
$mes = 1; //Janeiro
$ano = 2020;

$calendario = new Calendario([$array_destaques], $mes, $ano);
```

### Uso no HTML
Para o uso final basta dar echo na váriavel DOM do objeto criado anteriormente:

```php
echo $calendario->DOM;
```

### Informações adicionais
Para quaisquer ajustes de CSS devem ser usadas as classes:

| Edição | Classe |
|--------|--------|
| Mudar estilo do sufix    | **.calendario-sufix** |
| Mudar estilo do prefix   | **.calendario-prefix** |
| Mudar estilo do destaque | **.calendario-destaque** |

## Mecânismo de busca
Para utilizar o script de busca é necessário importar os arquivos **jquery.min.js** e **busca.js**:

```html
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/busca.js"></script>
```

### Funcionamento
O funcionamento do mecânismo permite dois tipos de busca em um mesmo input (Por dados que contenham **números** e por dados que contenham **letras**), podendo assim por exemplo servir para buscar um CPF ao digitar números, e buscar nomes ao digitar letras.

### Criação da tabela
A busca necessita que os dados estejam dentro de uma tabela, onde as colunas representam as categorias a serem procuradas.

Classes para definir o alvo das buscas:
| Alvo | Classe |
|------|--------|
| Números | **td.busca-numero** |
| Letras | **td.busca-letra** |

#### Exemplo:
```html
<table>
	<thead>
		<th>Código</th>
		<th>Nome</th>
	</thead>
	<tr>
		<td class="busca-numero">1</td>  <!-- Busca numérica -->
		<td class="busca-letra">Ana</td> <!-- Busca alfa -->
	</tr>
	<tr>
		<td class="busca-numero">2</td>
		<td class="busca-letra">Maria</td>
	</tr>
	<tr>
		<td class="busca-numero">3</td>
		<td class="busca-letra">João</td>
	</tr>
</table>
```
| Código | Nome |
|--------|------|
| 1 | Ana |
| 2 | Maria |
| 3 | João |

### Criação do input de busca
O input de busca pode estar em qualquer lugar da página desde que possua o id #input-busca, a busca ocorrerá de acordo com o sensor *keyup* do elemento:
```html
<input type="text" id="input-busca">
```

### Limitação
A limitação desse script é só poder ser usado **uma** vez por página, mas como todos os outros assets pode ser customizado de acordo com a necessidade do programador.