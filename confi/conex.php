<?php
$dbserver = 'mysql:dbname=eje;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dbserver, $user, $password);
} catch (PDOException $e) {
    echo 'la conexion ha fallado: ' . $e->getMessage();
}

?>
                                                
