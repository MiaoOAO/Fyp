
<!doctype html>
<html>
    <head></head>
    <body>
        <h1>Homepage</h1>

        <!-- 把这段form copy到需要logout的page -->
        <form method='post' action="VerifyLogin8.php">
            <input type="submit" value="Logout" name="but_logout">
        </form>
    </body>
</html>

<?php

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: AdminLogin7.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: AdminLogin7.php');
}
?>
