<?php

namespace ApplicantTask\Controller;

use ApplicantTask\Applicant;
use ApplicantTask\Core\Controller;
use ApplicantTask\ApplicantValidator;
use ApplicantTask\FormService;
use Exception;

class RegistrationController extends Controller
{
    public function __construct()
    {
        if ($this->isUser()) {
            header('Location: /edit');
        }
        parent::__construct();
    }
    public function indexAction()
    {
        $content = 'form.php';
        $template = 'template.php';
        $data = [
            'title' => 'Регистрация',
            'isUser' => $this->isUser(),
            'styles' => '/dist/css/form.css',
        ];
        echo $this->render($content, $template, $data);
    }

    public function registrateAction()
    {
        $post = $_POST;

        // make a new instance of Applicant
        $applicant = new Applicant();
        FormService::fillFromPost($applicant, $post);
        $applicant->setToken(bin2hex(random_bytes(16)));

        // validate
        try {
            ApplicantValidator::run($applicant);

            // save to a db
            $this->mapper->save($applicant);
            setcookie('token', $applicant->getToken(), time() + 60 * 60 * 24 * 365 * 10, '/');
            header('Location: /');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
