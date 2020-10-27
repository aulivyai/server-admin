<?php

namespace Admin\App\Components;

class Validator
{

    /**
     * format is
     * [
     *  "required" => bool,
     *  "maxLength" => number,
     *  "minLength" => number,
     * ]
     */
    private $rules = [];

    function __construct($rules)
    {
        $this->rules = $rules;
    }

    /**
     * returns the errors corresponding to the rules
     * @param string $data data to validate
     */
    public function validate($data)
    {
        $errors = [];
        foreach ($this->rules as $ruleName => $rule) {
            switch ($ruleName) {
                case "required":
                    if ($rule === true && empty($data)) {
                        $errors[] = "This field is required";
                    }
                    break;
                case "maxLength":
                    if (strlen($data) > $rule) {
                        $errors[] = "This field is to long";
                    }
                    break;
                case "minLength":
                    if (strlen($data) < $rule) {
                        $errors[] = "This field is to short";
                    }
                    break;
            }
        }
        return $errors;
    }
}
