<?php

require_once(dirname(__DIR__).'/vendor/autoload.php');

if (file_exists(dirname(__DIR__) . '/.env.test')) {
    (new \Dotenv\Dotenv(dirname(__DIR__), '/.env.test'))->load();
}
