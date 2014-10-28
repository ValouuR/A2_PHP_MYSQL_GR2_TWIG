<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

function getDatabaseLink(array $config) {
    return mysqli_connect(
        $config['hostname'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );
}

function closeDatabaseLink($link) {
    return mysqli_close($link);
}

$dsn = 'mysql:host=localhost;dbname=blog';
$user = 'root';
$password = '';

try{
    $db = new PDO($dsn, $user, $password);
}catch (PDOException $e){
    mail('valrogen@hotmail.fr', 'Erreur sur mon site', $e->getMessage());
    echo 'Erreur de connexion à la BDD';
    die;
}