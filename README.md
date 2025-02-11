## Development Challenge

## Football API Project

PHP 8.4

Laravel 11.0

## Instalação

  ```php
  composer install
  ```

Copy   ``` .env.example ``` to ```.env```

configure a ``` API_FOOTBALL_DATA ``` no arquivo .env com a chave gerada pela [API Football-data](https://www.football-data.org/documentation/quickstart)

``` API_FOOTBALL_DATA="7285b375d4ac463e9167e24d85aed228" ```

  ```php
  php artisan migrate
  ```

## informações da API

Alguns endpoints estão “bloqueados” devido ao plano gratuito da chave em questão. Existem algumas inconsistências, como o endpoint de listagem de times da liga brasileira (Campeonato Brasileiro) que não retorna dados (teams)

![image](https://github.com/user-attachments/assets/f707f5ee-6291-4a88-80c8-088100250efd)
