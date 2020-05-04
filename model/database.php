<?php
    //local development server connection
    /*
    $dsn = 'mysql:host=localhost;dbname=quotesfordays';
    $username = 'root';
    $password = 'pas55word';
    */

    // Heroku connection
    $dsn = 'mysql:host=ma803v5cy3zrqexa:j6k0ipxrv6i523sy@ol5tz0yvwp930510.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/zqka8kgu585ceune';
    $username = 'ma803v5cy3zrqexa';
    $password = 'j6k0ipxrv6i523sy';
    try {
        //local development server connection
        //if using a $password, add it as 3rd parameter
        //$db = new PDO($dsn, $username, $password);

        // Heroku connection
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
