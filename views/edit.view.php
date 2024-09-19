<?php
require('views/partials/head.php');
require('views/partials/nav.php');
?>
<main class="container" id="page-edit">
    <?php foreach ($posts as $post) : ?>
        <?php if ($post['id'] === (int)$idString) : ?>
            <a href="/posts">Back to posts</a>
            <h1><?= $post['title'] ?></h1>
            <p><?= $post['body'] ?></p>
            <form method="POST">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="<?= $post['title'] ?>">
                <label for="body">Body</label>
                <textarea name="body" id="body" placeholder="<?= $post['body'] ?>"></textarea>
                <button type="submit">create</button>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>
</main>
<?php require('views/partials/footer.php');

