<?php

include_once 'header.php';
include 'classes/dbh.class.php';
include 'classes/profileinfo.class.php';
include 'classes/profileinfo-view.class.php';
$profileInfo = new ProfileInfoView();
?>

    <section class="profile-set">
        <div class="profile-bg">
            <div class="wrapper">
                <div class="profile-settings">
                    <h2>Ustawienia profilu</h2>
                    <form action="includes/profileinfo.inc.php" method="post" enctype="multipart/form-data">
                        <p>Zamień swoje dane w sekcji About</p>
                        <textarea name="about" cols="30" rows="10"
                                  placeholder="O mnie..."><?php $profileInfo->fetchAbout($_SESSION["user_id"]); ?></textarea>
                        <br><br>
                        <p>Zamień intro swojego profilu</p>
                        <br>
                        <input type="text" name="introTitle" placeholder="Twoje imie albo pseudonim"
                               value="<?php $profileInfo->fetchTitle($_SESSION["user_id"]); ?>">
                        <textarea name="introText" cols="30" rows="10"
                                  placeholder="Twoja ulubiona cytata..."><?php $profileInfo->fetchText($_SESSION["user_id"]); ?></textarea>
                        <br><br>
                        <p>Wybież obrazek dla swojego profilu</p>
                        <input type="file" name="profileImage">
                        <button type="submit" name="submit">Zapisz</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
include_once 'footer.php';
?>