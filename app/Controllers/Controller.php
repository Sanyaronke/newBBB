<?php
namespace App\Controllers;

class Controller {
    

    public function render(string $title, string $description, string $path, array $data = [], string $layout = "base")
    {
        $title = $title;
        $description = $description;
        extract($data);

        ob_start();
        require "../app/Views/template/{$path}.view.php";

        $contents = ob_get_clean();
        require "../app/Views/layout/{$layout}.view.php";
    }
}