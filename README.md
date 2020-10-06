**УСТАНОВКА ШАБЛОНА**
---
    docker + docker-compose + nginx + php-fpm + mysql
    nginx
    mysql v 5.7
    php v7.3
    
    Примеры кода на Laravel по видео 14-21 на DKA_DEVELOP - Laravel и Vue (Realtime app)
    https://www.youtube.com/playlist?list=PLD5U-C5KK50X1KcfueA73sGSjBsd8vgVG

1._***GIT***
> ***пример:***
- создание репо из bash:
>
    BITBUCKET
    curl -X POST -v -u coder-ex@yandex.ru:pass_xxx -H "Content-Type: application/json" https://api.bitbucket.org/2.0/repositories/webcommands/template_laravel -d '{"scm": "git", "project": { "key": "WTPROJ" }, "is_private": "true", "fork_policy": "no_public_forks" }'
    GITHUB
    curl -u 'coder-ex@yandex.ru' https://api.github.com/user/repos -d'{"name":"template_laravel"}'
- получение данных о репо:
>
    curl -q -X GET -u coder-ex@yandex.ru:Pass_2019_01 -o curl_20 https://coder-ex@bitbucket.org/webcommands/template_laravel
***
- перейти в каталог разработки - !! не проекта !!
>
    cd path_devel
- получить репозиторий:
>
    git clone https://coder-ex@bitbucket.org/webcommands/template.git
- переименовать шаблон в каталог проекта:
>
    mv template name_project
- перейти в каталог проекта:
>
    cd name_project
- основные команды git:
>
    git add -A
    git commit
    git show --name-only
    git push -u origin master
- если репо создаем из командной строки, то
>
    git remote add origin https://coder-ex@bitbucket.org/webcommands/template_laravel.git

2._***[DOCKER](https://docs.docker.com/install/linux/docker-ce/ubuntu/)***
---

- если ранее стояла старая версия то удалим:
>
    sudo apt-get remove docker docker-engine docker.io
    содержимое /var/lib/docker/ сохраниться

    sudo apt-get update
    sudo apt-get install apt-transport-https ca-certificates curl software-properties-common
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
- проверим ключь:
>
    sudo apt-key fingerprint 0EBFCD88
    pub 4096R/0EBFCD88 2017-02-22
    Key fingerprint = 9DC8 5822 9FC7 DD38 854A  E2D8 8D81 803C 0EBF CD88
    uid Docker Release (CE deb) <docker@docker.com>
    sub 4096R/F273FCD8 2017-02-22
- установка репозитория для Ubuntu:
>
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
- установка репозитория для Linux Mint 18.3:
>
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu xenial stable"
    sudo apt-get update
- установка docker:
>
    sudo apt install docker-ce
    docker login -u dkadevel
- установка docker-compose:
>
    sudo curl -L "https://github.com/docker/compose/releases/download/1.27.1/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
- Примените разрешения для исполняемого файла к двоичному файлу:
>
    sudo chmod +x /usr/local/bin/docker-compose

- получение образа docker:
>
    docker build -t node-reload .
- создание контейнера:
>
    docker run -it -d --name gulp-up -p 8000:3000 -p 8001:3001 -v $(pwd)/source:/var/www/node_app node-reload
- подключение к запущенному контейнеру:
>
    docker exec -it gulp-up /bin/bash
- старт / остановка контейнера:
>
    docker start / stop gulp-up
- проверка контейнеров:
>
    docker ps -a
- удаление всех остановленных контейнеров:
>
    docker rm -f $(docker ps -aq -f status=exited)
- удаление всех образов:
>
    docker rmi -f $(docker images -aq)
- просмотр установленных томов:
>
    docker volumes
- команды docker
>
    docker build -t node-reload . - получение образа docker
    docker run --rm -ti python:3.6 /bin/bash - запуск контейнера с последующим удалением
    docker run -it -d --name gulp-up -p 8000:3000 -p 8001:3001 -v $(pwd)/source:/var/www/node_app node-reload - создание контейнера
    docker exec -it gulp-up /bin/bash - подключение к запущенному контейнеру
    docker start / stop gulp-up - старт / остановка контейнера
    docker ps -a - проверка контейнеров
    docker rm -f $(docker ps -aq -f status=exited) - удаление всех остановленных контейнеров
    docker rmi -f $(docker images -aq) - удаление всех образов
    docker volume - просмотр установленных томов
    docker images - просмотр образов
    docker system prune - очистка истаточной информации в конфигурациях
    docker inspect start-php_mysql_1 | grep IPAddress - проверка IP адреса по которому биндится контейнер
- команды docker-compose
>
    docker-compose config - проверка конфигурации
    docker-compose down - удаление контейнеров
    docker-compose up - запуск контейнеров
    docker-compose up --build - конфигурирование и запуск контейнеров
    docker-compose up -d --force --build - переконфигурирование контейнеров
    docker-compose up -d --force-recreate --build - переконфигурирование контейнеров
    docker-compose stop - остановка контейнеров
    docker-compose rm -f - удаление временных файлов
    docker-compose run web django-admin.py startproject source . - сборка контейнеров с командой запуска для контейнера web

3._***ДОНАСТРОЙКА СВЯЗКИ REST***
---
- команды консоли Laravel
>
    composer create-project --prefer-dist laravel/laravel project "7.0.*" - инсталяция нового проекта с версией 7.0.x
    (с версией 8.0.x не все пока ровно)
    пароль для root == root (su)
    cd project
    php artisan - команды консоли
- установка REST (хранилище в памяти, не реляционная СУБД)
>
    apt-get install -y redis-server
>    redis-server /etc/redis/redis.conf - запуск сервера
>    redis-cli: ping -> ответ PONG - проверка
>    redis-cli: BGSAVE или SAVE - создание db redis /var/lib/redis/dump.rdb
- настройка redis во фреймворке
>
    изменить в .env BROADCAST_DRIVER=log на BROADCAST_DRIVER=redis
    изменить в /config/database.php
>    'redis' => [
>        /*'client' => env('REDIS_CLIENT', 'phpredis'),*/
>        'client' => env('REDIS_CLIENT', 'predis'),
>        'options' => [
>            'cluster' => env('REDIS_CLUSTER', 'redis'),
>            'prefix' => "",
>            /*'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),*/
>        ],

    composer require predis/predis
    npm install express - (базовая библиотека для фреймворка NodeJS)
    npm install ioredis - клиент для REDIS сервера
    npm install socket.io - библиотека для обмена данными в реальном времени (websocket, сервер)
    npm install socket.io-client - websocket, client

4._**NODEJS ЗАПУСК ИНСТАЛЯЦИИ ШАБЛОНА В КОНТЕЙНЕРЕ**
---
- установка на локальном уровне:
>
    npm install
    (как установить bootstrap и vue смотреть в доках на https://laravel.com/docs/7.x/frontend
    npm install && npm run dev

- запуск на автосборку css и js
>
    npm run watch-poll - автоматически отслеживает изменения и пересобирает в /public
    (в package.json изменить версию с 8.0.0 на "sass-loader": "^7.0.0", что бы не было ошибок при пересборке)

- команды npm (можно использовать yarn, он быстрее)
>
    npm install - установка пакетов и связей на основе package.json
    npm up - установка пакетов и связей с обновлением новых пакетов на основе package.json
    npm init - создание package.json
    npm ls -g --depth=0 - просмотр пакетов которые установлены самостоятельно, на нулевом уровне вложенности
    npm i -g npm-check-updates - проверка обновлений пакетов
    ncu -u - проверка и установка обновлений
- добавление автоподстановки пакетов в npm
>
    npm completion >> ~/.bashrc
    source ~/.bashrc
- как подключить owl carousel в laravel ?
>
    Устанавливаем через npm или yarn:
    npm i -s vue-owl-carouse
    Подключаем в bootstrap.js
    - Laravel ниже 5.7 resources/assets/js/bootstrap.js
    - Laravel 5.7 и выше resources/js/bootstrap.js
    require('owl.carousel');
    После window.$ = window.jQuery = require('jquery');
    И там же или в app.js:
      $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
      });
    Главное после подключения jQuery!
    Также необходимо подключить css, для owl carousel это:
    @import '~owl.carousel/dist/assets/owl.carousel';
    В файле: app.scss
    - Laravel 5.7: resources/sass/app.scss
    - Laravel 5.6 и ниже: resources/assets/sass/app.scss
    Затем необходимо пересоздать код: npm run dev
    👉npm run dev - для режима разработки, без сжатия

    И уже в шаблоне обычная разметка для работы слайдера:
      div class="owl-carousel"
        div Your Content /div
        div Your Content /div
        div Your Content /div
      /div
    🙈В коде теги обрезаны!
---
