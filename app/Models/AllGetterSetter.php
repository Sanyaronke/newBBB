<?php

namespace App\Models;


/**
 * all the getters and the setters of the DB tables
 */
class AllGetterSetter extends Model
{
    /* ************************************************* */
    /*              INSTANCE OF TABLE FROM BD            */
    /* ************************************************* */


    /* **************** ALL USE FOR TB **************** */

    protected 
    $date,
    $role,
    $genders,
    $pictures,
    $licences,
    $last_names,
    $first_names,
    $phone_numbers;

    /* **************** PARTENAIRE **************** */

    protected 
    $id_partner,
    $name_partner,
    $slug_partner;

    /* **************+ MSG IMPORTANT ************** */

    protected 
        $id_msg,
        $msg_date,
        $msg_title,
        $msg_content;

    /* **************** ACTUALITES **************** */

    protected 
    $id_actu,
    $actu_title,
    $actu_content,
    $actu_description;

    /* **************** ROLE MEMBER **************** */

    protected 
        $id_role,
        $role_name;

    /* **************** PLAYER && TEAM CATEGORY  **************** */

    protected 
        $coach,
        $id_sub_category,
        $id_team_category,
        $category_name,
        $category_pictures,
        $general_category;

    /* **************** maatch coach sub category **************** */

    protected
    $id_cat_coch,
    $id_coach,
    $category;
    /* ************************************************* */
    /*                  GETTER & SETTER                  */
    /* ************************************************* */



    

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
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role = 1)
    {
        $this->role = $role;

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
     * Get the value of phone_numbers
     */
    public function getPhoneNumbers()
    {
        return $this->phone_numbers;
    }

    /**
     * Set the value of phone_numbers
     *
     * @return  self
     */
    public function setPhoneNumbers($phone_numbers)
    {
        $this->phone_numbers = $phone_numbers;

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
     * Get the value of id_actu
     */
    public function getIdActu()
    {
        return $this->id_actu;
    }

    /**
     * Set the value of id_actu
     *
     * @return  self
     */
    public function setIdActu($id_actu)
    {
        $this->id_actu = $id_actu;

        return $this;
    }

    /**
     * Get the value of actu_title
     */
    public function getActuTitle()
    {
        return $this->actu_title;
    }

    /**
     * Set the value of actu_title
     *
     * @return  self
     */
    public function setActuTitle($actu_title)
    {
        $this->actu_title = $actu_title;

        return $this;
    }

    /**
     * Get the value of actu_content
     */
    public function getActuContent()
    {
        return $this->actu_content;
    }

    /**
     * Set the value of actu_content
     *
     * @return  self
     */
    public function setActuContent($actu_content)
    {
        $this->actu_content = $actu_content;

        return $this;
    }

    /**
     * Get the value of actu_description
     */
    public function getActuDescription()
    {
        return $this->actu_description;
    }

    /**
     * Set the value of actu_description
     *
     * @return  self
     */
    public function setActuDescription($actu_description)
    {
        $this->actu_description = $actu_description;

        return $this;
    }

    /**
     * Get the value of id_partner
     */
    public function getIdPartner()
    {
        return $this->id_partner;
    }

    /**
     * Set the value of id_partner
     *
     * @return  self
     */
    public function setIdPartner($id_partner)
    {
        $this->id_partner = $id_partner;

        return $this;
    }

    /**
     * Get the value of name_partner
     */
    public function getNamePartner()
    {
        return $this->name_partner;
    }

    /**
     * Set the value of name_partner
     *
     * @return  self
     */
    public function setNamePartner($name_partner)
    {
        $this->name_partner = $name_partner;

        return $this;
    }

    /**
     * Get the value of slug_partner
     */
    public function getSlugPartner()
    {
        return $this->slug_partner;
    }

    /**
     * Set the value of slug_partner
     *
     * @return  self
     */
    public function setSlugPartner($slug_partner)
    {
        $this->slug_partner = $slug_partner;

        return $this;
    }

    /**
     * Get the value of id_cat_coch
     */
    public function getIdCatCoch()
    {
        return $this->id_cat_coch;
    }

    /**
     * Set the value of id_cat_coch
     *
     * @return  self
     */
    public function setIdCatCoch($id_cat_coch)
    {
        $this->id_cat_coch = $id_cat_coch;

        return $this;
    }

    /**
     * Get the value of id_coach
     */
    public function getIdCoach()
    {
        return $this->id_coach;
    }

    /**
     * Set the value of id_coach
     *
     * @return  self
     */
    public function setIdCoach($id_coach)
    {
        $this->id_coach = $id_coach;

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
}
