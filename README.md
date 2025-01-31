# laon-labs-netflix-backend

Bem-vindo ao backend da Laon-labs-netflix, um projeto feito para fins de nivelamento em um processo seletivo.

### Tecnologias usadas:

* Laravel 8
* php 8.4.1
* Composer 2.8.3
* MySQL 8
* Postman 11.29.5
* Windows 10 Home

### Download e execução da API

- Abra seu gerenciador de banco de dados (MySQL Workbench, DBeaver, HeidiSQL) ou rode o mysqld no terminal informando suas credenciais de login
- Crie um banco de dados chamado 'laravel': `CREATE DATABASE laravel;`
- Faça o download ou clone o repositório no seu diretório local
- Procure pelo arquivo `.env.example`, faça uma cópia dele e renomeie a cópia para `.env`, informando as credenciais corretas nas variáveis `DB_USERNAME` e `DB_PASSWORD` para conseguir realizar login no banco de dados `laravel`
- Abra um terminal (Git Bash no Windows) no diretório raiz do projeto e rode o comando `php artisan serve`
- Rode as migrations com `php artisan migrate`
- Rode os seeders com php artisan db:seed
- Utilize [esta coleção do Postman](https://www.postman.com/avionics-saganist-3996165/laon-labs-netflix-copy-api/overview) para realizar as requisições que quiser.
