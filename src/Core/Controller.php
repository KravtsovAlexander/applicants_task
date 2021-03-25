<?php

namespace ApplicantTask\Core;

use ApplicantTask\ApplicantsMapper;

class Controller
{
    protected $mapper;

    public function __construct() {
        $this->mapper = new ApplicantsMapper();
    }

    /**
     * @param string $content name to a specific component view file
     * @param string $template name to a base template file
     * @param array $data template parameters
     * 
     * @return string|false built page
     */
    protected function render(string $content, string $template, array $data = [])
    {
        extract($data);
        ob_start();
        include_once __DIR__ . '/../View/' . $template;
        $page = ob_get_contents();
        ob_end_clean();

        return $page;
    }

    protected function isUser()
    {
        $cookie = $_COOKIE;
        if (isset($cookie['token'])) {
            return true;
        }

        return false;
    }
}
