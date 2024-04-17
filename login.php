<?php
include_once 'header.php';
include_once 'includes/login_view.inc.php';
?>

<section class="form">
    <h2>Log In</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username/Email">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit">Log In</button>
    </form>
    <?php
    check_login_errors();
    ?>
</section>

<?php
include_once 'footer.php';
?>
