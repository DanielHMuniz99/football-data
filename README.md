## Development Challenge

## Football API Project

PHP 8.4

Laravel 11.0

## Instalação

  ```php
  composer install
  ```

Copy   ``` .env.example ``` to ```.env```

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

configure a ``` API_FOOTBALL_DATA ``` no arquivo .env com a chave gerada pela [API Football-data](https://www.football-data.org/documentation/quickstart)

``` API_FOOTBALL_DATA="7285b375d4ac463e9167e24d85aed228" ```

  ```php
  php artisan migrate
  ```

## informações da API

Alguns endpoints estão “bloqueados” devido ao plano gratuito da chave em questão. Existem algumas inconsistências, como o endpoint de listagem de times da liga brasileira (Campeonato Brasileiro) que não retorna dados (teams)

![image](https://github.com/user-attachments/assets/f707f5ee-6291-4a88-80c8-088100250efd)

Foi adicionado uma opção de resultados ao vivo, porem o endpoint de matches (IN_PLAY) não retorna informações referente a tempo de jogo

![image](https://github.com/user-attachments/assets/e8895cca-2a80-4db7-8c99-a7acf3be476e)

![image](https://github.com/user-attachments/assets/ed215853-7149-420b-aa37-6f1eae67e314)
