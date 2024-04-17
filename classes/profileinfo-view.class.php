<?php

class ProfileInfoView extends ProfileInfo
{
    public function fetchAbout(string $user_id)
    {
        $profileInfo = $this->getProfileInfo($user_id);
        echo $profileInfo[0]['profiles_about'];
    }

    public function fetchTitle(string $user_id)
    {
        $profileInfo = $this->getProfileInfo($user_id);
        echo $profileInfo[0]['profiles_intro_title'];
    }

    public function fetchText(string $user_id)
    {
        $profileInfo = $this->getProfileInfo($user_id);
        echo $profileInfo[0]['profiles_intro_text'];
    }

    public function fetchImage(string $user_id)
    {
        $profileInfo = $this->getProfileInfo($user_id);
        echo $profileInfo[0]['profile_image'];
    }
}