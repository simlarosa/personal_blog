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
        <section>
            <div class="row mt-3">
                <?php if(isset($_GET['tag'])) { ?>
                    <h1>Ultimi Post con tag: <?= $_GET['tag']; ?></h1>
                <?php } else { ?>
                <h1>Ultimi Post</h1>
                <?php }?>
            </div>
            <?php foreach($posts as $post) {   ?>
            <div class="row my-4">
                <article>
                    <h3><?= $post['title'] ?></h3>
                    <p>
                        <?= $post['content']  ?>
                    </p>
                <p>Tags: <?php for($i=0; $i<count($post['tag']); $i++) { 
                    if($i == count($post['tag']) - 1) {?>
                    <a href=<?= "index.php?tag={$post['tag'][$i]}"?>><?= $post['tag'][$i] ?></a>.
                    <?php } else { ?>
                        <a href=<?= "index.php?tag={$post['tag'][$i]}"?>><?= $post['tag'][$i] ?></a>,
                    <?php } ?>
                <?php }?></p>
                </article>
            </div>
            <?php } ?>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>