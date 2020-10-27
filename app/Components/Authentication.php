<?php

namespace App\Components;

use App\Config\Config;

class Authentication
{

    private $username;
    private $password;

    private $logged = false;

    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * try to login with the data provided
     * return an error if invalid
     */
    public function login()
    {
        // request data from DB
        $config = Config::$data["database"];
        $database = new Database($config["hostname"], $config["username"], $config["password"], $config["dbname"]);
        $result = $database->fetch("SELECT * FROM user WHERE username = :username", ["username" => $this->username]);
        $database->close();
        if (isset($result[0]["password"]) && password_verify($this->password, $result[0]["password"])) {
            $this->logged = true;
            session_regenerate_id();
            $_SESSION['name'] = $this->username;
            $_SESSION['logged'] = true;
        } else {
            return "The username and password does not exists";
        }
    }


    public function isLogged()
    {
        return $this->logged;
    }
}
