<?php
session_start();
error_reporting(0);
if(isset($_SESSION['username'])) {
    header('location: index.php');
}
require_once('assets/classes/MysqliDb/MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'login');

if(isset($_POST['username']) & isset($_POST['password']) & $_POST['username'] != NULL & $_POST['password'] != NULL) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $db->where ("username", $username);
    $user = $db->getOne ("users");
    $returned_password = $user['password'];

    if($password == $returned_password) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }

    }
?>
<!doctype html>
<html lang="en">
    <head>
    <title>Login System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <br>
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 box bg-secondary">
                                <?php
                                    if(isset($_POST['username']) & isset($_POST['password'])) {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        if($password !== $returned_password) {
                                            echo '<div class="alert alert-danger">Something went wrong.</div>';
                                        }

                                        if($_POST['username'] == NULL ) {
                                            echo '<div class="alert alert-danger">Fill out username.</div>';
                                        }

                                        if($_POST['password'] == NULL ) {
                                            echo '<div class="alert alert-danger">Fill out password.</div>';
                                        }
                                    }
?>
                    <form action="" method="post">
                        <legend class="text-center">Login</legend>
                        <input type="text" placeholder="Username" name="username" class="form-control" autofocus autocomplete="off"><br>
                        <input type="password" placeholder="Password" name="password" class="form-control"><br>
                        <button type="submit" name="submit" value="submit" class="btn btn-outline-info">Submit</button>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>