<?php

define('NAME','Agritech shop');
define('DEBUG',"true");

if($_SERVER['SERVER_NAME'] == 'localhost')
{
    define('DBHOST','127.0.0.1');
    define('DBUSER','root');
    define('DBNAME','farmer-expoter');
    define('DBDRIVER','mysql');
    define('DBPASS','');
    define('ROOT','http://localhost/PROJECTS/farmer-expoter/public_html/');
}
else
{
    define('DBHOST','localhost');
    define('DBUSER','id18446227_guru');
    define('DBNAME','id18446227_agritech');
    define('DBDRIVER','mysql');
    define('DBPASS','7sCSsfSjkrJj6Y7)');
    define('ROOT','https://cyber-mentor1.000webhostapp.com');
}

