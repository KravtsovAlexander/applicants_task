<?php

namespace ApplicantTask\Controller;

use ApplicantTask\ApplicantsMapper;
use ApplicantTask\Core\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $content = 'list.php';
        $template = 'template.php';
        $applicants = $this->mapper->getApplicants();
        
        $data = [
            'title' => 'Список абитуриентов',
            'applicants' => $applicants,
            'isUser' => $this->isUser(),
        ];

        echo $this->render($content, $template, $data);
    }
}
