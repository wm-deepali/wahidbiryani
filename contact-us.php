<?php include('header.php'); ?>
<section>
    <div class="lgx-banner lgx-banner-inner">
        <div class="lgx-page-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading-area">
                            <div class="lgx-heading lgx-heading-white">
                                <h2 class="heading-title">Contact Us</h2>
                            </div>
                            <ul class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="contact-area ptb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="contact-box">
					<h3>Locate Us</h3>
					<p><a href="#"><i class="icofont-google-map"></i> <?= $gen_setting['address']; ?></a>
					</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="contact-box">
					<h3>Opening Hours</h3>
					<p class="opening-hours">Mon - Sat <span>12:30 PM to 10:30 PM</span>
					</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="contact-box">
					<h3>Contact Us</h3>
					<p><a href="#"><i class="icofont-phone"></i><?= $gen_setting['mob']; ?></a>
					</p>
					<p><a href="#"><i class="icofont-envelope"></i> <?= $gen_setting['email']; ?></a>
					</p>
				</div>
			</div>
		</div>
		<div class="row pt-40">
			<div class="col-md-12">
				<div class="row">
					<?php
    $query="SELECT * FROM manage_branch WHERE status='active'";
    $get_branch=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($branch=mysqli_fetch_array($get_branch)){
    ?>
					<div class="col-sm-4">
						<div class="box-location enquiry-box">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="h3-box"><?= $branch['branch']; ?></h3>
									<!-- title here -->
								</div>
								<div class="col-sm-12">
									<iframe src="<?= $branch['map']; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
									<!-- Map here -->
								</div>
								<div class="col-sm-12">
									<div class="box-height">
										<?= $branch['address']; ?><br>
										<strong><i class="fa fa-phone"></i> </strong><?= $branch['mob_no']; ?><br> 
										<strong><i class="fa fa-envelope"></i> </strong> <?= $branch['email']; ?></div>
								</div>
							</div>
						</div>
						<!--<div class="form-button">
            				<button class="btn btn-primary w100">Visit Branch Page <i class="fa fa-chevron-right"></i></button>
            			</div>-->
					</div>
        <?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>