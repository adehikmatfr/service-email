<?php

use PhpAmqpLib\Message\AMQPMessage;

function RmQueue($email, $message)
{
    $connection = amcpConnect();
    $channel = $connection->channel();
    $channel->queue_declare('send_email', false, false, false, false);

    $json = '{"email":"' . $email . '","message":"' . $message . '"}';
    $data = base64_encode($json);
    $msg = new AMQPMessage($data);
    $channel->basic_publish($msg, '', 'send_email');

    $channel->close();
    $connection->close();
}
