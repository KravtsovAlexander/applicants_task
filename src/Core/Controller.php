<?php

namespace Dvach\Core;

class Controller
{
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
}
