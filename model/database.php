<?php
    //local development server connection
    $dsn = 'mysql:host=localhost;dbname=quotesfordays';
    $username = 'root';
    $password = 'kait0930';

    // Heroku connection
    /*
    $dsn = 'mysql:host=AVeryLongURLprovidedforJawsDBhost;dbname=YourJawsDBdbname';
    $username = 'Your JawsDB username';
    $password = 'Your JawsDB password';
    */
    try {
        //local development server connection
        //if using a $password, add it as 3rd parameter
        $db = new PDO($dsn, $username, $password);

        // Heroku connection
        //$db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
