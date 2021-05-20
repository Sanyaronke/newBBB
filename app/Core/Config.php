<?php
namespace App\core;

class Config
{
    public static function categorieName(array $name_categories)
    {
        $years = intval(str_replace('U', '', $name_categories[0]));
        if (isset($name_categories[1])) {
            return '
            <th class="text-white" scope="row">'.$name_categories[0].' '.$name_categories[1].'</th>
            <td class="text-white">'.date('Y') - $years.'</td>';
        }
        return '
        <th class="text-white" scope="row">'.$name_categories[0].'</th>
        <td class="text-white" class="p-auto">'.date('Y') - $years.'</td>';
    }

    public static function pageEnConstruction()
    {
        echo '<div class="row justify-content-center d-flex align-items-center justify-content-center">
                  <div class="text-warning col-10 col-lg-6 mx-auto text-center display-5 d-flex flex-column align-items-center">
                        <p class="display-2 " ><i class="fas fa-tools"></i></p>
                        <p>EN MAINTENANCE</p>
                  </div>
              </div>';
    }
}