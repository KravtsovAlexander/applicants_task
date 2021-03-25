<?php

namespace ApplicantTask\Controller;

use ApplicantTask\ApplicantsMapper;
use ApplicantTask\Core\Controller;
use ApplicantTask\Pager;

class IndexController extends Controller
{
    private $recordPerPage = 50;

    public function indexAction()
    {
        $this->pageAction(1);
    }

    public function pageAction($page)
    {
        $content = 'list.php';
        $template = 'template.php';

        $pager = new Pager($this->mapper->getTotal(), $this->recordPerPage, '/index/page/');
        $pages = $pager->getPages();
        $applicants = $this->mapper
            ->getApplicants($this->recordPerPage, ($page - 1) * $this->recordPerPage);

        $data = [
            'title' => 'Список абитуриентов',
            'applicants' => $applicants,
            'isUser' => $this->isUser(),
            'pages' => count($pages) > 1 ? $pages : null,
        ];

        echo $this->render($content, $template, $data);

    }

    private function renderPage($page)
    {
        $content = 'list.php';
        $template = 'template.php';
        $data = [
            'title' => 'Список абитуриентов',
            'applicants' => $applicants,
            'isUser' => $this->isUser(),
            'pages' => count($pages) > 1 ? $pages : null,
        ];
    }
}
