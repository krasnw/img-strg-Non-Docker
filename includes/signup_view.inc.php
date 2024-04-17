<?php

declare(strict_types=1);

function signup_input()
{
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_registered"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="Your Email here" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="Your Email here">';
    }

    echo '<input type="password" name="pwd" placeholder="Password">';
    echo '<input type="password" name="pwdrepeat" placeholder="Repeat password">';
}

function check_signup_errors()
{
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];
        foreach ($errors as $error) {
            echo '<p class="error">' . $error . '</p>';
        }
        unset($_SESSION["errors_signup"]);
    } else if (isset($_GET["signup"])) {
        if ($_GET["signup"] === "success") {
            echo '<p class="success">Jesteś zarejstrowany</p>';
        }
    }
}