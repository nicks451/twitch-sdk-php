<?php

require '../vendor/autoload.php';
require 'config.php';

$provider = new \Depotwarehouse\OAuth2\Client\Twitch\Provider\Twitch(
    $config
);

if (isset($_GET['code']) && $_GET['code']) {
    $token = $provider->getAccessToken("authorization_code", [
        'code' => $_GET['code']
    ]);

    $twitchSDK = new \Nicks451\TwitchSDK\TwitchSDK($token);

    $response = $twitchSDK->isSubscribed("dmbrandon", "nicks451");

    var_dump($response);


} else {
    header('Location: ' . $provider->getAuthorizationUrl());
}
