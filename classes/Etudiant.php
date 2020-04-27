<?php


class Etudiant
{
    private $id;
    private $name;
    private $dateNaissance;
    private $section;
    private $cin;

    public function __construct($id = 0, $name = '', $dateNaissance = '2020-01-01', $section = '', $cin = 0)
    {
        $this->setName($name);
        $this->setId($id);
        $this->setCin($cin);
        $this->setDateNaissance($dateNaissance);
        $this->setSection($section);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        if (strlen($name) < 10 ) {
            $this->name = $name;
        } else {
            $this->name = '';
        }
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     */
    public function setSection($section): void
    {
        $this->section = $section;
    }

    /**
     * @return mixed
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param mixed $cin
     */
    public function setCin($cin): void
    {
        $this->cin = $cin;
    }



}