<?php

require_once 'profileinfo.class.php';

class ProfileInfoContr extends ProfileInfo
{
    private $user_id;
    private $username;

    public function __construct(string $user_id, string $username)
    {
        $this->user_id = $user_id;
        $this->username = $username;
    }

    public function defaultProfileInfo()
    {
        $profileAbout = 'Powiedz coś o sobie! Swój ulubiony wiersz, piosenkę, film, książkę, cokolwiek!';
        $profileTitle = $this->username;
        $profileText = 'Podaj swoją ulubioną cytatę!';
        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->user_id);
    }

    public function updateProfileInfo(string $profileAbout, string $profileTitle, string $profileText, string|bool $filePath)
    {
        // error handling
        if ($this->emptyInputCheck($profileAbout, $profileTitle, $profileText) == true) {
            header('location: ../profilesettings.php?error=emptyinput');
            exit();
        }

        // update profile info
        $this->setNewProfileInfo($profileAbout, $profileTitle, $profileText, $this->user_id, $filePath);
    }

    private function emptyInputCheck(string $profileAbout, string $profileTitle, string $profileText)
    {
        if (empty($profileAbout) || empty($profileTitle) || empty($profileText)) {
            return true;
        } else {
            return false;
        }
    }
}