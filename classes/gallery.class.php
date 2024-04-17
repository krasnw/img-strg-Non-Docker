<?php
// model class

require_once 'dbh.class.php';

class Gallery extends Dbh
{
    public function insertImage(string $img_path, string $img_author, string $img_description)
    {
        $sql = "INSERT INTO gallery (img_path, img_author, img_description) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$img_path, $img_author, $img_description]);
    }

    public function deleteImage(string $img_id)
    {
        $sql = "DELETE FROM gallery WHERE img_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$img_id]);
    }

    protected function getUsersImages(string $user_id)
    {
        $sql = "SELECT * FROM gallery WHERE img_author = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    }

    public function fetchAllImages(): array
    {
        $sql = "SELECT gallery.*, users.username FROM gallery 
                JOIN users ON gallery.img_author = users.id 
                ORDER BY gallery.img_id DESC;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }
}


