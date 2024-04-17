<?php

require_once 'gallery.class.php';

class GalleryContr extends Gallery
{
    public function insertImageContr(string $img_path, string $img_author, string $img_description)
    {
        $this->insertImage($img_path, $img_author, $img_description);
    }

    public function deleteImageContr(string $img_id)
    {
        $this->deleteImage($img_id);
    }

    public function fetchImagesContr(string $user_id): void
    {
        $this->fetchImagesForProfile($user_id);
    }
}