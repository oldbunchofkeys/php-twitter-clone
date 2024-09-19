<?php
require('functions.php');
require('Database.php');
$config = require('config.php');
$db = new Database($config['database']);
$posts = $db->query('select * from POSTS')->fetchAll();

$idString = substr_replace($_SERVER['REQUEST_URI'], '', 0, 9);

// UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('UPDATE posts SET body = :body, title = :title WHERE id = :id', [
        'id' => (int)$idString,
        'body' => $_POST['body'],
        'title' => $_POST['title']
    ]);
    //we have to get the data from the database again in order to update the view without refreshing
    $posts = $db->query('select * from POSTS')->fetchAll();
}
$heading = "Edit";
require('views/edit.view.php');

