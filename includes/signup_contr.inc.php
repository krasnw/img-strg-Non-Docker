<?php

declare(strict_types=1);

function is_input_empty(string $username, string $email, string $password, string $passwordRepeat)
{
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username): bool
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered($pdo, $email): bool
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function is_password_match($password, $passwordRepeat)
{
    if ($password !== $passwordRepeat) {
        return true;
    } else {
        return false;
    }
}

function create_user($pdo, $username, $email, $password)
{
    set_user($pdo, $username, $email, $password);
}