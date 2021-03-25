<?php

namespace ApplicantTask\Controller;

use ApplicantTask\Core\Controller;
use ApplicantTask\Pager;

class IndexController extends Controller
{
    private $recordPerPage = 40;
    private $pager;

    public function __construct() {
        parent::__construct();
        $this->pager = new Pager($this->mapper->getTotal(), $this->recordPerPage, '/index/page/');
    }

    public function indexAction()
    {
        $this->pageAction(1);
    }

    public function pageAction($page)
    {
        $content = 'list.php';
        $template = 'template.php';

        $applicants = $this->mapper
            ->getApplicants($this->recordPerPage, ($page - 1) * $this->recordPerPage);

        $pages = $this->pager->getPages();
        $data = [
            'title' => 'Список абитуриентов',
            'applicants' => $applicants,
            'isUser' => $this->isUser(),
            'pages' => count($pages) > 1 ? $pages : null,
            'styles' => '/dist/css/list.css',
        ];

        echo $this->render($content, $template, $data);
    }

    public function searchAction()
    {
        $post = $_POST;
        if (empty($post['query'])) header('Location: /');

        $content = 'list.php';
        $template = 'template.php';

        $applicants = $this->mapper->search($post['query']);
        $data = [
            'title' => 'Список абитуриентов',
            'applicants' => $applicants,
            'isUser' => $this->isUser(),
            'styles' => '/dist/css/list.css',
        ];

        echo $this->render($content, $template, $data);
    }
}
