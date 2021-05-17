<?php
namespace App\Models;

class SubCategoryModel extends Model{

    protected   
    $id_sub_category,
    $category_names,
    $pictures,
    $general_category,
    $coach;


    public function __construct() {
        $this->table = "sub_categories_teams";
        $this->elements = "*";
    }




    /**
     * Get the value of id_sub_category
     */
    public function getIdSubCategory()
    {
        return $this->id_sub_category;
    }

    /**
     * Set the value of id_sub_category
     *
     * @return  self
     */
    public function setIdSubCategory($id_sub_category)
    {
        $this->id_sub_category = $id_sub_category;

        return $this;
    }

    /**
     * Get the value of category_names
     */
    public function getCategoryNames()
    {
        return $this->category_names;
    }

    /**
     * Set the value of category_names
     *
     * @return  self
     */
    public function setCategoryNames($category_names)
    {
        $this->category_names = $category_names;

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
     * Get the value of general_category
     */
    public function getGeneralCategory()
    {
        return $this->general_category;
    }

    /**
     * Set the value of general_category
     *
     * @return  self
     */
    public function setGeneralCategory($general_category)
    {
        $this->general_category = $general_category;

        return $this;
    }

    /**
     * Get the value of coach
     */
    public function getCoach()
    {
        return $this->coach;
    }

    /**
     * Set the value of coach
     *
     * @return  self
     */
    public function setCoach($coach)
    {
        $this->coach = $coach;

        return $this;
    }
}