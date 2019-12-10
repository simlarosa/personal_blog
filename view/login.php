<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Il mio blog personale</title>
</head>

<body>
<?php require 'modules/header.php'; ?>


    <div class="d-flex align-items-center vh-100 mt-n5">
    <div class="container mt-n5">
        <div class="row">
            <div class="col-10 offset-1 col-lg-4 offset-lg-4">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Login</h4>
                        </div>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="inputEmail">Email address</label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                    placeholder="Enter your email address">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="password"
                                    placeholder="Enter your best password">
                            </div>
                            <button type="submit" class="btn btn-success">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>