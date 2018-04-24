<?php
    include_once 'database.php';

    // Instanciation de la première BDD
    $database = new Database('localhost', 3306, 'root', '', 'test');

    $result = $database -> query ("SELECT * FROM test");

    var_dump($result);

?>