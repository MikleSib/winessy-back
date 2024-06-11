## Need to fix at laradoc

## Dependencies
* php 8.0
* Docker
* MySql 8

### Startup

1. Run Docker.
2. Run in shell:
   ```
   bash docker-compose up -d workspace nginx mysql php-fpm 
   ```
3. create DB
4. Run in texchange folder
    ```bash
    git checkout master &&
    cp .env.example .env
    ```
5. Run in `laradock` folder `docker-compose exec -u laradock workspace bash`;
6. Edit .env to correct values
7. Run in container shell 
    ```bash
    composer install --ignore-platform-req
    ```
8. For CurrencyAdapters with nodeJS middleware you can see `/node_js_component` folder, so need prepare `/node_js_component/config.json` and run docker container for `/node_js_component/server.js`

p.s. after
    ```bash
    composer install --ignore-platform-req
    ```
    running
```
    art key:generate
    art common:build-project
```


### Laravel-Doctrine usage

#####for import Mappings from DB:
```bash
php artisan doctrine:mapping:import --namespace=App\\Doctrine\\Entity\\ xml app/Doctrine/Mappings/
```
#####for generate Entities from Mapping:
```bash
php artisan doctrine:generate:entities --update-entities --generate-methods /app/Doctrine/Mappings/
```
#####for create Migrations by Mapping:
```bash
php artisan doctrine:migrations:diff
```

## !!Release/hotfix flow!!
### major.minor.patch (1.0.0)

Version changes rules:
- ***patch*** add new **Currency Adapter** without any *other changes*
- ***minor*** add new **Monitoring Feature** or change **Strategies** without any changes of *ApiEndpoints*
- ***major*** changes of **ApiEndpoints** or base communications **DTOs**


Before merge any branch to master to change version in next files:

`config/service_definition.php`
```php

return [
    'service' => [
        'name' => 'NotifierFor' . config('coin_notifier.currency.ticker') . 'On' .  config('coin_notifier.currency.adapter') . 'Adapter',
        'type' => \Common\ApplicationRegister::APPLICATION_NOTIFIER_TYPE,  
        // Increment this version accordingly to rules above
        'version' => "1.0.0",
    ],
];
```

## For PHP dev's
- after doing commits (before doing PR) run `art common:phpcbf`
- look at all files that it changed, there are some issues with sniffer 
(1. if there is no comma at the end of the array it will add 2 of them, which will cause error. 
Also it will at typehint if there is no typehint on the method param but it is on phpDoc,
for the example see and run EAtrade)
- run `art common:phpcs` to see things that it can't resolve automatically
- run `git fetch && art common:phpcs --branch=origin/dev` to only show changes compared to `dev`, make sure it's `origin/dev` not just `dev`
- resolve them
- to run only one sniff use this example
`./vendor/bin/phpcbf --sniffs="SlevomatCodingStandard.Namespaces.AlphabeticallySortedUses" --standard="SlevomatCodingStandard" app`
- for Perfect Money, dont set passwords like wt>)1C0x9e).hXX?ZLJk because it hashes it differently then php 
with strtoupper(md5($passPhrase)) ( maybe because of escape chars, there is nothing about it docs)