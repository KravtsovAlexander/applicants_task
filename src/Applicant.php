<?php

namespace ApplicantTask;

class Applicant
{
    private $id;
    private $token;
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

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }
}