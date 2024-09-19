<?php
declare(strict_types = 1);
require('functions.php');
require('Database.php');
$config = require('config.php');
$db = new Database($config['database']);

$body = '';

function is_text($text, int $min = 0, int $max = 1000): bool {
    $length = mb_strlen($text);
    return ($length >= $min and $length <= $max);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = $_POST['body'];
    $valid = is_text($body, 1, 280);
    if ($valid) {
        $message = 'Posted successfully.';
        $db->query('INSERT INTO posts(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    } else {
        $message = 'Error: Body must be between 0-280 characters. Please try again.';
    }
}

$heading = "Home";
require('views/index.view.php');