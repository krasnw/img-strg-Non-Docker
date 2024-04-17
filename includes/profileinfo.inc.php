<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    $about = htmlspecialchars($_POST["about"], ENT_QUOTES, 'UTF-8');
    $introTitle = htmlspecialchars($_POST["introTitle"], ENT_QUOTES, 'UTF-8');
    $introText = htmlspecialchars($_POST["introText"], ENT_QUOTES, 'UTF-8');
    if (!empty($_FILES["profileImage"]["name"])) {
        $file = $_FILES["profileImage"];
        $fileName = $_FILES["profileImage"]["name"];
        $fileTmpName = $_FILES["profileImage"]["tmp_name"];
        $fileSize = $_FILES["profileImage"]["size"];
        $fileError = $_FILES["profileImage"]["error"];
        $fileType = $_FILES["profileImage"]["type"];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 4194304) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../img/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $filePath = 'img/' . $fileNameNew;
                } else {
                    echo "Twój plik jest za duży!";
                }
            } else {
                echo "Wystąpił błąd podczas przesyłania twojego pliku!";
            }
        } else {
            echo "Rozszerzenie twojego pliku nie jest dozwolone!";
        }
    } else {
        $filePath = false;
    }

    include '../classes/dbh.class.php';
    include '../classes/profileinfo.class.php';
    include '../classes/profileinfo-contr.class.php';
    include '../classes/profileinfo-view.class.php';
    $profileInfo = new ProfileInfoContr($id, $username);
    $profileInfo->updateProfileInfo($about, $introTitle, $introText, $filePath);
    header("location: ../profile.php?error=none");
}