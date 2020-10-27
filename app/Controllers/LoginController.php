<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Components\Authentication;
use App\Components\Template;
use App\Components\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $view = new Template();
        $page = new Template();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = isset($_POST["inputUsername"]) ? $_POST["inputUsername"] : null;
            $password = isset($_POST["inputPassword"]) ? $_POST["inputPassword"] : null;

            // validate data
            $usernameRules = [
                "required" => true,
            ];
            $passwordRules = [
                "required" => true,
                "minLength" => 3,
            ];
            $usernameValidator = new Validator($usernameRules);
            $passwordValidator = new Validator($passwordRules);
            $usernameErrors = $usernameValidator->validate($username);
            $passwordErrors = $passwordValidator->validate($password);

            //authenticate
            $errors = [];
            if (empty($usernameErrors) && empty($passwordErrors)) {
                $authentication = new Authentication($username, $password);
                $errors = $authentication->login();
                if ($authentication->isLogged()) {
                    header("Location: index.php");
                    exit;
                }
            }

            // view layout data
            $view->data['errors'] = [
                "username" => $usernameErrors,
                "password" => $passwordErrors,
                "global" => $errors,
            ];
        }

        // page layout data
        $page->data['title'] = 'Login - Server manager';
        $page->data['content'] = $view->getRender('templates/Login.php');

        // render
        echo $page->getRender('templates/Layout.php');
    }
}
