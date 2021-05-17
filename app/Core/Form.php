<?php 

namespace App\Core;


/**
 * Class that creates forms
 */
class Form
{
    private 
        $methods,
        $form = ""; 

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->methods = $_POST;
        
    }
    
    /**
     * create form
     *
     * @return string
     */
    public function create() {   return $this->form; }
    /**
     * Get the value of methods
     */ 
    public function getMethods() {  return $this->methods;  }
    
    
    /**
     * Add attributes in form
     *
     * @param  array $attributs
     * @return string
     */
    private function addAttributs(array $attributs): string
    {
        $str = '';
        // List of default attribut
        $courts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

        foreach ($attributs as $attribut => $value) {
            // Test if default attribut exist
            if (in_array($attribut,$courts)&& $value === true)
            {
                $str .= " $attribut";
            } else {
                $str .= "$attribut = '$value'";
            }
        }
        return $str;
    }

    /**
     * open form
     * @param string $methode Méthode (post or get)
     * @param string $action Form action
     * @param array $attributs 
     * @return Form 
     */
    public function beginForm(string $action = " ", string $methode = 'POST', array $attributs = []): self
    {
        $this->form .= "<form action='$action' method='$methode'";
        $this->form .= $attributs ? $this->addAttributs($attributs).' >' : ' >';
        return $this;
    }
    
    /**
     * close form
     *
     * @return Form
     */
    public function endForm(): self
    {
        $this->form .= ' </form>';
        return $this;
    }

    /**
     * Add label
     * @param string $for 
     * @param string $texte 
     * @param array $attributs 
     * @return Form 
     */
    public function addLabelFor(string $for, string $texte, array $attributs = [], $span = false):self
    {
        $this->form .= "<label for='$for' ";
        $this->form .= $attributs ? $this->addAttributs($attributs) : ' ';
        // On Add text
        if($span)
            $this->form .= "><span class='content-name'>$texte</span></label>";
        else
            $this->form .= " > $texte </label> ";
        return $this;
    }

    /**
     * Add input
     * @param string $type 
     * @param string $nom 
     * @param array $attributs 
     * @return Form
     */
    public function addInput(string $type, string $nom, array $attributs = []):self
    {
        $this->form .= "<input type='$type' name='$nom'";
        $this->form .= $attributs ? $this->addAttributs($attributs).'>' : '>';
        return $this;
    }

    /**
     * Add textarea
     * @param string $nom 
     * @param string $valeur
     * @param array $attributs
     * @return Form
     */
    public function addTextarea(string $nom, string $valeur = '', array $attributs = []):self
    {
        $this->form .= "<textarea name='$nom'";
        $this->form .= $attributs ? $this->addAttributs($attributs) : '';
        $this->form .= ">$valeur</textarea>";
        return $this;
    }

    /**
     * Selct form
     * @param string $nom case name
     * @param array $options list option
     * @param array $attributs 
     * @return Form
     */
    public function addSelect(string $nom, array $options, array $attributs = []):self
    {
        // creation select
        $this->form .= "<select name='$nom'";

        // On Add attributs
        $this->form .= $attributs ? $this->addAttributs($attributs).'>' : '>';

        // Add options
        foreach($options as $valeur => $texte){
            $this->form .= "<option value='$valeur'>$texte</option>";
        }
        $this->form .= '</select>';
        return $this;
    }

    /**
     * Add un bouton
     * @param string $texte 
     * @param array $attributs 
     * @return Form
     */
    public function addBouton(string $texte, array $attributs = []):self
    {
        $this->form .= ' <button ';
        $this->form .= $attributs ? $this->addAttributs($attributs) : '';
        $this->form .= " >$texte</button> ";
        return $this;
    }

    public function formDiv( array $attributs = []):self
    {
        $this->form .= "<div ";
        $this->form .= $attributs ? $this->addAttributs($attributs) : '';
        $this->form .= " >";
        return $this;
    }

    public function endFormDiv():self
    {
        $this->form .= "</div >";
        return $this;
    }



    /**
     * this method check if we get a valid form
     * @param array $form  (GET or POST)
     * @param array $fields (Input values)
     * @return bool 
    */
    static function validate(array $form, array $fields){
        foreach($fields as $field){
            if(!isset($form[$field]) || empty($form[$field]) || $form[$field] == ""){
                return false;
            }
        }
        return true;
    } 
}