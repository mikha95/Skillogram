<?php 

function connect() {
    $host = 'localhost';
    $dbname = 'myBase';
    $user = 'root';
    $passdb = '';
    $charset = 'utf8';
    
    $dsn = "mysql:host=$host; dbname=$dbname; $charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($dsn, $user, $passdb, $opt);
}    

$db = connect();
$db->exec("SET NAMES UTF8");
?>