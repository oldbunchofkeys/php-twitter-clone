<?php

require('functions.php');
require('Database.php');
$config = require('config.php');
$db = new Database($config['database']);
//READ
$posts = $db->query('select * from POSTS')->fetchAll();
//DELETE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idString = substr_replace($_SERVER['REQUEST_URI'], '', 0, 10);
    $db->query('DELETE FROM posts WHERE id = :id', [
        'id' => (int)$idString
    ]);
    //update view when post is deleted
    $posts = $db->query('select * from POSTS')->fetchAll();
}
$heading = "View Posts";
require('views/posts.view.php');
