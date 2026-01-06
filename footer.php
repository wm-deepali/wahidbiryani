<footer>
		<div class="bg2 ptb50">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-lg-3">
						<div class="wrap-pic-max-h">
							<a href="index.php"><img src="img/logo2.png" alt="Wahid Biryani" class="img-fluid img-footer"></a>
						</div>

						<p class="s1-txt3">
							Wahid Biryani was established in year 1955 and till now its Aroma and Taste have been remain the same as it was in year 1955.
						</p>
					</div>

					<div class="col-sm-6 col-lg-3">
						<div class="wrap-pic-max-h">
							<h4 class="m2-txt2">
								Contact Us
							</h4>
						</div>
						<ul>
							<li class="s1-txt3 flex-w p-b-17">
								<i class="fas fa-home"></i>
								<span class="wsize2">
									<?= $gen_setting['address']; ?>
								</span>
							</li>
							<li class="s1-txt3 flex-w p-b-17">
								<i class="far fa-envelope"></i>
								<span class="wsize2">
									<?= $gen_setting['email']; ?>
								</span>
							</li>
							<li class="s1-txt3 flex-w p-b-17">
								<i class="fas fa-phone"></i>
								<span class="wsize2">
									 <?= $gen_setting['tel']; ?>
								</span>
							</li>
						</ul>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="wrap-pic-max-h">
							<h4 class="m2-txt2">
								Quick Links
							</h4>
						</div>

						<ul>
							<li><a href="index.php"><i class="fas fa-chevron-right"></i> Home </a></li>
							<li><a href="about-us.php"><i class="fas fa-chevron-right"></i> About Us </a></li>
							<li><a href="menus.php"><i class="fas fa-chevron-right"></i> Our Menus </a></li>
							<li><a href="gallery.php"><i class="fas fa-chevron-right"></i> Gallery </a></li>
							<li><a href="contact-us.php"><i class="fas fa-chevron-right"></i> Contact Us </a></li>
						</ul>
					</div>

					<div class="col-sm-6 col-lg-3">
						<div class="wrap-pic-max-h">
							<h4 class="m2-txt2">
								Connect With Us
							</h4>
						</div>
						
						<div class="social-footer">
							<ul>
								<li>
									<a href="<?= $social_media['facebook']; ?>">
										<i class="fab fa-facebook-f"></i>
									</a>
								</li>
								<li>
									<a href="<?= $social_media['twitter']; ?>">
										<i class="fab fa-twitter"></i>
									</a>
								</li>
								<li>
									<a href="<?= $social_media['youtube']; ?>">
										<i class="fab fa-youtube"></i>
									</a>
								</li>
								<li>
									<a href="<?= $social_media['ggle']; ?>">
										<i class="fab fa-google-plus-g"></i>
									</a>
								</li>
								<li>
									<a href="<?= $social_media['rss']; ?>">
										<i class="fas fa-rss"></i>
									</a>
								</li>
							</ul>
						</div>
						
						<div class="wrap-pic-max-h">
							<h4 class="m2-txt2">
								Vistors
							</h4>
						</div>
						 <?php
						 $query="UPDATE hits SET count=count+1";
						 $counter=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    $query="SELECT * FROM hits";
    $get_hits=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    $hits =mysqli_fetch_array($get_hits);
    ?>
						<div class="visitors-counts">
							<?= $hits['count']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-copy">
			&copy; Copyright 2012 Wahid Biryani. All Right Reserved | Designed &amp; Developed By <a href="http://www.webmingo.in" target="_blank">Web Mingo IT Solution</a>
		</div>
	</footer>
<!-- The Modal -->
<div class="modal" id="send_enquiry">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Send Enquiry</h4>
      </div>
<?= $_SESSION['contact']; $_SESSION['contact']!=""; ?>
      <!-- Modal body -->
      <form method="post" action="insert_contact.php">
      <div class="modal-body">
        <div class="form-group row">
        	<div class="col-sm-12">
        		<label class="label label-control">Full Name</label>
        		<input type="text" name="name" class="form-control" placeholder="Enter Your Name *" required="">
        	</div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-12">
        		<label class="label label-control">Email Address</label>
        		<input type="email" name="email" class="form-control" placeholder="Enter Your Name *" required="">
        	</div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-12">
        		<label class="label label-control">Mobile Number</label>
        		<input type="number" class="form-control" placeholder="Enter Mobile Number *" required="" name="mobile">
        	</div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-12">
        		<label class="label label-control">Query</label>
				<textarea class="form-control" placeholder="Enter your query here" name="message"></textarea>
        	</div>
        </div>
      </div>
<div class="col-md-12">
              <label>Captcha</label>
                <div class="form-group">  
                 <img src="captcha.php" id="captcha" /><br/>
    <a href="#" onClick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/>
  <b>Human Test</b><br/>
  <input type="text" class="form-control" name="captcha" id="captcha-form" />
              </div>
          </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit">Send Enquiry</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>


                    </div>
      <!-- Modal footer -->
     
</form>
    </div>
  </div>
</div>

    <div class="floating-left">
		<a href="tel:+9105222611878"><img src="img/Wahid2.gif" class="img-gif img-fluid"></a>
	</div>
        <div class="go-top"><img src="img/top.png" class="img-fluid img-backtop"></div>

        <!-- jQuery Min JS -->
        <script src="js/jquery.min.js"></script>
        <!-- Prpper JS -->
        <script src="js/popper.min.js"></script>
        <!-- Bootstrap Min JS -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Plugins JS -->
        <!--<script src="js/plugins.js"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
        <!-- Main JS -->
        <script src="js/main.js"></script>
    </body>
</html>