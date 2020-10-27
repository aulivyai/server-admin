<?php

use App\Components\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testValidateRequired()
    {
        $expectedErrors = ["This field is required"];

        $rules = [
            "required" => true,
        ];
        $validator = new Validator($rules);
        $actualErrors = $validator->validate("");
        $this->assertEquals($actualErrors, $expectedErrors);

        $expectedErrors = [];
        $actualErrors = $validator->validate("test");
        $this->assertEquals($actualErrors, $expectedErrors);
    }

    public function testValidateMaxLength()
    {
        $expectedErrors = ["This field is to long"];
        $rules = [
            "maxLength" => 10,
        ];
        $validator = new Validator($rules);
        $actualErrors = $validator->validate("12345678901");

        $this->assertEquals($actualErrors, $expectedErrors);


        $expectedErrors = [];
        $actualErrors = $validator->validate("test");
        $this->assertEquals($actualErrors, $expectedErrors);
    }

    public function testValidateMinLength()
    {
        $expectedErrors = ["This field is to short"];

        $rules = [
            "minLength" => 3,
        ];
        $validator = new Validator($rules);
        $actualErrors = $validator->validate("12");

        $this->assertEquals($actualErrors, $expectedErrors);

        $expectedErrors = [];
        $actualErrors = $validator->validate("test");
        $this->assertEquals($actualErrors, $expectedErrors);
    }


    public function testValidate2Rules()
    {

        $expectedErrors = ["This field is required", "This field is to short"];

        $rules = [
            "required" => true,
            "minLength" => 3,
        ];
        $validator = new Validator($rules);
        $actualErrors = $validator->validate("");

        $this->assertEquals($actualErrors, $expectedErrors);
    }
}
