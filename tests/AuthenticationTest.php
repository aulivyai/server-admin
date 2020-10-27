<?php

use Admin\App\Components\Authentication;
use PHPUnit\Framework\TestCase;

class AuthenticationTest extends TestCase
{
    public function testNotLoggedOnCreation()
    {
        $authentication = new Authentication("user", "password");
        $logged = $authentication->isLogged();
        $this->assertFalse($logged);
    }
    public function testErrorOnLogin()
    {
        $expected = "The username and password does not exists";

        $authentication = new Authentication("user", "password");
        $error = $authentication->login();
        $this->assertEquals($expected, $error);
    }
}
