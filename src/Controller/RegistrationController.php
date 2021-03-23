<?php

namespace Dvach\Controller;

use Dvach\Core\Controller;

class RegistrationController extends Controller
{
    public function indexAction()
    {
        $content = 'registration.php';
        $template = 'template.php';
        $data = [
            'title' => 'Регистрация',
        ];

        echo $this->render($content, $template, $data);
    }
}