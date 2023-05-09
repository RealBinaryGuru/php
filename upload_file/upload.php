<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Methods: POST");
header("Access-Control-Headers: Access-Control-Headers,Content-Type,Access-Control-Methods,Authorization");

include 'config.php';


$filename = $_FILES['image']['name'];
$tempname = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];

if (empty($filename)) {
    $errorMsg = json_encode(array("message" => "Please select iamge", 'status' => false));
    echo $errorMsg;
} else {
    $uploadPath = 'upload/';
    $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $validateExt = array('jpeg', 'jpg', 'png');
    if (in_array($fileExt, $validateExt)) {
        if (!file_exists($uploadPath . $filename)) {
            if ($filesize < 5000000) {
                move_uploaded_file($tempname, $uploadPath . $filename);
            } else {
                $errorMsg = json_encode(array("message" => "Sorry your file is too large", "status" => false));
                echo $errorMsg;
            }
        }
    } else {
        $errorMsg = json_encode(array("message" => "Sorry we accept only jpeg, jpg, png", "status" => false));
        echo $errorMsg;
    }
}
