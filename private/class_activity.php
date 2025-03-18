<?php
class Activity
{
    private $id;
    private $name;
    private $brief_description;
    private $benefits;
    private $price;

    public function __construct($id, $name, $brief_description, $benefits, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->brief_description = $brief_description;
        $this->benefits = $benefits;
        $this->price = $price;
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

    public function getBriefDescription()
    {
        return $this->brief_description;
    }

    public function setBriefDescription($brief_description)
    {
        $this->brief_description = $brief_description;
    }

    public function getBenefits()
    {
        return $this->benefits;
    }

    public function setBenefits($benefits)
    {
        $this->benefits = $benefits;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
