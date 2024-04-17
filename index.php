<?php
include_once 'header.php';
include 'classes/dbh.class.php';
include 'classes/gallery-view.class.php';
$gallery = new GalleryView();
?>

<section class="index-intro">
    <?php
    if (isset($_SESSION["user_id"])) {
        echo "<h1>Cześć, " . $_SESSION["username"] . "!</h1>";
    }
    ?>
    <p>Lista dodanych obrazów.</p>
</section>

<div class="main-gallery">
    <?php
    $gallery->displayAllImages();
    ?>
</div>

<?php
include_once 'footer.php';
?>
