<?php
namespace App\Models;

class TeamModel extends Model{

    protected   
    $id_player,
    $first_names,
    $last_names,
    $emails,
    $roles,
    $genders,
    $date,
    $category,
    $licences,
    $pictures;


    public function __construct(string $table = "all_players",string $elements = "*") {
        $this->table = $table;
        $this->elements = $elements;
    }




    /**
     * Get the value of id_player
     */
    public function getIdPlayer()
    {
        return $this->id_player;
    }

    /**
     * Set the value of id_player
     *
     * @return  self
     */
    public function setIdPlayer($id_player)
    {
        $this->id_player = $id_player;

        return $this;
    }

    /**
     * Get the value of first_names
     */
    public function getFirstNames()
    {
        return $this->first_names;
    }

    /**
     * Set the value of first_names
     *
     * @return  self
     */
    public function setFirstNames($first_names)
    {
        $this->first_names = $first_names;

        return $this;
    }

    /**
     * Get the value of roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */
    public function setRoles($roles = 3)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get the value of emails
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Set the value of emails
     *
     * @return  self
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;

        return $this;
    }

    /**
     * Get the value of last_names
     */
    public function getLastNames()
    {
        return $this->last_names;
    }

    /**
     * Set the value of last_names
     *
     * @return  self
     */
    public function setLastNames($last_names)
    {
        $this->last_names = $last_names;

        return $this;
    }

    /**
     * Get the value of genders
     */
    public function getGenders()
    {
        return $this->genders;
    }

    /**
     * Set the value of genders
     *
     * @return  self
     */
    public function setGenders($genders)
    {
        $this->genders = $genders;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of licences
     */
    public function getLicences()
    {
        return $this->licences;
    }

    /**
     * Set the value of licences
     *
     * @return  self
     */
    public function setLicences($licences)
    {
        $this->licences = $licences;

        return $this;
    }

    /**
     * Get the value of pictures
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Set the value of pictures
     *
     * @return  self
     */
    public function setPictures($pictures)
    {
        $this->pictures = $pictures;

        return $this;
    }
}