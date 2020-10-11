<?php

function ResponJson($status, $message = "", $data)
{
    $fild = null;

    $status > 200 ? $fild = "error" : $fild = "data";
    return [
        "status_code" => $status,
        "message" => $message,
        $fild => $data,
    ];
}


function CheckEmail($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
