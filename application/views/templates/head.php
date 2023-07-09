<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url()."assets/css/app.css" ?>">
    <?php 
    foreach($metadata['styles'] as $style) { ?>
        <link rel="stylesheet" href="<?= base_url()."assets/css/" . $style . ".css" ?>">
    <?php } 
    ?>
    <title><?= $metadata['title'] ?></title>
</head>
<body>
    <?php header('Content-Type: text/html; charset=utf-8'); ?>
