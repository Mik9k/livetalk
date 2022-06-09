<?php

//BAE URL
define('URL', 'http://localhost/livetalkapp/');

//DATA BASE CONFIGURATION
define('HOST', 'localhost');
define('DB', 'LIVETALK');
define('USER', 'root');
define('PASSWORD', "root");
define('CHARSET', 'utf8mb4');

//REGEX STRINGS
define('EMAILREGEX', "/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/");
define('PHONEREGEX', "/\d{10}/");
define('LETTERSREGEX', "/^[a-zA-Z]+$/");
define('PASSWORDREGEX', "/^(?=.*[A-Z])(?=.*\d)(?=.*[¡#\$%&/=\?!¿:;,\.\-_\+\*\[\]\{\}]).{8,}$/");

//REQUEST STATUS
define('BAD_REQUEST', 400);
define('CREATED', 201);

//SESSION NAME CONSTANT
define('SESSION_NAME', 'USER');


?>