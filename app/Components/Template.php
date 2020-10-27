<?php

namespace App\Components;

class Template
{

    /** template value */
    public $data = [];

    function getRender($file)
    {
        if (!is_file($file)) {
            throw new \RuntimeException("template file not found: " . $file);
        }

        $result = function ($template, array $data = array()) {
            ob_start();
            extract($data, EXTR_SKIP);
            try {
                include $template;
            } catch (\Exception $e) {
                ob_end_clean();
                throw $e;
            }
            return ob_get_clean();
        };

        // call the closure
        return $result($file, $this->data);
    }

    function render($file)
    {
        echo $this->getRender($file);
    }
}
