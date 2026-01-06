<?php include('administrator/connection.php'); ?>
<?php
$query="SELECT * FROM bk_general_setting WHERE status='active'";
$get_gen_setting=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
$gen_setting=mysqli_fetch_array($get_gen_setting);
$query="SELECT * FROM bk_social_media WHERE status='active'";
$get_social_media=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
$social_media=mysqli_fetch_array($get_social_media);
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$query="SELECT * FROM bk_seo WHERE status='active' and url='".$actual_link."'";
$get_seo=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
$seo=mysqli_fetch_array($get_seo);
?>
<!doctype html>
<html>
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
         <meta name="description" content="<?= $seo['meta_desc']; ?>">
      <meta name="keywords" content="<?= $seo['meta_key']; ?>">
         <meta name="author" content="Webmingo">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/fav.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- IcoFont Min CSS -->
        <link rel="stylesheet" href="css/icofont.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
        <title><?= $seo['meta_title']; ?></title>
    </head>
    <body data-spy="scroll" data-offset="70">
        <!-- Start Header Area -->
        <header class="top-area">
            <div class="top-bar template-color-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="call-to-action">
                                <p><i class="icofont-envelope"></i> Email: <a href="#"><?= $gen_setting['email']; ?></a></p>
                                <p><i class="icofont-phone"></i> Phone: <a href="#"><?= $gen_setting['tel']; ?></a></p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <ul class="top-social">
                                <li><a href="<?= $social_media['facebook']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="<?= $social_media['twitter']; ?>"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="<?= $social_media['youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="<?= $social_media['whatsapp']; ?>"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>

                            <div class="opening-hours">
                                <p><i class="icofont-wall-clock"></i> Opening Hours : 12:30 PM to 10:30 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg middle-logo-navbar navbar-light bg-light white-bg-navbar">
                <div class="container">
                    <a class="navbar-brand black-logo" href="index.php"><img src="administrator/logo/<?= $gen_setting['image_name']; ?>" alt="Wahid Biryani"></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="menus.php">Our Menus</a></li>
                            <li class="nav-item logo"><a href="index.php">
                                <img src="img/logo.png" alt="Wahid Biryani" class="black-logo">
                            </a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Gallery
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="gallery.php">Image Gallery</a>
                                    <a class="dropdown-item" href="videos.php">Video Gallery</a>
                                </div>
                            </li>
						<!--	<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="#send_enquiry" data-target="#send_enquiry" data-toggle="modal">Enquiry</a></li>   
                            <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- End Header Area -->
<div cllass="clearfix"></div>