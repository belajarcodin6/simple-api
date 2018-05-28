<?php
// Routes
use \Firebase\JWT\JWT;
date_default_timezone_set('Asia/Jakarta');

function GUID() {
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
};

$app->get('/lala/', function($request, $response, $args){
    $res = GUID();
    return $response
            ->withStatus(200)
            ->withHeader('Content-type', 'application/json')
            ->write(json_encode($res));
});












