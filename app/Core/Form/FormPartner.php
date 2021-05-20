<?php
namespace App\Core\Form;

class FormPartner  extends Form{

    public function partnerForm($path,$values = [])
    {
        $attribut = "placeholder";
        if ($values) {
            $attribut = "value";
        }
        $this->beginForm($path, "POST", ["enctype"=>"multipart/form-data"])
            
            ->addInput("hidden", "position", [$attribut => $values? $values[0]: ""] )
            ->formDiv(["class" => "form-row"])
                // first name
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("name_partner","Tage Du Partenaire",["class" => "small mb-1"])
                        ->addInput("text", "name_partner", [$attribut => $values? $values[1]:'',"class" => "form-control py-4"])
                    ->endFormDiv()
                ->endFormDiv()

                // last name
                ->formDiv(["class" => "col-md-6"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("slug_partner","Lien de leur site",["class" => "small mb-1"])
                        ->addInput("text", "slug_partner", [$attribut => $values? $values[2]:'',"class" => "form-control py-4"])
                    ->endFormDiv()
                ->endFormDiv()
            ->endFormDiv()

            ->formDiv(["class" => "form-group"])
                ->addLabelFor("image","Logo Du Partenaire",["class" => "small mb-1"])
                ->addInput("file", "image", ["class" => "form-control py-4"])
            ->endFormDiv()

            ->addBouton('Ajouter', ["class" => "btn btn-primary"])
        ->endForm();
        return $this->create();
    }
}