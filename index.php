<?php

if (!isset($_SESSION)) {
    session_start();
}
require __DIR__ . '/autoload.php';
require __DIR__ . '/app/Router.php';
