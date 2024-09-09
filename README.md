
# Laravel10 e Vue3 - Sistema Quadro Societário de Empresas

<h1 align="center">Hi 👋, I'm Bruno Matias</h1>
<h3 align="center">I'm work Full Stack developer with more 4 years of experience, specializing in PHP, Laravel10+, Vue3, Inertia, SQL Server, MySQL, JavaScript, and Bootstrap, you possess a wide range of skills and expertise in software development.</h3>

- 🔭 I’m currently working on **Quadro Societário de Empresas**

- 📫 How to reach me **brunosmatias@gmail.com**

- 📊 Learn about the corporate framework system of companies on the website How to reach me **http://itbsm.com.br**

- 📄 Know about others system Biblioteca, FAQ, Curupira 

<h3 align="left">Connect with me:</h3>

<h3 align="left">Languages and Tools:</h3>
<a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-plain-wordmark.svg" alt="laravel" width="40" height="40"/></a>
<p align="left">
<a href="https://vuejs.org" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original-wordmark.svg" alt="vuejs" width="40" height="40"/></a><a href="https://inertiajs.com" target="_blank" rel="noreferrer"> <img src="" alt="inertiajs" width="40" height="40"/> 
</a>
<a href="https://getbootstrap.com" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-plain-wordmark.svg" alt="bootstrap" width="40" height="40"/> 
</a> 
<a href="https://www.w3schools.com/css/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/> 
</a> 
<a href="https://www.docker.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original-wordmark.svg" alt="docker" width="40" height="40"/> 
</a> 
<a href="https://git-scm.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/git-scm/git-scm-icon.svg" alt="git" width="40" height="40"/> </a> <a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/> 
</a>  
<a href="https://www.linux.org/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/linux/linux-original.svg" alt="linux" width="40" height="40"/> 
</a>  
<a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> 
</a>  
<a href="https://spring.io/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/springio/springio-icon.svg" alt="spring" width="40" height="40"/> 
</a> 
</p>

<h3 >Olá seja bem vindo a documentação deste projeto.</h3>

<h4>Recursos e bibliotecas utilizadas.</h4>

Autenticação
- JWT: autenticação de API por secret keys
- Axios: para atender as solicitações de POST via API nas funções do VUE3
DATABASE
- MariaDB 10.4 na porta 3388:3306
- ORM Eloquent: para criar consultas padrões no Laravel10
- Dbeaver: para acessar o banco via SSL
API

- O projeto atual já tem como base outro projeto que tenho realizado com estudos do canal especializa e com projetos próprios.
-O seguinte projeto Patusco apresenta um sistema WEB para gerenciamento de marcações de uma veterinárias. usuários podem logar e agendar marcações. Recepcionistas podem adicionar e atribuir veterinários as marcações e Médicos podem ver as marcações e deletar as que estão com ele.

Já é baseado em API o que facilita a integração.

 - 1 A lógica de login utilizava o padrão AUTH. O Login se concentra no Front End já que estou utilizando VUE3 com Laravel10+ e Inertia para unificar o Front e BackEnd.
-   2 Instalar o PhpOpenSourceSaver JWT web token
    2.1 composer require php-open-source-saver/jwt-auth
    2.2  php artisan config:cache
    2.3 php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"
    2.4 php artisan jwt:secret
    2.5 alter config/auth
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
                'driver' => 'jwt',
                'provider' => 'users',
        ],

    ],

    focus
    ->
    'api' => [
        \App\Http\Middleware\EncryptCookies::class,
        ...
        \PHPOpenSourceSaver\JWTAuth\Http\Middleware\Authenticate::class,
    ],

-   3 Separamos o modelo em containner APP, MYSQL, NGINX e Filas
-   4 Nos forms utilizo API, REQUESTS, RESOURCES para PUT, PATCH, GET e POST de dados;
-   5 A documentação SWAGGER
    https://app.swaggerhub.com/apis-docs/BRUNOSMATIAS/Quadro_Societario_Empresas/1.0.0

TABELAS UTILIZADAS
-   api_key: guarda a key de api e user_id
-   email: confirmation of the email by user_id
-   empresas: case user is type = 5 it'is bussiness register
-   type_user: type for user with admin, user basic, empresas
-   users: table for users
-   socio_empresas: relation of empresas users vinculados

PAGES CRIADAS
- Register empresa;
- Confirmação de email: info.
- Login;
- Welcome;
- Lista de Sócios por Empresa -> Modal Incluir sócio;
- Lista de empresas no sócio;


Para mais informações 
- 📫 How to reach me **brunosmatias@gmail.com**
- Site official http://itbsm.com.br



