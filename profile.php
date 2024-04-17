<?php
include_once 'header.php';
include 'classes/dbh.class.php';
include 'classes/profileinfo.class.php';
include 'classes/profileinfo-view.class.php';
include 'classes/gallery-view.class.php';
$profileInfo = new ProfileInfoView();
$nft = new GalleryView();
?>
<section class="profile">
    <div class="sideColumn">
        <div class="profileImage">
            <img src="<?php $profileInfo->fetchImage($_SESSION['user_id']); ?>" alt="profile">
        </div>
        <div class="aboutSection">
            <h3>About</h3>
            <p>
                <?php
                $profileInfo->fetchAbout($_SESSION["user_id"]);
                ?>
            </p>
        </div>
    </div>
    <div class="mainColumn">
        <div class="profileIntro">
            <div class="username-text">
                <?php
                $profileInfo->fetchTitle($_SESSION["user_id"]);
                ?>
            </div>
            <div class="quote">
                "<?php
                $profileInfo->fetchText($_SESSION["user_id"]);
                ?>" &copy;
            </div>
        </div>
        <h2>Galeria</h2>
        <div class="gallery">
            <div class="gallery-container">
                <?php
                $nft->fetchImagesForProfile($_SESSION["user_id"]);
                ?>
            </div>
            <div class="addImage">
                <form action="includes/gallery.inc.php" method="post" enctype="multipart/form-data">
                    <input type="file" id="input__file" class="custom-file-input" name="NFTImage">
                    <label for="input__file" class="input__file-button">
                        <span class="input__file-button-text">Wybierz plik</span>
                    </label>
                    <script>
                        document.getElementById('input__file').addEventListener('change', function () {
                            if (this.value) {
                                document.querySelector('.input__file-button-text').textContent = 'Plik jest wybrany';
                            } else {
                                document.querySelector('.input__file-button-text').textContent = 'Wybierz plik';
                            }
                        });
                    </script>
                    <input class="input-text" type="text" name="description" placeholder="Opis...">
                    <button type="submit" name="submit">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
include_once 'footer.php';
?>
