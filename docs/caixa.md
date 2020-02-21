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