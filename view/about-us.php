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

    <div class="container">
        <div class="row mt-2">
            <h1>Chi sono</h1>
        </div>
        <div class="row my-4">
            <div class="col-3">
                <img class="img-fluid"
                    src="https://scontent-mxp1-1.xx.fbcdn.net/v/t1.0-9/38756582_10217175313279825_647156906133028864_n.jpg?_nc_cat=109&_nc_eui2=AeHljd0RyAM9JzMaal7nYvIm7MKHz8BDV6c_ovyo11CQYyQiwTEC187kDofCt33gitz3VtLyxr-etJWyjx9aWqHKJTT5zsS0TOaqC6dj2OqNKg&_nc_ohc=9HZmK8vOjBUAQmfPmH_5LrqI_5PqwCSO07_y_RkSyyjNjNMH5wKb9S0bw&_nc_ht=scontent-mxp1-1.xx&oh=e09c5c5e85ac152809a89a118c8be186&oe=5E54D590"
                    alt="Mia Foto">
            </div>
            <div class="col-9">
                <h3>Simone La Rosa</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Maecenas ut metus leo. Donec nec sem arcu.
                    Fusce facilisis porttitor felis ut efficitur.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Maecenas ut metus leo. Donec nec sem arcu.
                    Fusce facilisis porttitor felis ut efficitur.
                </p>
            </div>
        </div>
        <section>
            <h2>Lingue</h2>
            <div class="row">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Lingua</th>
                            <th scope="col">Scritto</th>
                            <th scope="col">Parlato</th>
                            <th scope="col">Ascolto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Italiano</th>
                            <td>C2</td>
                            <td>B2</td>
                            <td>C1</td>
                        </tr>
                        <tr>
                            <th scope="row">Inglese</th>
                            <td>C2</td>
                            <td>B2</td>
                            <td>C1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>