<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/matte97p/CRUD">
    <img src="storage/app/public/download.jpeg" alt="Logo">
  </a>

  <h3 align="center">SimplyCrud</h3>
  
  Creare un micro servizio in Laravel API centrico che gestisca un CRUD completo e con la lista di elementi paginati
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#built-with">Built With</a></li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#thunder-collenction">Thunder Collenction</a></li>
    <li><a href="#coding-guidelines">Coding Guidelines</a></li>
  </ol>
</details>

<!-- BUILT WITH -->

### Built With

<!---   [![Angular][angular.io]][angular-url]-->
-   [![Laravel][laravel.com]][laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

-   [php8.2][php8.2-download]
-   [composer][composer-download]
    ```sh
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    ```
-   [Laravel10][laravel10-download]
    ```sh
    composer global require laravel/installer
    ```
-   [Laravel Valet][laravel-valet-download]
    ```sh
    composer global require laravel/valet
    valet install
    cd ~/Sites
    valet park
    ```
-   [PostgreSQL][postgresql-download]

### Installation

1. Clone the repo
    ```sh
    git clone https://github.com/matte97p/CRUD.git
    ```
2. Install packages
    ```sh
    composer install
    ```
3. Create DB and upload [DB Backup][DB_DUMP]
    ```sh
    EG
    sudo -u postgres psql
    CREATE DATABASE wefox;
    CREATE USER mario with PASSWORD 'rossi';
    GRANT ALL PRIVILEGES ON DATABASE wefox to mario;
    ```
4. Create valet path
    ```sh
    valet link wefox
    valet secure wefox
    valet links
    ```
![image](https://user-images.githubusercontent.com/81815192/230135024-a4b21d89-2ec2-4a77-8308-4c755420c6aa.png)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- Thunder Collenction -->

## Thunder Collenction

[Thunder API Collection][thunder]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- Coding Guide Line -->

## Coding Guidelines

[PHP PSR 12 DOCS][php_psr12]
This section of the standard comprises what should be considered the standard coding elements that are required to ensure a high level of technical interoperability between shared PHP code.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->

[angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[angular-url]: https://angular.io/
[laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[laravel-url]: https://laravel.com
[php8.2-download]: https://www.php.net/downloads.php
[composer-download]: https://getcomposer.org/download/
[laravel10-download]: https://laravel.com/docs/10.x/installation
[laravel-valet-download]: https://laravel.com/docs/10.x/valet
[postgresql-download]: https://www.postgresql.org/download/
[php_psr12]: https://www.php-fig.org/psr/psr-12/
[thunder]: https://github.com/matte97p/WeFox/blob/5f2d1fa0fd21bb78daa8494d91a73b80d8ef4fa2/thunder-collection_WeFox.json
[DB_DUMP]: https://github.com/matte97p/WeFox/blob/5f2d1fa0fd21bb78daa8494d91a73b80d8ef4fa2/dump-wefox-202304032335
