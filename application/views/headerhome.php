<?php
$dataUser = "";
if (isset($_SESSION['id'])) $dataUser = $this->user_sql->getUser($_SESSION['id']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="YZvCEggd_qGvIV2ZUlw6UiRIicMOgJ8h0nN0w8db_14" />
    <?= ($viewport) ?>
    <title>SAPCoRP 3 | Dashboard</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CLibre+Baskerville:400,400italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('asset/homepage/css/clear.css') ?>' />
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('asset/homepage/css/common.css') ?>' />
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('asset/homepage/css/font-awesome.min.css') ?>' />
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('asset/homepage/css/carouFredSel.css') ?>' />
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('asset/homepage/css/sm-clean.css') ?>' />
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('asset/homepage/css/style.css') ?>' />
    <link rel='shortcut icon' href='<?php echo base_url('asset/homepage/images/saproject.png') ?>'>
    <?php if (isset($cssFile)) echo $cssFile; ?>
</head>

<?= ($bodyClass) ?>
<!-- Preloader Gif -->
<table class="doc-loader">
    <tbody>
        <tr>
            <td>
                <img src="<?php echo base_url('homepage/images/ajax-document-loader.gif') ?>" alt="Loading...">
            </td>
        </tr>
    </tbody>
</table>

<!-- Left Sidebar -->
<div id="sidebar" class="sidebar">
    <div class="menu-left-part">
        <div class="search-holder">
            <label>
                <input type="search" class="search-field" placeholder="Type here to search..." value="" name="s" title="Search for:">
            </label>
        </div>
        <div class="site-info-holder">
            <h1 class="site-title">Carollous Dachi</h1>
            <p class="site-description">
                A young person who is highly enthusiastic in the world of technology.
            </p>
        </div>
        <nav id="header-main-menu">
            <ul class="main-menu sm sm-clean">
                <li><a href="<?php echo base_url('home') ?>" class="current">Home</a></li>
                <li><a href="<?php echo base_url('contact') ?>">Contact</a></li>
                <li><a href="<?php echo base_url('portfolio') ?>">Portfolio</a></li>
            </ul>
        </nav>
        <footer>
            <div class="footer-info">
                © 2020 SAPPCoRP 3 <br> CRAFTED WITH <i class="fa fa-heart"></i> BY <a href="https://facebook.com/carolloux.dachi">Carollous Dachi</a>.
            </div>
        </footer>
    </div>
    <div class="menu-right-part">
        <div class="logo-holder">
            <a href="<?php echo base_url('dashboard') ?>">
                <img src="<?php echo base_url('homepage/images/ajax-document-loader.gif') ?>" alt="SAPCoRP 3">
            </a>
        </div>
        <div class="toggle-holder">
            <div id="toggle">
                <div class="menu-line"></div>
            </div>
        </div>
        <div class="social-holder">
            <div class="social-list">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="https://facebook.com/carolloux.dachi"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-vimeo"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
                <a href="#"><i class="fa fa-rss"></i></a>
            </div>
        </div>
        <div class="fixed scroll-top"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i></div>
    </div>
    <div class="clear"></div>
</div>