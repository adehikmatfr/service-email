<?php

use Firebase\JWT\JWT;

function TokenVerify($Authorization)
{
    $key = $_ENV["API_KEY"];

    if (empty($Authorization)) {
        return [false, 401, "Token Required !"];
    }
    $tokn = explode(" ", $Authorization);

    $decoded = JWT::decode($tokn[1], $key, array('HS256'));
    if ($decoded->api_key !== $key) {
        return [false, 401, "Wrong token !"];
    }
    return [true];
}
