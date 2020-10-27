<?php

namespace App;

use App\Controllers\LoginController;
use App\Controllers\AdminController;

if (isset($_SESSION['logged'])) {
    $controller = new AdminController();
    if (isset($_POST["disconnect"])) {
        $controller->logout();
    } elseif (isset($_POST["remove"])) {
        $controller->remove();
    } elseif (isset($_POST["add"])) {
        $controller->add();
    } else {
        $controller->index();
    }
} else {
    $controller = new LoginController();
    $controller->index();
}
