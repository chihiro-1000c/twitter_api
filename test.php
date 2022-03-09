<?php

// TwitterOAuthを利用するためComposerのautoload.phpを読み込み
require __DIR__ . '/vendor/autoload.php';
// TwitterOAuthクラスをインポート
use Abraham\TwitterOAuth\TwitterOAuth;

// Twitter APIを利用するための認証情報。xxxxxxxxの箇所にそれぞれの情報をセット
const TW_CK = 'xxxxxxxx'; // Consumer Keyをセット
const TW_CS = 'xxxxxxxx'; // Consumer Secretをセット
const TW_AT = 'xxxxxxxx'; // Access Tokenをセット
const TW_ATS = 'xxxxxxxx'; // Access Token Secretをセット

// TwitterOAuthクラスのインスタンスを作成
$connect = new TwitterOAuth( TW_CK, TW_CS, TW_AT, TW_ATS );
// Twitter API v2. を利用する場合
$connect->setApiVersion('2');

$tweet = 'xxxxxxxx';
$result = $connect->post(
    'statuses/update',
    array(
		// 投稿するツイートを指定
        'status' => $tweet
    )
); 

?>