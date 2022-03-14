<?php
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

require __DIR__ . '/config.php';
$connection = new TwitterOAuth(TW_CK, TW_CS, TW_AT, TW_ATS);

date_default_timezone_set('Asia/Tokyo');
$today = new DateTime('now');
$formatedToday = $today->format('Y-m-d');

$start        = new DateTime('2022-03-14');
$current      = new DateTime($formatedToday);
$end          = new DateTime('2023-04-01');

$elapsedDays  = $start->diff($current)->format("%r%a") + 1;
$intervalDays = $current->diff($end)->format("%r%a");

if($intervalDays >= 1) {
  $profile_name = "ちひろ@${intervalDays}日後に開発エンジニアに転職するコーダー（${elapsedDays}日目）";
} else {
  $profile_name = "ちひろ@エンジニア";
}

$profile_request = $connection->post("account/update_profile", ["name" => $profile_name]);

?>