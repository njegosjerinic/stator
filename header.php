<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <title>Stator G & S</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="">

</head>

<body>
    <header>
        <div class="background">
            <img src="<?php echo get_theme_file_uri("images/header-background.jpg") ?>" alt="">
            <img src="<?php echo get_theme_file_uri("images/mobilna.png") ?>" alt="">
        </div>
        <div class="banner-container">
            <p>Ulica Vojvode Misica bb 74000 Doboj, Bosna i Hercegovina</p>
        </div>
        <div class="logo-menu-container">
            <div class="logo-container">
                <a href="<?php echo site_url('/pocetna'); ?>">
                    <img src="<?php echo get_theme_file_uri("images/logo.png") ?>" alt="">
                </a>
            </div>
            <ul class="header-menu">
                <li class="menu-item"><a href="<?php echo site_url() ?>">Početna</a></li>
                <li class="menu-item"><a href="<?php echo site_url('o-nama') ?>">O nama</a></li>
                <li class="menu-item"><a href="<?php echo site_url('/kontakt') ?>">Kontakt</a></li>
                <li class="menu-item"><a href="<?php echo site_url('/gradjevinarstvo') ?>">Gradjevinarstvo</a></li>
                <li class="menu-item"><a href="<?php echo site_url('/energetika') ?>">Energetika</a></li>
                <li class="menu-item"><a href="<?php echo site_url('/trgovina') ?>">Trgovina</a></li>
            </ul>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </header>