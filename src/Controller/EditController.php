<?php
namespace ApplicantTask\Controller;

use Exception;
use ApplicantTask\Applicant;
use ApplicantTask\FormService;
use ApplicantTask\Core\Controller;
use ApplicantTask\ApplicantValidator;

class EditController extends Controller
{
    private $data;

    public function __construct() {
        if (!$this->isUser()) {
            header('Location: /registration');
        }
        parent::__construct();

        $cookie = $_COOKIE;
        $token = $cookie['token'];
        $this->data = $this->mapper->getByToken($token);
    }

    public function indexAction()
    {
        $content = 'form.php';
        $template = 'template.php';
        $data = [
            'title' => 'Редактировать профиль',
            'isUser' => $this->isUser(),
            'name' => $this->data['name'],
            'lastname' => $this->data['lastname'],
            'sex' => $this->data['sex'],
            'group_num' => $this->data['group_num'],
            'email' => $this->data['email'],
            'points' => $this->data['points'],
            'birthyear' => $this->data['birthyear'],
            'is_local' => $this->data['is_local'],
            'styles' => '/dist/css/form.css',
        ];
        echo $this->render($content, $template, $data);
    }

    public function saveAction()
    {
        $post = $_POST;
        $editedApplicant = new Applicant();
        FormService::fillFromPost($editedApplicant, $post);
        $editedApplicant->setId($this->data['id']);
        try {
            ApplicantValidator::run($editedApplicant);
            $this->mapper->update($editedApplicant);
            header('Location: /');
        } catch ( Exception $e) {
            echo $e->getMessage();
        }
    }
}
