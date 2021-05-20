<?php
namespace App\Core\Form;

class FormActualite extends Form{

    public function actualiteForm($path,$values = [])
    {
        $attribut = "placeholder";
        if ($values) {
            $attribut = "value";
        }

        $this->beginForm($path, "POST", ["enctype"=>"multipart/form-data"])
            
            ->addInput("hidden", "position", [$attribut => $values? $values[0]: ""] )
            ->formDiv(["class" => "col-md-11 mx-auto"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("actu_title","Titre de l'actualité",["class" => "small mb-1"])
                        ->addInput("text", "actu_title", [$attribut => $values? $values[1]:'',"class" => "form-control", "placeholder"=>"Titre de votre actualité"])
                    ->endFormDiv()

                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("actu_description","Titre de l'actualité",["class" => "small mb-1"])
                        ->addInput("text", "actu_description", [$attribut => $values? $values[2]:'',"class" => "form-control", "placeholder"=>"Description de votre actualité"])
                    ->endFormDiv()

                    ->formDiv(["class" => "form-group"])
                        ->addTextarea("actu_content",$values? "$values[3]":'Votre message', ["class" => "form-control", "placeholder"=>"Votre Message"])
                    ->endFormDiv()

                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("formFileDisabled","Titre de l'actualité",["class" => "form-label small mb-1"])
                        ->addInput("file", "image", [$attribut => $values? $values[4]:'', "class" => "form-control"])
                    ->endFormDiv()
                ->endFormDiv()
            
            ->addBouton('Ajouter', ["class" => "btn btn-primary"])
        ->endForm();
        return $this->create();
    }
}