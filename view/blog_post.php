<?php require 'modules/header.php'; ?>

<div class="container">
    <section>
        <div class="row">
            <img class="img-fluid" src="/personal_blog/assets/uploads/<?= $post->imgLink() ? $post->imgLink() : "placeholder.png" ?>" alt="Card image cap">
        </div>

        <div class="row mt-5">
            <h1><?= $post->title(); ?></h1>
        </div>
        <div class="row">
            <p>Tags: <?php foreach ($post->tag() as $index => $tag) { ?>
                    <?php
                            $delimiter = $index < (count($post->tag()) - 1) ? ', ' : '.';
                    ?>
                    <a href="blog.php?tag=<?= $tag ?>"><?= $tag ?></a><?= $delimiter ?>
                <?php } ?></p>
        </div>

        <div class="row mt-2 mb-2">
            <p style="font-size: 18px; color:black">
                <?= $post->content();  ?>
            </p>
        </div>
        <div class="row">
            <div class="rounded-bottom bg-light pt-3">
                <ul class="list-unstyled list-inline font-small ml-3">
                    <li class="list-inline-item pr-2"><?= $post->author() ?></li>
                    <li class="list-inline-item pr-2"><?= date('d-m-Y', $post->date()) ?></li>
                </ul>
            </div>
        </div>

<?php require 'modules/footer.php'; ?>