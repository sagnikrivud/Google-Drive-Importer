# Google Drive Media Uploader (Public share URLs)

![](https://user-images.githubusercontent.com/24487280/71655121-0a3f7100-2d68-11ea-9660-d15ee80c7dfb.png)
<!-- [![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)


> **Note:** In the years since releasing Lumen, PHP has made a variety of wonderful performance improvements. For this reason, along with the availability of [Laravel Octane](https://laravel.com/docs/octane), we no longer recommend that you begin new projects with Lumen. Instead, we recommend always beginning new projects with [Laravel](https://laravel.com). -->
## Compatibility
- [PHP (8.0)](https://reintech.io/blog/installing-php-8-on-ubuntu-22)
- [Composer (2.0)](https://getcomposer.org/download)
- [Lumen (10.0)]()
- [Apache or Nginx](https://ubuntu.com/tutorials/install-and-configure-apache#2-installing-apache)
- [Mysql](https://dev.mysql.com/doc/mysql-getting-started/en/)

## Setup
> Clone the repo
```sh
$ git clone https://github.com/sagnikcapital/Google-Drive-Up-loader.git
```
> Create .env file
```sh
$ cp .env.example .env
```
> Composer install
```sh
$ composer install
```
> Update the Google Api key at .env (Refer: https://console.cloud.google.com/apis/)
```env
GOOGLE_API_KEY='your-google-api-key'
```
> Generate google client json file and put the file under application/public/Google/ 

> Fill the DB details at .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=''
DB_USERNAME=''
DB_PASSWORD=''
```
```sh
$ php artisan migrate
```

### Setup Superviser for Queue Job
```sh
$ apt-get install supervisor
```
```sh
$ systemctl status supervisor
```
> Follow this documentation: https://cloudkul.com/blog/how-to-install-and-configure-supervisor-on-ubuntu-20-04/
### Custom make Job command
```sh
$ php artisan make:job SampleJob
```
> File will be generate at app/Jobs/SampleJob.php
### Custom make Service command
```sh
$ php artisan make:service SampleService
```
> File will be generate at app/Services/SampleService.php

### Clear application cache
```sh
$ php artisan cache:remove
```

## API  Documentation
| API URL                 | Parameters          | Method   |
|-------------------------|---------------------|----------|
| `api/import/media`      | `public url`        | POST     |                    

Public Share URL(Example): https://www.dropbox.com/scl/fi/d9irp59qqlmfe0nvwcxn6/my-logo-1.mp3?rlkey=82bvxp7cjf6glsko6zw395tzv&dl=1 (Dropbox)
<!-- ## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions). -->

## 💻 Tech Stack
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=plastic&logo=css3&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=plastic&logo=php&logoColor=white) ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=plastic&logo=html5&logoColor=white) ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=plastic&logo=javascript&logoColor=%23F7DF1E) ![AWS](https://img.shields.io/badge/AWS-%23FF9900.svg?style=plastic&logo=amazon-aws&logoColor=white) ![Vue.js](https://img.shields.io/badge/vuejs-%2335495e.svg?style=plastic&logo=vuedotjs&logoColor=%234FC08D) ![Vuetify](https://img.shields.io/badge/Vuetify-1867C0?style=plastic&logo=vuetify&logoColor=AEDDFF) ![NPM](https://img.shields.io/badge/NPM-%23000000.svg?style=plastic&logo=npm&logoColor=white) ![jQuery](https://img.shields.io/badge/jquery-%230769AD.svg?style=plastic&logo=jquery&logoColor=white) ![Express.js](https://img.shields.io/badge/express.js-%23404d59.svg?style=plastic&logo=express&logoColor=%2361DAFB) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=plastic&logo=laravel&logoColor=white) ![NuxtJS](https://img.shields.io/badge/Nuxt-black?style=plastic&logo=nuxt.js&logoColor=white) ![Socket.io](https://img.shields.io/badge/Socket.io-black?style=plastic&logo=socket.io&badgeColor=010101) ![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=plastic&logo=apache&logoColor=white) ![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=plastic&logo=mariadb&logoColor=white) ![MongoDB](https://img.shields.io/badge/MongoDB-%234ea94b.svg?style=plastic&logo=mongodb&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=plastic&logo=mysql&logoColor=white) ![SQLite](https://img.shields.io/badge/sqlite-%2307405e.svg?style=plastic&logo=sqlite&logoColor=white) ![Inkscape](https://img.shields.io/badge/Inkscape-e0e0e0?style=plastic&logo=inkscape&logoColor=080A13) ![Jira](https://img.shields.io/badge/jira-%230A0FFF.svg?style=plastic&logo=jira&logoColor=white) ![Vagrant](https://img.shields.io/badge/vagrant-%231563FF.svg?style=plastic&logo=vagrant&logoColor=white)
![Shell](https://img.shields.io/badge/shell-%231563FF.svg?style=plastic&logo=shell&logoColor=white) ![Cakephp](https://img.shields.io/badge/cakephp-%23FF2D20.svg?style=plastic&logo=cakephp&logoColor=white) ![Arduino](https://img.shields.io/badge/arduino-%231563FF.svg?style=plastic&logo=arduino&logoColor=white) ![C++](https://img.shields.io/badge/c++-%231563FF.svg?style=plastic&logo=cplusplus&logoColor=white) ![MsSQLServer](https://img.shields.io/badge/mssql-%23FF2D20.svg?style=plastic&logo=microsoft-sql-server&logoColor=white) ![CodeIgniter](https://img.shields.io/badge/CodeIgniter-%23FF2D20.svg?style=plastic&logo=codeigniter&logoColor=white) ![Lumen](https://img.shields.io/badge/Lumen-%23FF2D20.svg?style=plastic&logo=lumen&logoColor=white) ![Node.js](https://img.shields.io/badge/Node.js-%2343853D.svg?style=plastic&logo=node.js&logoColor=white)



