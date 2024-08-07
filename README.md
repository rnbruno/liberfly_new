
# Laravel e Vue - Sistema de Ticket

<h1 align="center">Hi 👋, I'm Bruno Matias</h1>
<h3 align="center">I'm work Full Stack developer with 4 years of experience, specializing in PHP, Laravel, Vue, Inertia, SQL Server, MySQL, JavaScript, and Bootstrap, you possess a wide range of skills and expertise in software development.</h3>

- 🔭 I’m currently working on **Ticket System Curupira**

- 📫 How to reach me **brunosmatias@gmail.com**

- 📄 Know about the system Curupira 

<h3 align="left">Connect with me:</h3>

<h3 align="left">Languages and Tools:</h3>
<a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-plain-wordmark.svg" alt="laravel" width="40" height="40"/> </a>
<p align="left"> <a href="https://vuejs.org" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original-wordmark.svg" alt="vuejs" width="40" height="40"/></a><a href="https://inertiajs.com" target="_blank" rel="noreferrer"> <img src="" alt="inertiajs" width="40" height="40"/> 
    </a>
    <a href="https://getbootstrap.com" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-plain-wordmark.svg" alt="bootstrap" width="40" height="40"/> 
    </a> 
    <a href="https://www.w3schools.com/css/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/> 
    </a> 
    <a href="https://www.docker.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original-wordmark.svg" alt="docker" width="40" height="40"/> </a> <a href="https://git-scm.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/git-scm/git-scm-icon.svg" alt="git" width="40" height="40"/> </a> <a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/> </a>  <a href="https://www.linux.org/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/linux/linux-original.svg" alt="linux" width="40" height="40"/> </a>  <a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a>  <a href="https://spring.io/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/springio/springio-icon.svg" alt="spring" width="40" height="40"/> </a> </p>


<h3 align="left">Project LiberFly:</h3>
<h3 align="center">Olá seja bem vindo a documentação do projeto.</h3>

- O projeto atual já tem como base outro projeto que tenho realizado com estudos do canal especializa e com projetos próprios.
- Já é baseado em API o que facilita a integração.

#1 A lógica de login utilizava o padrão AUTH. O Login se concentra no Front End já que estou utilizando VUE3 com Laravel10+ e Inertia para unificar o Front e BackEnd.
#2 Instalar o PhpOpenSourceSaver
php artisan config:cache
php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret

'api' => [
    \App\Http\Middleware\EncryptCookies::class,
    ...
    \PHPOpenSourceSaver\JWTAuth\Http\Middleware\Authenticate::class,
],

#3 Separamos o modelo em containner APP, MYSQL, NGINX e Filas
#4 Nos forms utilizo API, REQUESTS, RESOURCES para PUT, PATCH, GET e POST de dados;
#5 A lógica implementada é de um APP PET

# Não conheceço o recurso SWAGGER

#7 Alterando a autenticação:
    Como o bloque de dados agora mudou e o retorno é em Json tivemos que alterar a função de busca. Além os dados sepecíficos do user_id necessitamos de dados também na tabela type_user que guarda informações sobre o tipo deste usuário;

/var/www/html/laravel_v1/app/Http/Controllers/Api/Auth/AuthController.php
  $user = auth()->user();
        $user->verificar = $user['id_int'];
        $typ_e = Type_user::find($user['type_user']);

Após pegar os dados do user autenticado passamos o id para buscar o tipo desse usuário.

Como respostas tempos

return response()->json([
            'status' => 'success',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);



- 📫 How to reach me **brunosmatias@gmail.com**

- 📄 Know about the system Curupira 

<h3 align="left">Connect with me:</h3>

