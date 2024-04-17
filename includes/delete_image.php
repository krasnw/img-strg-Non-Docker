<?php

require_once '../classes/gallery-contr.class.php';

if (isset($_POST['imageId'])) {
    $imageId = $_POST['imageId'];
    $galleryContr = new GalleryContr();
    $galleryContr->deleteImageContr($imageId);
}

header("location: ../main_project/profile.php?error=none");

