<?php
require('partials/head.php');
require('partials/nav.php');

?>
<main class="container" id="page-view-posts">
    <h1>All Posts</h1>
    <?php foreach ($posts as $post) : ?>
    <?php 
        $sanitized_body = htmlspecialchars($post['body']);
    ?>
    <article class="post-container">
        <p><?= $sanitized_body; ?></p>
        <form action="/posts?id=<?= $post['id']; ?>" method="POST">
            <button>delete</button>
        </form>
        <a href="/edit?id=<?= $post['id']; ?>">Edit</a>
    </article>
    <?php endforeach; ?>
</main>


<?php require('views/partials/footer.php');