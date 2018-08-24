<?php
    include_once 'database.php';

    // Instanciation de la première BDD
    $database = new Database(getenv("HOST"), getenv("PORT"), getenv("LOGIN"), getenv("PWD"), getenv("DB"));

    $result = $database -> query ("SELECT * FROM test");

    var_dump($result);

?>
