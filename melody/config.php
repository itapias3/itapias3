<?php
$databaseHost = 'localhost';
$databaseName = 'melody_ussers';
$databaseUsername ='root';
$databasePassword = '';

try {
    $connect = new PDO("mysql:host={$databaseHost}; dbname={$databaseName}",
    $databaseUsername, $databasePassword);

    $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>