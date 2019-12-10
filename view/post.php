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

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-10 offset-lg-2 offset-1">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Aggiungi Post</h5>
                        </div>
                        <form action="post.php" method="POST">
                            <div class="form-group">
                                <label for="inputTitle">Titolo:</label>
                                <input type="text" class="form-control" id="inputTitle" name="Title">
                                <small id="textHelp" class="form-text text-muted">Decide the best title for you amazing blog post</small>
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Contenuto:</label>
                                <textarea name="Content" rows="5" cols="40" class="form-control" id="inputTitle"></textarea>
                                <small id="contentHelp" class="form-text text-muted">Put your content here!</small>
                            </div>
                            <div class="form-group">
                                <label for="inputTag">Tag:</label>
                                <input type="text" class="form-control" id="inputTag" name="Tag">
                                <small id="tagHelp" class="form-text text-muted">Thanks to the tag, we can organize the blog and categorize the content</small>
                            </div>
                            <button type="submit" class="btn btn-success">Aggiungi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>