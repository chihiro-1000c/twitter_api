<?php
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

require __DIR__ . '/config.php';
$connection = new TwitterOAuth(TW_CK, TW_CS, TW_AT, TW_ATS);

date_default_timezone_set('Asia/Tokyo');
$today = new DateTime('now');
$formatedToday = $today->format('Y-m-d');

$start        = new DateTime('2022-04-01');
$current      = new DateTime($formatedToday);
$end          = new DateTime('2023-04-01');

$elapsedDays  = $start->diff($current)->format("%r%a") + 1;
$intervalDays = $current->diff($end)->format("%r%a");

// $user_data = $connection->get("users/show/chihiro_1000c");
// $description = $user_data->description;

$profile_name = "ちひろ@Webエンジニアのたまご🐣";
$description = "${intervalDays}日後に開発エンジニアになるちひろです!!｜新人コーダー1年目(2022.4.1 ~) 今日で${elapsedDays}日目!!｜業務はhtml/CSS/JavaScript/WordPress ゴリゴリ｜プログラミング学習中｜勉強する → React, Laravel, sql｜好き → 散歩🐾お肉🍖お寿司🍣｜ごめんなさい本名ですが👦です!!";


$greets = [
  "Good morning!",
  "Bonjour!",
  "Guten Morgen!",
  "Buenos Dias!",
  "Buongiorno!",
  "Bom dia!",
  "Goede morgen!",
  "Gunaydin!",
  "God morogon!"
];

$greet_key = array_rand($greets);
$greet = $greets[$greet_key];

$tweet = "
${greet}
おはようございます！

今日で学習${elapsedDays}日目!!
${intervalDays}日後に開発エンジニアになるぞ〜!!
";

//画像のパス
$image_url = "https://grass-graph.appspot.com/images/chihiro-1000c.png";
$image = file_get_contents($image_url);
//保存するファイル名
$file_name = "chihiro-1000c_${formatedToday}.jpg";
$save_path = "./files/" . $file_name;
file_put_contents($save_path, $image);
$imageId = $connection->upload('media/upload', ['media' => $save_path]);


$connection->post("account/update_profile", [
  "name" => $profile_name,
  "description" => $description
]);
$connection->post("statuses/update", array(
  "status" => $tweet,
  'media_ids' => implode(',', [
    $imageId->media_id_string
  ])
));
