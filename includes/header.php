<?php
    include_once 'includes/session.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <title><?php echo $title ?></title>
    </head>
    <body>        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">IT Conference</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="viewrecords.php">View Attendees</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <?php 
                        if(!isset($_SESSION['userid'])){
                    ?>
                        <a class="nav-item nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
                    <?php } else { ?>
                        <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>! </span> <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <div class="container">
        <br>
