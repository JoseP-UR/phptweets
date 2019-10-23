<?php
    session_start();

    if (!isset($_GET['id']) || !$_GET['id']) {
        $_SESSION['removeerror'] = 'Cant delete this';
        header('Location: index.php');
        die ('no');
    }
    require "vendor/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    define('ACCESS_TOKEN', 'YOUR_APP_ACESS_TOKEN');
    define('ACCESS_TOKEN_SECRET', 'YOUR_APP_ACCESS_TOKEN_SECRET');
    $consumer_key = 'CONSUMER_KEY';
    $consumer_secret = 'CONSUMER_SECRET';


    $connection = new TwitterOAuth($consumer_key, $consumer_secret, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

    $statues = $connection->post("statuses/destroy", ["id" => $_GET['id']]);
    $_SESSION['removeerror'] = '';
    header('Location: index.php');


?>