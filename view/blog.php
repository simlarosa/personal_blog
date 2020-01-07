<?php require 'modules/header.php'; ?>

<div class="container">
    <section>
        <div class="row mt-3">
            <?php if (isset($_GET['tag'])) { ?>
                <h1>Ultimi Post con tag: <?= $_GET['tag']; ?></h1>
            <?php } else { ?>
                <h1>Ultimi Post</h1>
            <?php } ?>
        </div>

        <?php foreach ($posts as $post) {   ?>
            <div class="row my-4">
                <div class="card" style="width: 36rem;">
                    <a href="blog.php?post=<?= $post->title(); ?>"><img class="card-img-top" src="/personal_blog/assets/uploads/<?= $post->imgLink() ? $post->imgLink() : "placeholder.png" ?>" alt="Card image cap"></a>
                    <div class="card-body">
                        <article>
                        <a href="blog.php?post=<?= $post->title(); ?>"><h5 class="card-title"><?= $post->title(); ?></h5></a>
                                <p class="card-text">
                                    <?= $post->content();  ?>
                                </p>
                                <p>Tags: <?php foreach ($post->tag() as $index => $tag) { ?>
                                        <?php
                                                $delimiter = $index < (count($post->tag()) - 1) ? ', ' : '.';
                                        ?>
                                        <a href="blog.php?tag=<?= $tag ?>"><?= $tag ?></a><?= $delimiter ?>
                                    <?php } ?></p>
                                    </article>
                    </div>
                    <div class="rounded-bottom bg-light pt-3">
                                <ul class="list-unstyled list-inline font-small ml-3">
                                    <li class="list-inline-item pr-2"><?= $post->author() ?></li>
                                    <li class="list-inline-item pr-2"><?= date('d-m-Y',$post->date()) ?></li>
                                </ul>
                            </div>
                </div>
            </div>
        <?php } ?>
    </section>
</div>

<?php require 'modules/footer.php'; ?>