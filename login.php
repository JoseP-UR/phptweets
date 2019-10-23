<?php 
//TEST WITH OAUTH (NOT BEING USED)
    require 'vendor/autoload.php';
    use Abraham\TwitterOAuth\TwitterOAuth;
    
    define('CONSUMER_KEY', getenv('CONSUMER_KEY'));
    define('CONSUMER_SECRET', getenv('CONSUMER_SECRET'));
    define('OAUTH_CALLBACK', getenv('OAUTH_CALLBACK'));
    
    $consumer_key = 'CONSUMER_KEY';
    $consumer_secret = 'CONSUMER_SECRET';

    // $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
    $connection = new TwitterOAuth($consumer_key, $consumer_secret);

    $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

    $_SESSION['oauth_token'] = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

    $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

    var_dump($request_token);
    var_dump($url);

    
?>