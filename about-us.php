<?php include('header.php'); ?>
<?php
    $query="SELECT * FROM bk_about_us WHERE status='active'";
    $get_about=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    $about=mysqli_fetch_array($get_about);
    ?>
<section>
    <div class="lgx-banner lgx-banner-inner">
        <div class="lgx-page-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading-area">
                            <div class="lgx-heading lgx-heading-white">
                                <h2 class="heading-title">About Us</h2>
                            </div>
                            <ul class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section data-scroll-index="1" data-overlay-dark="0" class="about-pad-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-heading left half xs-margin-20px-bottom">
                        <div class="title-font"><?= $about['title']; ?></div>
                        <h4><?= $about['name']; ?></h4>
                    </div>
                  <?= $about['content']; ?>
                </div>
				
                <div class="col-xl-5 col-lg-5">
                    <div class="callto-action-imgbox md-margin-30px-right">
                        <img src="administrator/gallery/thumb/<?= $about['image_name'];?>" alt="about story" class="img-fluid img-about" />
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="reservation-area ptb-60" >
	<div class="container">
		<h2>Varieties of Biryani</h2>
		<a href="menus.php" class="btn btn-primary">See All Menus</a>
	</div>
</section>
<?php include('footer.php'); ?>