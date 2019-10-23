<?php
    session_start();

    if (!isset($_POST['content']) || !$_POST['content']) {
        $_SESSION['posterror'] = 'Please fill the form in with something';
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

    $statues = $connection->post("statuses/update", ["status" => $_POST['content']]);
    $_SESSION['posterror'] = '';
    header('Location: index.php');


?>