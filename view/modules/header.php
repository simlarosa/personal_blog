<?php require_once "/Applications/MAMP/htdocs/personal_blog/core/config/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Il mio blog personale</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img src="assets/logo_small.png" class="img-responsive" alt="brand"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">Chi Sono</a>
                </li>
            </ul>
            <?php if ($authenticator->isLogged()) { ?>
                <a class="btn btn-primary my-2 px-5 mr-3" role="button" href="post.php">Post</a>
                <a class="btn btn-danger my-2 px-5 mr-3" role="button" href="logout.php">Logout</a>
            <?php } else { ?>
                <a class="btn btn-success px-5  mr-3" data-toggle="modal" data-target="#login" href="#login">Login</a>
            <?php } ?>
        </div>
    </nav>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter your email address">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter your best password">
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>