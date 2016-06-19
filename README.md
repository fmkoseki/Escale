Escale resolução do problema
========================

##### Clone o projeto, preferencialmente na pasta /var/www/:
1. git clone https://github.com/fmkoseki/Escale

##### Instalar o web server (nginx):
2. apt-get install nginx

##### Instalar o fast cgi do php:
3. apt-get install php5-fpm

##### Baixar o composer:
4. https://getcomposer.org/download/

##### Instalar composer globalmente:
4. Instalar global: mv composer.phar /usr/local/bin/composer

##### Na pasta raiz do projeto, rode o seguinte comando para instalar as dependencias do projeto:
4. sudo composer install

OBS: se der erro por causa da lib curl estar faltando, rode o comando apt-get install php5-curl

##### Habilitar o vhost www.escale.dev:
5. Crie um novo arquivo de vhost no nginx, com o conteúdo do arquivo nginx.conf que está na pasta raiz deste projeto, na pasta /etc/nginx/sites-available;
    
OBS: Caso não tenha sido possível clonar o projeto na pasta /var/www, mude a terceira linha do arquivo nginx.conf para o path aonde clonou o projeto;

##### Dar permissão para o www-data processar os arquivos da aplicação:
6. sudo chown -R www-data:www-data /var/www/Escale


Consumir aplicação
------------------

##### Sort por ordem alphabética do nome do projeto:
http://www.escale.dev/api/v1/starred?name=alphabetical

##### Sort pela quantidade de stars:

1. Em ordem crescente:
http://www.escale.dev/api/v1/starred?stars=asc

2. Em ordem decrescente:
http://www.escale.dev/api/v1/starred?stars=desc

##### Sort pela quantidade de open issues:

1. Em ordem crescente:
http://www.escale.dev/api/v1/starred?openIssues=asc 

2. Em ordem decrescente:
http://www.escale.dev/api/v1/starred?openIssues=desc

##### Filtro pela nome da linguagem:
http://www.escale.dev/api/v1/starred?language=JavaScript

##### Também é possível fazer filtro e sort:
http://www.escale.dev/api/v1/starred?language=JavaScript&stars=desc
