<?php
require('partials/head.php');
require('partials/nav.php');

?>
<main class="container" id="page-home">
    <article class="post-wrapper">
        <button id="new-post-modal-trigger">New Post</button>
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<p>'. $message . '</p>';
        } ?>
        
        <div id="modal" class="form-wrapper hidden">
            <form method="POST">
                <h2>Create a New Post</h2>
                <label for="body">Body</label>
                <textarea name="body" id="body" ></textarea>
                <p>
                    <span id="body-count">0</span>/280 Characters <span id="body-count-warning" class="body-count-warning hidden">! WARNING ! body text is too long</span>
                </p>
                <p id="client-body-error" class="body-error"></p>
                <button type="submit">create</button>
            </form>
            <button id="modal-close" class="close">X</button>
        </div>
    </article>
</main>
    
<?php require('views/partials/footer.php');