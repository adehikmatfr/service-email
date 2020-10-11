<?php

$klein = new \Klein\Klein();

$klein->respond('POST', '/send', function ($req, $res) {
    $send = new SendEmailController;
    $auth = $req->headers()->Authorization;

    $verify = TokenVerify($auth);
    if (!$verify[0]) return $res->code($verify[1])->json(ResponJson($verify[1], "failed", $verify[2]));

    $data = $send->store($req);
    if (!$data[0]) {
        return $res->code($data[1])->json(ResponJson($data[1], "failed", $data[2]));
    } else {
        return $res->code($data[1])->json(ResponJson($data[1], "success", $data[2]));
    }
});

$klein->respond("GET", "/token", function ($req, $res) {
    $get = new GetToken;

    $data = $get->GenerateToken();
    if (!$data[0]) {
        return $res->code($data[1])->json(ResponJson($data[1], "failed", $data[2]));
    } else {
        return $res->code($data[1])->json(ResponJson($data[1], "success", $data[2]));
    }
});

$klein->dispatch();
