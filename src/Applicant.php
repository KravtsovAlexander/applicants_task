<?php

namespace ApplicantTask;

class Applicant
{
    private $id;
    public $name;
    public $lastname;
    public $sex;
    public $group_num;
    public $email;
    public $points;
    public $birthyear;
    public $is_local;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}