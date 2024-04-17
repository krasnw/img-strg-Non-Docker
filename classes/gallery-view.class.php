<?php

require_once 'gallery.class.php';

class GalleryView extends Gallery
{
    public function fetchImagesForProfile(string $user_id): void
    {
        $images = $this->getUsersImages($user_id);
        foreach ($images as $image) {
            echo '<div class="gallery-image">';
            echo '<img src="' . $image['img_path'] . '" alt="' . $image['img_description'] . '">';
            echo '<h3>Opis:</h3>';
            echo '<p>' . $image['img_description'] . '</p>';
            echo '<form action="../includes/delete_image.php" method="post">';
            echo '<input type="hidden" name="imageId" value="' . $image['img_id'] . '">';
            echo '<input class="delete-button" type="submit" value="Delete">';
            echo '</form>';
            echo '</div>';
        }
    }

    public function displayAllImages(): void
    {
        $images = $this->fetchAllImages();
        foreach ($images as $image) {
            echo '<div class="main-gallery-image">';
            echo '<img src="' . $image['img_path'] . '" alt="' . $image['img_description'] . '">';
            echo '<p>Author: ' . $image['username'] . '</p>';
            echo '<h3>Opis:</h3>';
            echo '<p>' . $image['img_description'] . '</p>';
            echo '</div>';
        }
    }
}