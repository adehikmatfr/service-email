<?php

use Firebase\JWT\JWT;

class GetToken
{
    function GenerateToken()
    {

        $key = $_ENV["API_KEY"];
        $payload = array(
            "api_key" => $key,
        );

        JWT::$leeway = 60;
        $jwt = JWT::encode($payload, $key);

        return [true, 200, ["token" => $jwt]];
    }
}
