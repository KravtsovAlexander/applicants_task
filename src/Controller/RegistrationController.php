<?php

namespace ApplicantTask\Controller;

use ApplicantTask\Applicant;
use ApplicantTask\Core\Controller;
use ApplicantTask\ApplicantsMapper;
use Exception;

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

    public function registrateAction()
    {
        $post = $_POST;
        $applicant = new Applicant();

        $applicant->setName($post['name']);
        $applicant->setLastname($post['lastname']);
        $applicant->setBirthyear($post['birthyear']);
        $applicant->setSex($post['sex']);
        $applicant->setEmail($post['email']);
        $applicant->setgroup_num($post['group_num']);
        $applicant->setPoints($post['points']);
        $applicant->setIs_local($post['is_local']);

        // валидация

        $mapper = new ApplicantsMapper();
        try {
            $mapper->save($applicant);
            header('Location: /');
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }



}