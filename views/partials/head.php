<?php
    if (urlIs('/')) {
        $slug = 'home';
    } else {
        $slug = getSlug();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading; ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body class="<?= $slug; ?>">