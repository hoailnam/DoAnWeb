<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (count($_FILES) > 0) {
    $check = getimagesize($_FILES["file_upload"]["tmp_name"]);
    if ($check !== false) {

        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
        //echo "The file " . htmlspecialchars(basename($_FILES["file_upload"]["name"])) . " has been uploaded.";
        echo '<img src="' . $target_file . '"/>';
        // header("Location: information.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
