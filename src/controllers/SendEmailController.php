<?php

class SendEmailController
{
    function store($data)
    {
        $con = Connection();
        if (!$con[1]) return $con[0];

        $email = htmlspecialchars($data->email);
        $msg =  htmlspecialchars($data->message);

        if (empty($email) || empty($msg)) {
            return [false, 422, "email or message required"];
        }
        if (!CheckEmail($email)) {
            return [false, 422, "invalid email"];
        }

        $query = "INSERT INTO send_email VALUES ('','$email', '$msg')";

        $row = $con[0]->query($query);

        if ($row->rowCount() > 0) {
            RmQueue($email, $msg);
            return [true, 200, "pesan berhasil di kirim"];
        }
        return [false, 400, "pesan gagal di kirim"];
    }
}
