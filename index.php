<?php include('header.php'); ?>
<div id="demo" class="carousel-banner carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <?php
    $query="SELECT * FROM bk_slider WHERE status='active'";
    $get_slider=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    $i=0;
    while($slider=mysqli_fetch_array($get_slider)){
    ?>
    <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?php if($i==0){echo 'active' ;} ?>"></li>
   <?php $i++; } ?>
  </ul>
  <div class="carousel-inner">
    <?php
    $query="SELECT * FROM bk_slider WHERE status='active'";
    $get_slider=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    $i=0;
    while($slider=mysqli_fetch_array($get_slider)){
    ?>
    <div class="carousel-item <?php if($i==0){echo 'active' ; } ?>">
		<div class="overlay">
			<img src="administrator/slider/<?= $slider['image_name']; ?>" alt="<?= $slider['heading']; ?>" width="100%">
		</div>
      <div class="carousel-caption">
        <div class="main-banner-content">
           <h1><?= $slider['heading']; ?></h1>
           <h3><?= $slider['title']; ?></h3>
           <a href="menus.php" class="btn btn-primary">See More Menus</a>
        </div>
      </div>   
    </div>
    <?php $i++; } ?>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    <?php
    $query="SELECT * FROM bk_about WHERE status='active'";
    $get_about=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    $about=mysqli_fetch_array($get_about);
    ?>
<section data-scroll-index="1" data-overlay-dark="0" class="about-pad-section" style="background:url('img/bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="callto-action-imgbox md-margin-30px-right">
                        <img src="administrator/gallery/thumb/<?= $about['image_name'];?>" alt="about story" class="img-fluid img-about" />
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 offset-lg-0">

                    <div class="section-heading left half xs-margin-20px-bottom">
                        <div class="title-font"><?= $about['title']; ?></div>
                        <h4><?= $about['name']; ?></h4>
                    </div>
                   <?= $about['content']; ?>
                    <a href="about-us.php" class="readmore-btn">Read More</a>
                </div>
            </div>
        </div>
    </section>
<section class="reservation-area ptb-60" >
	<div class="container">
		<h2>Delicious Chicken & Mutton Biryani</h2>
		<a href="menus.php" class="btn btn-primary">See All Menus</a>
	</div>
</section>
<section id="menu" class="menu-area-two ptb-100">
            <div class="container">
                <div class="section-title">
                    <span>Discover</span>
                    <h2>Our Menu</h2>
                </div>

                <div class="row">
                    <?php 
    $query="SELECT * FROM bk_menu_detail WHERE status='active' order by id desc limit 0,8";
    $get_menu_detail=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($menu_detail=mysqli_fetch_array($get_menu_detail)){ ?>
                    <div class="col-lg-3 col-6 col-md-4">
                        <div class="menu-item">
                            <div class="menu-image">
                                <img src="administrator/gallery/thumb/<?= $menu_detail['image_name']; ?>" alt="<?= $menu_detail['title']; ?>">
                            </div>
                            <div class="menu-content">
                                <h3><?= $menu_detail['title']; ?></h3>
                                <p><?= $menu_detail['content']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="line-bg"><img src="img/line.png" alt="line"></div>
        </section>

<section class="gallery-area ptb-60" >
	<div class="container">
		<div class="text-white section-title">
            <span>Images &amp; Videos</span>
            <h2>Our Gallery</h2>
        </div>
		
		<div class="row">
			<div class="col-sm-7">
				<div class="row">
			<?php
    
    $query="SELECT * FROM bk_gallery_image WHERE status='active' order by id desc limit 0,6";
    $get_gallery_image=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($gallery_image=mysqli_fetch_array($get_gallery_image)){
    ?>
			<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter <?= $gallery_category['id']; ?>">
    
                <a class="thumbnail fancybox" rel="ligthbox" href="administrator/gallery/<?=$gallery_image['image_name']; ?>">
                <img src="administrator/gallery/thumb/<?=$gallery_image['image_name']; ?>" class="img-responsive">
                </a>
            </div>
            <?php } ?>
					</div>
			</div>
			<div class="col-sm-5">
				<div class="owl-carousel video-slides" id="video-sec">
          <?php 
          $query="SELECT * FROM bk_video WHERE status='active'";
    $get_video=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($video=mysqli_fetch_array($get_video)){ ?>
                   <div>
						<iframe width="100%" height="280px" src="https://www.youtube.com/embed/<?= $video['link']; ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				   </div>
					<?php } ?>
                </div>
			</div>
		</div>
	</div>
</section>
<section class="feedback-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <span>Testimonials</span>
                    <h2>Our Customers Feedback</h2>
                </div>
                <div class="row">

                    <div class="owl-carousel feedback-slides" id="feedback">
                        <?php
    $query="SELECT * FROM bk_testimonial WHERE status='active'";
    $get_testimonial=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($testimonial=mysqli_fetch_array($get_testimonial)){ ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-feedback">
                                <p><?= $testimonial['content']; ?></p>
                                <div class="client-info">
                                    <h3><?= $testimonial['title']; ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
						
                    </div>
                </div>
                <div class="feedback">
          <div class="feedback-button"> <a class="btn btn-primary green" data-toggle="modal" href="#myModal2"> Send Your Feedback</a>
            <div id="myModal2" class="modal fade" role="dialog" style="display: none;">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 class="modal-title">Your Feedback</h4>
                    <?= $_SESSION['testi']; $_SESSION['testi']="";?>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="insert_testimonial.php">
                      <div class="form-group">
                        <label for="usr">Name</label>
                        <input type="text" class="form-control increase" name="title" id="usr" required="">
                      </div>
                      <div class="form-group">
                        <label for="usr">Email</label>
                        <input type="email" class="form-control increase" name="email" id="usr" required="">
                      </div>
                      <div class="form-group">
                        <label for="usr">Mobile</label>
                        <input type="number" class="form-control increase" name="mobile" id="usr" required="">
                      </div>
                      <div class="form-group">
                        <label for="usr">Comment</label>
                        <textarea class="form-control" rows="4" name="content" id="comment" required=""></textarea>
                      </div>
                      <div class="form-group">
                        <div class="enquiry-btn">
                          <button type="submit" name="submit" class="btn btn-info">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            </div>
        </section>
<?php include('footer.php'); ?>