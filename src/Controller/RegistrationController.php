<?php

namespace ApplicantTask\Controller;

use ApplicantTask\Applicant;
use ApplicantTask\Core\Controller;
use ApplicantTask\ApplicantsMapper;
use ApplicantTask\ApplicantValidator;
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

        // make a new instance of Applicant
        $applicant = new Applicant();
        $applicant->name = $post['name'];
        $applicant->lastname = $post['lastname'];
        $applicant->birthyear = $post['birthyear'];
        $applicant->sex = $post['sex'];
        $applicant->email = $post['email'];
        $applicant->group_num = $post['group_num'];
        $applicant->points = $post['points'];
        $applicant->is_local = $post['is_local'];

        // validate
        try {
            ApplicantValidator::run($applicant);
        } catch ( Exception $e) {
            echo $e->getMessage();
        }

        // save to a db
        $mapper = new ApplicantsMapper();
        try {
            $mapper->save($applicant);
            header('Location: /');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



}