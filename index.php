<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('location: login.php');
}
require_once('assets/classes/MysqliDb/MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'login');
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
                <div class="alert alert-primary">
                    User is logged in. 
                </div><br><hr>
                <a class="btn btn-outline-primary" href="logout.php">Logout</a>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>