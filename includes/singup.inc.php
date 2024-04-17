<?php

require_once '../classes/profileinfo-contr.class.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');
    $passwordRepeat = htmlspecialchars($_POST["pwdrepeat"], ENT_QUOTES, 'UTF-8');

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // Error handlers
        $errors = [];

        if (is_input_empty($username, $email, $password, $passwordRepeat)) {
            $errors["empty_input"] = "Uzupęłnij wszystkie pola";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Niepoprawny adres email";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Nazwa użytkownika jest zajęta";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_registered"] = "Email jest już zarejestrowany";
        }
        if (is_password_match($password, $passwordRepeat)) {
            $errors["password_match"] = "Hasła nie są takie same";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData;

            header("location: ../signup.php");
            die();
        }

        create_user($pdo, $username, $email, $password);

        require_once 'login_model.inc.php';

        $result = get_user($pdo, $username); // Assuming get_user is a function that retrieves a user's data from the database using their username

        $newSessionId = session_regenerate_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();

        $profileInfo = new ProfileInfoContr($result["id"], $result["username"]);
        $profileInfo->defaultProfileInfo();

        header("location: ../profile.php"); // Redirect to profile page
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location: ../signup.php");
    die();
}