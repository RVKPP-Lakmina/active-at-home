<?php
class Trainer
{
    public $id;
    public $name;
    public $email;
    public $location;
    public $certifications;
    public $years_experience;

    public function __construct($id, $name, $email, $location, $certifications, $years_experience)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->location = $location;
        $this->certifications = $certifications;
        $this->years_experience = $years_experience;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getCertifications()
    {
        return $this->certifications;
    }

    public function setCertifications($certifications)
    {
        $this->certifications = $certifications;
    }

    public function getYearsExperience()
    {
        return $this->years_experience;
    }

    public function setYearsExperience($years_experience)
    {
        $this->years_experience = $years_experience;
    }
}
