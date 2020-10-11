<?php
function Connection()
{
    try {
        return [new PDO($_ENV["DB_CONNECT"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]), true];
    } catch (PDOException $e) {
        return [[false, 400, $e->getMessage()], false];
    }
}
