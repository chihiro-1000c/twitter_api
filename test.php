<?php

require "vendor/autoload.php";

use Coderjerk\BirdElephant\BirdElephant;

require __DIR__ . '/config.php';

//your credentials, should be passed in via $_ENV or similar, don't hardcode.
$credentials = array(
    'bearer_token' => TW_BT,
    'consumer_key' => TW_CK,
    'consumer_secret' => TW_CS,
    'token_identifier' => TW_AT,
    'token_secret' => TW_ATS,
);

//instantiate the object
$twitter = new BirdElephant($credentials);

//get a user's followers using the handy helper methods
// $followers = $twitter->user('chihiro_1000c')->followers();
// var_dump($followers);

$tweets = $twitter->tweets();
// ---------------------------------


// $tweet = (new \Coderjerk\BirdElephant\Compose\Tweet)->text("Hello from API");
// $tweets->tweet($tweet);

// ---------------------------------

$result = $tweets->likers('1502650186119913472');
var_dump($result);
?>