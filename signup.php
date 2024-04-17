<?php
include_once 'header.php';

include_once 'includes/signup_view.inc.php'
?>

    <section class="form">
        <h2>Sign Up</h2>
        <form action="includes/singup.inc.php" method="post">
            <?php
            signup_input();
            ?>
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
        check_signup_errors();
        ?>
    </section>

<?php
include_once 'footer.php';
?>