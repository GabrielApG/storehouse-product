#Laravel - Almoxarifado - Módulo Produtos/Material

## Instalação

### 1. Dependência

[Vídeo tutorial](http://youtu.be/ya57z4VRm_o).
Usando o <a href="https://getcomposer.org/" target="_blank">composer</a>, execute o comando a seguir para instalar automaticamente `composer.json`:

```shell
composer require resultsystems/storehouse-product
```

ou manualmente no seu arquivo `composer.json`

```json
{
    "require": {
        "resultsystems/storehouse-product": "1.*"
    }
}
```

### 2. Provider

Para usar o Storehouse-Product em sua aplicação Laravel, é necessário registrar o package no seu arquivo `config/app.php`. Adicione o seguinte código no fim da seção `providers`

```php
// file START ommited
    'providers' => [
        // other providers ommited
        ResultSystems\Storehouse\Product\Providers\ProductServiceProvider::class,
    ],
// file END ommited
```

#### 2.1 Publicando o arquivo de configuração e as migrations

Para publicar o arquivo de configuração padrão e as migrations que acompanham o package, execute o seguinte comando:

```shell
php artisan vendor:publish
```

Se você já publicou os arquivos, mas por algum motivo precisa sobrescrevê-los, adicione a flag `--force` no final dos comandos anteriores.

### 3. Configurações

Abra o arquivo config/storehouse-product.php e faça as configurações necessárias

### 4. Migrations

Somente após configurar tudo, execute o seguinte comando:

```shell
php artisan migrate
```

