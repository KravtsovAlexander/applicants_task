<?php

namespace ApplicantTask;

class Applicant
{
    private $id;
    private $name;
    private $lastname;
    private $sex;
    private $group_num;
    private $email;
    private $points;
    private $birthyear;
    private $is_local;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of sex
     */ 
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */ 
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of group_num
     */ 
    public function getgroup_num()
    {
        return $this->group_num;
    }

    /**
     * Set the value of group_num
     *
     * @return  self
     */ 
    public function setgroup_num($group_num)
    {
        $this->group_num = $group_num;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of points
     */ 
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set the value of points
     *
     * @return  self
     */ 
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }


    /**
     * Get the value of birthyear
     */ 
    public function getBirthyear()
    {
        return $this->birthyear;
    }

    /**
     * Set the value of birthyear
     *
     * @return  self
     */ 
    public function setBirthyear($birthyear)
    {
        $this->birthyear = $birthyear;

        return $this;
    }

    /**
     * Get the value of is_local
     */ 
    public function getIs_local()
    {
        return $this->is_local;
    }

    /**
     * Set the value of is_local
     *
     * @return  self
     */ 
    public function setIs_local($is_local)
    {
        $this->is_local = $is_local;

        return $this;
    }

}