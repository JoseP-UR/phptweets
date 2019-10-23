<?php
session_start();

require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;


define('ACCESS_TOKEN', 'YOUR_APP_ACESS_TOKEN');
define('ACCESS_TOKEN_SECRET', 'YOUR_APP_ACCESS_TOKEN_SECRET');
$consumer_key = 'CONSUMER_KEY';
$consumer_secret = 'CONSUMER_SECRET';


$connection = new TwitterOAuth($consumer_key, $consumer_secret, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$content = $connection->get("account/verify_credentials");

$statuses = $connection->get("statuses/user_timeline", ["count" => 25, "list_id" => 1186480204669161473]);

?>

<html>

<head>
    <title>
        My twitter front page
    </title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="main">
        <h1 class="title">Your Tweets</h1>

        <div class="form-container">
            <div class="error-container"><?php if (isset($_SESSION['posterror'])) {
                                                echo $_SESSION['posterror'];
                                            } ?></div>
            <form action="./newtweet.php" method="POST">
                <input type="text" name="content">
                <input type="submit" value="New tweet">
            </form>
        </div>

        <?php
        foreach ($statuses as $stat) {
            ?>
            <div class="tweet-container">
                <h3 class="-content"><?php echo "$stat->text" ?></h3>
                <div class="-user">
                    <?php
                        echo '<img class="-picture" src="' . $stat->user->profile_image_url . '">';
                        echo '<span class="-name">' . $stat->user->name . '</span>';
                        echo '<a class="-remove" href="./removetweet.php?id=' . $stat->id_str . '">X</a>';
                        ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>