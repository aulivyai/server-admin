<?php
if (!isset($_SESSION)) {
    session_start();
}
require dirname(__DIR__) . '/admin/autoload.php';
require dirname(__DIR__) . '/admin/app/Router.php';
