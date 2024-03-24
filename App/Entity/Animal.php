<?php

namespace App\Entity;

class Animal
{
    protected ?int $id = null;
    protected string $firstname = '';
    protected string $race = '';
    protected string $image = '';
    protected string $habitatId = '';

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of race
     *
     * @return  self
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of habitatId
     */
    public function getHabitatId()
    {
        return $this->habitatId;
    }

    /**
     * Set the value of habitatId
     *
     * @return  self
     */
    public function setHabitatId($habitatId)
    {
        $this->habitatId = $habitatId;

        return $this;
    }
}
