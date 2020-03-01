# Caixas de interface
Para utilizar o módulo de caixas é necessário exportar o objeto:
```php
require_once('assets/obj/caixa.php');
```

E também é necessário linkar o arquivo de estilo genérico e o script do **[Font-awesome](https://fontawesome.com/)**:
```html
<link rel="stylesheet" href="assets/css/terceiros-theme.css">
<script src="https://kit.fontawesome.com/b31b35b064.js"></script>
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
|  3   |   Formulário  |

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
### Tipo 3 - Formulário
Esse tipo é usado pra preencher o corpo da caixa com um formulário em grid. Os dados devem ser passados por um array com seus devidos atributos preenchidos de acordo com a finalidade do formulário.

O array do formulário deve conter 3 camadas:

#### Primeira camada
A primeira camada irá conter os atributos gerais do formulário, a referência do botão de submit e a quantidade de linhas que o formulário irá ter. Segue a tabela explicativa:

| Propriedade | Descrição | Padrão |
|-------------|-----------|--------|
| action | Recebe o link de action do formulário | (Em branco) |
| method | Recebe o method do formulário  | get |
|   id   | Recebe o id do formulário | (Em branco) |
| buttonId | Recebe o id do botão de submit | (Em branco) |
| loadText | Recebe o texto que irá aparecer no botão de submit após o clique | (value do botão)|
| countRows | Recebe a quantidade de linhas do formulário | 0 |

Nessa camada será também definida por inteiros ordenadamente cada linha do formulário.

### Segunda camada
A segunda camada irá conter a quantidade de células de cada linha. Segue a tabela explicativa:

| Propriedade | Descrição | Padrão |
|-------------|-----------|--------|
| countCels | Recebe a quantidade de células da linha | 0 |

Nessa camada será também definida por inteiros ordenadamente cada célula da linha.

### Terceira camada
A terceira camada irá conter os atributos das células. Segue a tabela explicativa:

| Propriedade | Descrição | Padrão |
|-------------|-----------|--------|
| name | Recebe o nome do input | (Em branco) |
|  id  | Recebe o id do input | (Em branco) |
| type | Recebe o type do input | text |
| required | Recebe um boolean para definição do atributo | off |
| autoComplete | Recebe um boolean para definição do atributo | on |
| placeholder | Recebe o placeholder do input | (Em branco) |
| extraClass | Recebe a classe auxiliar *(Opcional)* | (Em branco) |
| labelText | Recebe o texto que irá aparecer na label (*Opcional*) | (Em branco) |
| value | Recebe o valor que irá aparecer dentro da input (*Opcional*) |(Em branco )|


## Preenchimento do rodapé da caixa *(Opcional)*
Para o preenchimento do rodapé é necessário utilizar a função **fillFooter()**, e passar dois valores:
* Tipo (Tabela disponivel a baixo)
* Conteúdo (Pode variar de string ou array, dependendo do tipo escolhido)

*obs: Se não utilizado, o rodapé não existirá*

| Tipo | Descrição |
|------|-----------|
|  1   |   Livre   |
|  2   |    Link   |

### Tipo 1 - Livre
Esse tipo é usado para inserir qualquer conteúdo HTML no rodapé da caixa:
```php
$tipo = "1";
$html = "<span>Exemplo de rodapé</span>"; //Aqui pode ser inserido praticamente tudo

$caixa->fillFooter($tipo, $html);
```

### Tipo 2 - Link
Esse tipo é usado para criar uma tag <a> com estilo de botão e deve ser usado um array para passar três dados:
* link  [String]  - Irá conter o link, que pode ser interno ou externo
* text  [String]  - Irá conter a informação que irá aparecer dentro do botão 
* blank [boolean] - Configuração de abertura em nova aba. Se não definido, padrão = false

```php
$conteudo['link'] = "https://www.google.com";
$conteudo['text'] = "Acessar google";
$conteudo['blank'] = true;

// ou

$conteudo = [ 
	"link" => "https://google.com",
	"text" => "Acessar google",
	"blank" => true, 
]; //Recomendado

$tipo = "2";
$caixa->fillFooter($tipo, $conteudo);
```

As cores podem ser alteradas modificando as váriaveis no css genérico.

## Adicionando no HTML
Após as configurações necessárias basta dar echo na variável DOM do objeto.

```php
echo $caixa->DOM;
```

## Conclusão
É possivel editar todos os aspectos do front-end modificando o **terceiros-theme** de acordo com sua necessidade. É possível criar ilimitadas caixas em uma mesma página e configurar elas de acordo com sua necessidade.

### Exemplo completo
```php
$caixa = new Caixa("Titulo", "fas fa-briefcase"); //Titulo e Icone

$html = "<span class='customizar'>Conteúdo de exemplo</span>";
$caixa->fillBody('1', $html); //Preencher corpo

$conteudo = [
	"link" => "https://exemplo.com",
	"text" => "Acessar",
];
$caixa->fillFooter('2', $conteudo); //Preencher rodapé

echo $caixa->DOM; //echo da caixa final
```