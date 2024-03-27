<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    if(isset($_POST['remember-me'])) {
        setcookie('username', $_POST['username'], time() + 60 * 60 * 24 * 30);
    }
    else {
        setcookie('username', '', time() - 3600);
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">

    <label for="remember-me">Remember me</label>
    <input type="checkbox" name="remember-me" id="remember-me">

    <button type="submit">Submit</button>
</form>