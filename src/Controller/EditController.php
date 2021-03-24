<?php
namespace ApplicantTask\Controller;

use Exception;
use ApplicantTask\Applicant;
use ApplicantTask\FormService;
use ApplicantTask\Core\Controller;
use ApplicantTask\ApplicantsMapper;
use ApplicantTask\ApplicantValidator;

class EditController extends Controller
{
    public function __construct() {
        if (!$this->isUser()) {
            header('Location: /registration');
        }
    }

    public function indexAction()
    {
        $coockie = $_COOKIE;
        $token = $coockie['token'];

        $content = 'form.php';
        $template = 'template.php';
        $mapper = new ApplicantsMapper();
        $data = $mapper->getByToken($token);
        $data = [
            'title' => 'Редактировать профиль',
            'isUser' => $this->isUser(),
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'sex' => $data['sex'],
            'group_num' => $data['group_num'],
            'email' => $data['email'],
            'points' => $data['points'],
            'birthyear' => $data['birthyear'],
            'is_local' => $data['is_local'],
        ];
        echo $this->render($content, $template, $data);
    }

    public function saveAction()
    {
        $post = $_POST;
        $editedApplicant = new Applicant();
        FormService::fillFromPost($editedApplicant, $post);
        
        try {
            ApplicantValidator::run($editedApplicant);
        } catch ( Exception $e) {
            echo $e->getMessage();
        }
    }
}
