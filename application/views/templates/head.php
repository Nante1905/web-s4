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
    <!-- navbar -->
    <link rel="stylesheet" href="<?= base_url()."assets/css/navbar.css" ?>">
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= base_url()."assets/mdbootstrap/css/mdb.min.css" ?>">
    <?php 
    foreach($metadata['styles'] as $style) { ?>
        <link rel="stylesheet" href="<?= base_url()."assets/css/" . $style . ".css" ?>">
    <?php } 
    ?>
    <title><?= $metadata['title'] ?></title>
</head>
<body>
    <?php header('Content-Type: text/html; charset=utf-8'); ?>
    <?php $this->load->view('templates/navbar') ?>

