<?php
namespace App\Core\Form;

class FormPlayer  extends Form{

    public function teamForm($dataSelection, $values = [])
    {
        $attribut = "placeholder";
        if ($values) {
            $attribut = "value";
        }
        $this->beginForm($values? "/equipes-admin-update-player/$values[0]" : "/equipes-admin-create-player", "POST", ["enctype"=>"multipart/form-data"])
            
            ->addInput("hidden", "position", [$attribut => $values? $values[0]: ""] )
            ->formDiv(["class" => "form-row"])
                // first name
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("first_names","Nom",["class" => "small mb-1"])
                        ->addInput("text", "first_names", [$attribut => $values? $values[1]:'',"class" => "form-control py-4"])
                    ->endFormDiv()
                ->endFormDiv()

                // last name
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("last_names","Prénom",["class" => "small mb-1"])
                        ->addInput("text", "last_names", [$attribut => $values? $values[2]:'',"class" => "form-control py-4"])
                    ->endFormDiv()
                ->endFormDiv()
            ->endFormDiv()

            ->formDiv(["class" => "form-row d-flex align-items-center justify-content-around"])
                // birthday
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("first_names","Dates de Naissance",["class" => "small mb-1"])
                        ->addInput("date", "date", [$attribut => $values? $values[3]:'',"class" => "form-control py-4"])
                    ->endFormDiv()
                ->endFormDiv()

                // gender
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-check form-check-inline"])
                        ->addInput("radio", "genders", ["class" => "form-check-input", "value" => "1"])
                        ->addLabelFor("F","Fille",["class" => "small mb-1"])   
                    ->endFormDiv()

                    ->formDiv(["class" => "form-check form-check-inline"])
                        ->addInput("radio", "genders", ["class" => "form-check-input","value" => "2"])
                        ->addLabelFor("M","Garçon",["class" => "small mb-1"])   
                    ->endFormDiv()
                ->endFormDiv()
            ->endFormDiv()
            // email licence
            ->formDiv(["class" => "form-row"])
                // email
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("emails","Email",["class" => "small mb-1"])
                        ->addInput("email", "emails", [$attribut => $values? $values[5]:'',"class" => "form-control py-4"])
                    ->endFormDiv()
                ->endFormDiv()

                // licence
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("licences","Numero de licence",["class" => "small mb-1"])
                        ->addInput("text", "licences", [$attribut => $values? $values[6]:'',"class" => "form-control py-4"])
                    ->endFormDiv()
                ->endFormDiv()
            ->endFormDiv()
            ->formDiv(["class" => "form-row"])
                // password
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("category","Categories",["class" => "small mb-1"])
                        ->addSelect("category", $dataSelection)
                    ->endFormDiv()
                ->endFormDiv()
                
            ->endFormDiv()
            ->addBouton('Ajouter', ["class" => "btn btn-primary"])
        ->endForm();
        return $this->create();
    }
}