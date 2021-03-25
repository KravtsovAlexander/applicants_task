<?php

namespace ApplicantTask;

class FormService
{
    /**
     * @param array $post $_POST array from the form
     * 
     * @return void
     */
    static public function fillFromPost(Applicant $applicant, array $post)
    {
        $applicant->name = $post['name'];
        $applicant->lastname = $post['lastname'];
        $applicant->birthyear = $post['birthyear'];
        $applicant->sex = $post['sex'];
        $applicant->email = $post['email'];
        $applicant->group_num = $post['group_num'];
        $applicant->points = $post['points'];
        $applicant->is_local = $post['is_local'];
    }
}