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
                <article>
                    <h3><?= $post['title'] ?></h3>
                    <p>
                        <?= $post['content']  ?>
                    </p>
                    <p>Tags: <?php foreach ($post['tag'] as $index => $tag) { ?>
                            <?php
                                    $delimiter = $index < (count($post['tag']) - 1) ? ', ' : '.';
                                    ?>
                            <a href="index.php?tag=<?= $tag ?>"><?= $tag ?></a><?= $delimiter ?>
                        <?php } ?></p>
                </article>
            </div>
        <?php } ?>
    </section>
</div>

<?php require 'modules/footer.php'; ?>