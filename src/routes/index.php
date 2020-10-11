<?php

$klein = new \Klein\Klein();

$klein->respond('POST', '/send', function ($req, $res) {
    $send = new SendEmailController;

    $data = $send->store($req);
    if (!$data[0]) {
        return $res->code($data[1])->json(ResponJson($data[1], "failed", $data[2]));
    } else {
        return $res->code($data[1])->json(ResponJson($data[1], "success", $data[2]));
    }
});

$klein->dispatch();
