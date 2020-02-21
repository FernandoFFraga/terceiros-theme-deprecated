# Caixas de interface
Para utilizar o módulo de caixas é necessário exportar o objeto:
```php
require_once('assets/obj/caixa.php');
```

E também é necessário linkar o arquivo de estilo genérico e o estilo do **[Font-awesome](https://fontawesome.com/)**:
```html
<link rel="stylesheet" href="assets/css/terceiros-theme.css">
```

## Criação do objeto
É necessário de passar 2 valores na criação do objeto:
* Título da caixa [string]
* Ícone (Devem ser passadas as duas classes referentes ao icone do **[Font-awesome](https://fontawesome.com/icons?d=gallery)**)

```php
$titulo = "Caixa de teste";
$icone  = "fas fa-briefcase"; //Classes que irão entrar no elemento <i>

$caixa = new Caixa($titulo, $icone);
```

## Preenchimento do corpo da caixa
Para o preenchimento do corpo da caixa utilize a função **fillBody()** passando dois valores:
* Tipo (Tabela disponivel a baixo)
* Conteúdo (Pode variar de string ou array, dependendo do tipo escolhido)

| Tipo | Descrição |
|------|-----------|
|  1   |   Livre   |
|  2   |   Tabela  |

### Tipo 1 - Livre
Esse tipo é usado para inserir qualquer conteúdo HTML no corpo da caixa:
```php
$tipo = "1";
$html = "<div class='exemplo'>
		<span>Exemplo</span>
	</div>"; //Aqui pode ser inserido praticamente tudo

$caixa->fillBody($tipo, $html);
```

### Tipo 2 - Tabela
Esse tipo é usado para facilitar a construção de tabelas no corpo da caixa. Os dados de conteúdo devem ser passados por um array.

#### Cabeçalho da tabela *(Opcional)*
Caso ache necessário o usuário pode passar os dados do cabeçalho em uma única string, separando as células com **|** e alocando no espaço **th** do array de conteúdos, exemplo:
```php
$conteudo['th'] = "Nome|Sobrenome|Idade";
```

#### Corpo da tabela
O usuário pode passar os dados do corpo da tabela em uma única string, separando as células com **|** e as incluindo no array de conteúdos. E isso pode ser feito de duas maneiras:

```php
$conteudo[0] = "Fernando|Fraga|18";
$conteudo[1] = "Yan|Menezes|19";
$conteudo[2] = "Anderson|Asevedo|18";

// ou

$conteudo = ["Fernando|Fraga|18", "Yan|Menezes|19", "Anderson|Azevedo|18"]; //Recomendado
```

Exemplo completo:
```php
$tipo = "2";
$conteudo = ["Cerveja|32", "Refrigerante|50"]; //Duas linhas com duas células
$conteudo['th'] = "Produto|Estoque"; // Necessário ser passado por último

$caixa->fillBody($tipo, $conteudo);
```