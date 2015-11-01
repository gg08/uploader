<?php

class PhotoUploader {
    
    public static function upload_temp_file() {
        $response = 0;
        //Only process if the file has an accepted extension and below the allowed limit
        if ((!empty($_FILES["file"])) && ($_FILES["file"]["error"] == 0)) {
            $accepted_exts = array('jpeg', 'jpg', 'png', 'gif');
            $max_size = $_POST['maxSize'];
            $filename = basename($_FILES["file"]["name"]);
            $fileExt = substr($filename, strrpos($filename, ".") + 1);

            if (!in_array(strtolower($fileExt), $accepted_exts)) {
                $response = 1;
            } else if ($_FILES["file"]["size"] > $max_size) {
                $response = 2;
            } else if (!is_dir(__DIR__.'/media/')) {
                $response = 3;
            } else {
                do{
                    $tempName = 'temp' . rand(1, 5000) . '.' . $fileExt;
                    $tmpImage = __DIR__.'/media/' . $tempName;
                }while( file_exists($tmpImage) );
                move_uploaded_file($_FILES["file"]["tmp_name"], $tmpImage);
                $response = $tempName;
            }
        }
        echo $response;
    }

    public static function delete_temp_file() {
        if (count($_POST) > 0) {
            $file = __DIR__.'/media/' . $_POST['file'];
            if (file_exists($file))
                @unlink($file);
        }
    }

}
if(isset($_GET['f'])){
    PhotoUploader::$_GET['f']();
}
