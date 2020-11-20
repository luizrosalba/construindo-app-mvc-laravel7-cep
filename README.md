# Construindo uma aplicação MVC com Laravel 7 para consulta de CEP

Projeto da DIO para Construindo uma aplicação MVC com Laravel 7 para consulta de CEP. 

A aplicação: 

- Busca o CEP na API ViaCep
- Salva o endereço no Banco de Dados
- Busca endereços Salvos 

- Utilizamos Docker para facilitar as configurações de ambiente 



# Laravel 

- Laravel nasceu em 2011
- É um Framework facil de usar com sintaxe elegante
- componentes nativos para gerenciamento de usuários, cache, banco , storages e mais 
- Integração com plataformas como AWS , GCP , etc 
- Cria uma camada para libs de terceiros , onde vc só usa o Laravel 
 

# Instalação 

- Opção : composer global require laravel/installer

- Opção 2  (usando o docker): 
- git clone : https://github.com/laravel/laravel.git construindo-app-mvc-laravel7-vep
- extrair a pasta com o docker-compose (utils)
- colar na raíz do projeto 
- cuidado com os pem dos commits 
- git rm -r --cached myFolder para remover algo do github 
- instalando o composer 
- composer install = npm install 
- apk add composer
- composer install --ignore-platform-reqs

# Configurando

- .env.example (variáveis de ambiente)
- criamos um .env removendo diversas informações (não será commitado gitignores)
- DB host será o nome do database 
- baixando dependências 
- Abri o docker-composer no container 
- baixou todo necessário 
- apk add git
- sai e abri de novo para reinicar com git 

# Pastas do projeto : 

- console : classes de commandline 
- aplicações em BG no cron (kernel.php)

- exceptions : onde ficam todos os tratamentos de exceções 
- Evita 502,505 na cara do user
- O laravel pode apresentar um erro amigável para o user 
- sempre faça handlers de erro 

- http: controllers e middleware , validadores de request ... kernel (configurações e adição de middlewares na aplicação)

- providers : registram dependencias em tempo de execução  : injecão de dependencia 
- dentro da pasta models user.php (nao apareceu no meu projeto )

- bootstrap : arquivos de conf de load do projeto 

- cache 

- config : arquivos php que retornam arrays com as configs 

- factories - : testes e mocks 

- migrations : representação do bd em php (deletamos as tabelas) 

- seeds : inserções e pre modificações no BD 

- docker : configurações do servidor e do php 

- public : onde tudo inicia , load do projeto 

- resources : todo o html e js (views= templates HTML) 

- routes : todas as rotas 

- storage : arquivos da aplicação 

- tests : testes unitários 

- vendor : biblios de terceiros 

- permissão do laravel para storage 
- apk add docker-compose
- 
- apk add sudo 
- sudo chmod -R 777 storage/logs ( nao fazer em producao )
-  sudo chmod -R 777 storage/framework 
- localhost:89 
- precisamos acertar a appKEY 
- apk add make
- php artisan
- gerando a key 
- php artisan key:generate 
- a key será criada e adicionada ao .env 
- em prod guarde a key e nao mostre pra ninguem 
- eu não consegui abrir o docker-compose up e o projeto ao mesmo tempo no mesmo container. Eu fizo docker-compose up e estou rodando um terminal ao lado 


# Criando 

- dentro de views criamos a pasta busca.blade 
- criamos o enderecocontroller app\Http\Controllers\EnderecoController.php
 de  para controlar as rotas de uma forma melhor 

- 
``` Js 
Route::get('/',  action:'EnderecoController@index');
});
```

- inserimos o bootsrap no busca.blade

- vamos implementar a busca pela API de CEP 

- api da via cep https://viacep.com.br/

```JS
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    public function index(){
        return view('busca'); 
    }

    public function buscar (
        Request $request 
    ){
        $cep = $request-> input ( 'cep'); 
        // dd($cep); /// mata e nao executa nada alem 
        //// printa na tela o que está usando 
        $response = Http::get("viacep.com.br/ws/$cep/json/")->json();
        dd($response);
        
    }
}
```


# Formatando a view 

fizemos uma request get http no endereco controller e usamos a reposnse chamada em adicionarblade para mostrar o resultado desta busca 

# Guardando a informação no banco 

- vamos validar a request usando uma classe 


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
