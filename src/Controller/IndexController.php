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
        $mapper = new ApplicantsMapper();
        $applicants = $mapper->getApplicants();
        
        $data = [
            'title' => 'Список абитуриентов',
            'applicants' => $applicants,
        ];

        echo $this->render($content, $template, $data);
    }
}
