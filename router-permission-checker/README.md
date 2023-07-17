## Need to fix at laradoc

## Dependencies
* php 7.2
* Docker
* MySql 5.7

### Startup

1. Run Docker.
2. Run in shell:
   ```
   bash docker-compose up -d workspace nginx mysql php-fpm phpmyadmin
   ```
3. Open in browser `http://localhost:8080/` with credentials:
    ```
    server: mysql 
    user: root 
    pass: root
    ```
4. Create user with name and pass `texchange`, check "Create db with same name"
5. Run in texchange folder
    ```bash
    git checkout master &&
    cp .env.example .env
    ```
6. Run in `laradock` folder `docker-compose exec workspace bash`;
7. Edit .env to correct values
8. Run in container shell 
    ```bash
    composer install
    ```
9. For CurrencyAdapters with nodeJS middleware you can see `/node_js_component` folder, so need prepare `/node_js_component/config.json` and run docker container for `/node_js_component/server.js`

p.s. after
    ```bash
    composer install
    ```
    running
```
    php artisan key:generate
    php artisan common:build-project
    php artisan init:project
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
#####for generate Entities from Mapping:
```bash
php artisan doctrine:generate:entities --update-entities --generate-methods /packages/php/SharedDatabases/RouterPermissionCheckerRolesManager/Mappings
```
#####for create Migrations by Mapping:
```bash
php artisan doctrine:migrations:diff
```

## !!Release/hotfix flow!!
### major.minor.patch (1.0.0)

Branch naming rules:
- ***release*** branches should increment **minor** if new features are presented, if only bugfixes - increment **patch**;
- ***hotfix*** branches should increment **patch**;

After creating ***release/hotfix*** branch you have to change version in next files:

- `config/sentry.php`
    ```php
    // Increment this version accordingly to rules above
    'release' => "1.0.0", 
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