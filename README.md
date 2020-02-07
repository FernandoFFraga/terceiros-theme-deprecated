# Objetivo

Este é um pacote de assets desenvolvido para auxiliar na criação e desenvolvimento de painéis administrativos.

# Iniciar

É necessário importar o objeto desejado
```php
require_once('assets/obj/calendario.php');
```


E também é necessário linkar o arquivo de estilo
```html
<link rel="stylesheet" href="assets/css/terceiros-theme.css">
```
# Assets

## Calendário
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

## Informações adicionais
Para quaisquer ajustes de CSS devem ser usadas as classes:

| Edição | Classe |
|--------|--------|
| Mudar estilo do sufix    | **.calendario-sufix** |
| Mudar estilo do prefix   | **.calendario-prefix** |
| Mudar estilo do destaque | **.calendario-destaque** |

## Mecânismo de busca