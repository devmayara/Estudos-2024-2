# Router @CoffeeCode

[![Maintainer](http://img.shields.io/badge/maintainer-@robsonvleite-blue.svg?style=flat-square)](https://twitter.com/robsonvleite)
[![Source Code](http://img.shields.io/badge/source-coffeecode/router-blue.svg?style=flat-square)](https://github.com/robsonvleite/router)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/coffeecode/router.svg?style=flat-square)](https://packagist.org/packages/coffeecode/router)
[![Latest Version](https://img.shields.io/github/release/robsonvleite/router.svg?style=flat-square)](https://github.com/robsonvleite/router/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Quality Score](https://img.shields.io/scrutinizer/g/robsonvleite/router.svg?style=flat-square)](https://scrutinizer-ci.com/g/robsonvleite/router)
[![Total Downloads](https://img.shields.io/packagist/dt/coffeecode/router.svg?style=flat-square)](https://packagist.org/packages/coffeecode/router)

###### Small, simple and uncomplicated. The route is a PHP route components with abstraction for MVC. Prepared with RESTfull verbs (GET, POST, PUT, PATCH and DELETE), works on its own layer in isolation and can be integrated without secrets to your application.

Pequeno, simples e descomplicado. O route é um componentes de rotas PHP com abstração para MVC. Preparado com verbos
RESTfull (GET, POST, PUT, PATCH e DELETE), trabalha em sua própria camada de forma isolada e pode ser integrado sem
segredos a sua aplicação.

## About CoffeeCode

###### CoffeeCode is a set of small and optimized PHP components for common tasks. Held by Robson V. Leite and the UpInside team. With them you perform routine tasks with fewer lines, writing less and doing much more.

CoffeeCode é um conjunto de pequenos e otimizados componentes PHP para tarefas comuns. Mantido por Robson V. Leite e a
equipe UpInside. Com eles você executa tarefas rotineiras com poucas linhas, escrevendo menos e fazendo muito mais.

### Highlights

- Router class with all RESTful verbs (Classe route com todos os verbos RESTful)
- Optimized dispatch with total decision control (Despacho otimizado com controle total de decisões)
- Requesting Spoofing for Local Verbalization (Falsificador (Spoofing) de requisição para verbalização local)
- It's very simple to create routes for your application or API (É muito simples criar rotas para sua aplicação ou API)
- Trigger and data carrier for the controller (Gatilho e transportador de dados para o controloador)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Router is available via Composer:

```bash
"coffeecode/route": "2.0.*"
```

or run

```bash
composer require coffeecode/route
```

## Documentation

###### For details on how to use the route, see the sample folder with details in the component directory. To use the route you need to redirect your route routing navigation (index.php) where all traffic must be handled. The example below shows how:

Para mais detalhes sobre como usar o route, veja a pasta de exemplo com detalhes no diretório do componente. Para usar
o route é preciso redirecionar sua navegação para o arquivo raiz de rotas (index.php) onde todo o tráfego deve ser
tratado. O exemplo abaixo mostra como:

#### Apache

```apacheconfig
RewriteEngine On
#Options All -Indexes

## ROUTER WWW Redirect.
#RewriteCond %{HTTP_HOST} !^www\. [NC]
#RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

## ROUTER HTTPS Redirect
#RewriteCond %{HTTP:X-Forwarded-Proto} !https
#RewriteCond %{HTTPS} off
#RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER URL Rewrite
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?route=/$1 [L,QSA]
```

#### Nginx

````nginxconfig
location / {
  if ($script_filename !~ "-f"){
    rewrite ^(.*)$ /index.php?route=/$1 break;
  }
}
````

##### Routes

```php
<?php

use CoffeeCode\Router\Router;

$route = new Router("https://www.youdomain.com");

/**
 * routes
 * The controller must be in the namespace Test\Controller
 * this produces routes for route, route/$id, route/{$id}/profile, etc.
 */
$route->namespace("Test");

$route->get("/route", "Controller:method");
$route->post("/route/{id}", "Controller:method");
$route->put("/route/{id}/profile", "Controller:method");
$route->patch("/route/{id}/profile/{photo}", "Controller:method");
$route->delete("/route/{id}", "Controller:method");

/**
 * group by routes and namespace
 * this produces routes for /admin/route and /admin/route/$id
 * The controller must be in the namespace Dash\Controller
 */
$route->group("admin")->namespace("Dash");

$route->get("/route", "Controller:method");
$route->post("/route/{id}", "Controller:method");

/**
 * sub group
 */
$route->group("admin/support");

$route->get("/tickets", "Controller:method");
$route->post("/ticket/{id}", "Controller:method");

/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$route->group("error")->namespace("Test");
$route->get("/{errcode}", "Coffee:notFound");

/**
 * This method executes the routes
 */
$route->dispatch();

/*
 * Redirect all errors
 */
if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}
```

##### Named

```php
<?php

use CoffeeCode\Router\Router;

$route = new Router("https://www.youdomain.com");

/**
 * routes
 * The controller must be in the namespace Test\Controller
 */
$route->namespace("Test")->group("name");

$route->get("/", "Name:home", "name.home");
$route->get("/hello", "Name:hello", "name.hello");
$route->get("/redirect", "Name:redirect", "name.redirect");

/**
 * This method executes the routes
 */
$route->dispatch();

/*
 * Redirect all errors
 */
if ($route->error()) {
    $route->redirect("name.hello");
}
```

###### Named Controller Example

```php
<?php

class Name
{
    public function __construct($route)
    {
        $this->route = $route;
    }

    public function home(): void
    {
        echo "<h1>Home</h1>";
        echo "<p>", $this->route->route("name.home"), "</p>";
        echo "<p>", $this->route->route("name.hello"), "</p>";
        echo "<p>", $this->route->route("name.redirect"), "</p>";
    }

    public function redirect(): void
    {
        $this->route->redirect("name.hello");
    }
}
```

###### Named Params

````php
<?php

use CoffeeCode\Router\Router;

$route = new Router("https://www.youdomain.com");

$this->route->route("name.params", [
    "category" => 22,
    "page" => 2
]);

//result
//https://www.youdomain.com/name/params/22/page/2

$this->route->route("name.params", [
    "category" => 22,
    "page" => 2,
    "argument1" => "most filter",
    "argument2" => "most search"
]);

//result
//https://www.youdomain.com/name/params/22/page/2?argument1=most+filter&argument2=most+search
````

##### Callable

```php
<?php

use CoffeeCode\Router\Router;

$route = new Router("https://www.youdomain.com");

/**
 * GET httpMethod
 */
$route->get("/", function ($data) {
    $data = ["realHttp" => $_SERVER["REQUEST_METHOD"]] + $data;
    echo "<h1>GET :: Spoofing</h1>", "<pre>", print_r($data, true), "</pre>";
});

/**
 * GET httpMethod and Route
 */
 $route->get("/", function ($data, Router $route) {
    $data = ["realHttp" => $_SERVER["REQUEST_METHOD"]] + $data;
    echo "<h1>GET :: Spoofing</h1>", "<pre>", print_r($data, true), "</pre>";
    var_dump($route->current());
});

/**
 * POST httpMethod
 */
$route->post("/", function ($data) {
    $data = ["realHttp" => $_SERVER["REQUEST_METHOD"]] + $data;
    echo "<h1>POST :: Spoofing</h1>", "<pre>", print_r($data, true), "</pre>";
});

/**
 * PUT spoofing and httpMethod
 */
$route->put("/", function ($data) {
    $data = ["realHttp" => $_SERVER["REQUEST_METHOD"]] + $data;
    echo "<h1>PUT :: Spoofing</h1>", "<pre>", print_r($data, true), "</pre>";
});

/**
 * PATCH spoofing and httpMethod
 */
$route->patch("/", function ($data) {
    $data = ["realHttp" => $_SERVER["REQUEST_METHOD"]] + $data;
    echo "<h1>PATCH :: Spoofing</h1>", "<pre>", print_r($data, true), "</pre>";
});

/**
 * DELETE spoofing and httpMethod
 */
$route->delete("/", function ($data) {
    $data = ["realHttp" => $_SERVER["REQUEST_METHOD"]] + $data;
    echo "<h1>DELETE :: Spoofing</h1>", "<pre>", print_r($data, true), "</pre>";
});

$route->dispatch();
```

##### Simple Middleware

```php
<?php

use CoffeeCode\Router\Router;

$route = new Router("https://www.youdomain.com");

//simple
$route->get("/edit/{id}", "Coffee:edit", middleware: \Http\Guest::class);
$route->get("/denied", "Coffee:denied", "coffe.denied", \Http\Group::class);

//multiple
$route->get("/logado", "Coffee:logged", middleware: [\Http\Guest::class, \Http\Group::class]);

//callable
$route->get("/call", function ($data, Router $route){
    //code here
}, middleware: \Http\Guest::class);
```

##### Simple Middleware Group

```php
<?php

use CoffeeCode\Router\Router;

$route = new Router("https://www.youdomain.com");

//group single or multiple
$route->group("name", \Http\Guest::class);
$route->get("/", "Name:home", "name.home");
$route->get("/hello", "Name:hello", "name.hello");
$route->get("/redirect", "Name:redirect", "name.redirect");
```

##### Simple Middleware Class Example

```php
<?php

namespace Http;

use CoffeeCode\Router\Router;

class User
{
    public function handle(Router $route): bool
    {
        $user = true;
        if ($user) {
            var_dump($route->current());
            return true;
        }
        return false;
    }
}
```

##### Form Spoofing

###### This example shows how to access the routes (PUT, PATCH, DELETE) from the application. You can see more details in the sample folder. From an attention to the _method field, it can be of the hidden type.

Esse exemplo mostra como acessar as rotas (PUT, PATCH, DELETE) a partir da aplicação. Você pode ver mais detalhes na
pasta de exemplo. De uma atenção para o campo _method, ele pode ser do tipo hidden.

```html

<form action="" method="POST">
    <select name="_method">
        <option value="POST">POST</option>
        <option value="PUT">PUT</option>
        <option value="PATCH">PATCH</option>
        <option value="DELETE">DELETE</option>
    </select>

    <input type="text" name="first_name" value="Robson"/>
    <input type="text" name="last_name" value="Leite"/>
    <input type="text" name="email" value="cursos@upinside.com.br"/>

    <button>CoffeeCode</button>
</form>
```

##### PHP cURL example

```php
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/coffeecode/route/example/spoofing/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_POSTFIELDS => "first_name=Robson&last_name=Leite&email=cursos%40upinside.com.br",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
```

## Contributing

Please see [CONTRIBUTING](https://github.com/robsonvleite/router/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email cursos@upinside.com.br instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para cursos@upinside.com.br em vez de usar o
rastreador de problemas.

Thank you

## Credits

- [Robson V. Leite](https://github.com/robsonvleite) (Developer)
- [UpInside Treinamentos](https://github.com/upinside) (Team)
- [All Contributors](https://github.com/robsonvleite/router/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/robsonvleite/router/blob/master/LICENSE) for more
information.