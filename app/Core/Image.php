<?php
namespace App\Core;

class Image {
    
    /**
     * Class constructor.
     */
    public function __construct(string $keys)
    {
        $this->key = $keys;
    }

    /**
     * generate an image and save it to a file
     * @return string
     */
    public function generateImage(string $pathLoad) {
        
        // extention of image
        $extensionAllowed = [
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "png" => "image/png"
        ];
        $fileName = $_FILES[$this->key]['name'];
        $fileType = $_FILES[$this->key]['type'];
        $fileSize = $_FILES[$this->key]['size'];
        
        // check if image extension is allowed 
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!array_key_exists($extension,$extensionAllowed) || !in_array($fileType, $extensionAllowed)) {
            die("Error: Format de fichier inccorect");
        }
        // we need our images to be 1 MB for security reasons
        if ($fileSize > (1024 * 1024)) {
            die("Error: Image trop volumineux");
        }
        // change path name 
        $newPathName = md5(uniqid());

        // generation of the path to the destination folder
        $path = dirname(__DIR__, 2) . "$pathLoad/$newPathName.$extension" ;

        
        
        if (!move_uploaded_file($_FILES[$this->key]['tmp_name'], $path)) {
            die("Error : impossible");
        }
        // Licence
        chmod($path, 0644);
        return "$newPathName.$extension";
    }
}