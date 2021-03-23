<?php

namespace Dvach\Controller;

use Dvach\Core\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $content = 'list.php';
        $template = 'template.php';
        $applicants = [
            [
                'name' => 'Семён',
                'lastname' => 'Персунов',
                'group' => '2C-H',
                'points' => '1337'
            ]
        ];

        $data = [
            'title' => 'Список абитуриентов',
            'applicants' => $applicants,
        ];

        echo $this->render($content, $template, $data);
    }
}
