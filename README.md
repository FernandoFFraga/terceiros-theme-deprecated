# terceiros-theme

## Objetivo

Este é um pacote de assets desenvolvido para auxiliar na criação e desenvolvimento de painéis administrativos.

## Iniciar
É necessário importar o objeto desejado e linkar com o css geral (terceiros-theme.css)

```php
require_once('assets/obj/calendario.php');
```

## Assets

### Calendário
#### Uso
É necessário de passar 3 valores na criação do objeto:
	* Dias para destaques (Devem ser passados dentro de um array de inteiros)
	* Mês (Para usar o mês atual use o valor 0[int])
	* Ano (Para usar o ano atual use o valor 0[int])

Exemplo:

```php
$calendario = new Calendario([1, 2, 3], 1, 2019);
```