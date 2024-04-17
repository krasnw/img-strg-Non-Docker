<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    if (empty($_POST["description"])) {
        $description = "Autor nie podał opisu swojego dzieła.";
    } else {
        $description = htmlspecialchars($_POST["description"], ENT_QUOTES, 'UTF-8');
    }
    if (!empty($_FILES["NFTImage"]["name"])) {
        $file = $_FILES["NFTImage"];
        $fileName = $_FILES["NFTImage"]["name"];
        $fileTmpName = $_FILES["NFTImage"]["tmp_name"];
        $fileSize = $_FILES["NFTImage"]["size"];
        $fileError = $_FILES["NFTImage"]["error"];
        $fileType = $_FILES["NFTImage"]["type"];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 16777216) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../NFTImg/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $filePath = 'NFTImg/' . $fileNameNew;
                } else {
                    echo "Rozmiar twojego pliku jest wiekszy niz 16MB!";
                }
            } else {
                echo "Wystąpił błąd podczas przesyłania twojego pliku!";
            }
        } else {
            echo "Rozszerzenie twojego pliku nie jest dozwolone!";
        }
    } else {
        header("location: ../profile.php?error=emptyinput");
        die();
    }

    include '../classes/gallery-contr.class.php';

    $nft = new GalleryContr();
    $nft->insertImageContr($filePath, $id, $description);
    header("location: ../profile.php?error=none");
}