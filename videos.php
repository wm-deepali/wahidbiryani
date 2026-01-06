<?php include('header.php'); ?>
<section>
    <div class="lgx-banner lgx-banner-inner">
        <div class="lgx-page-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading-area">
                            <div class="lgx-heading lgx-heading-white">
                                <h2 class="heading-title">Gallery</h2>
                            </div>
                            <ul class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Video Gallery</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ptb-60" >
	<div class="container">
		<div class="row">
		    <?php 
          $query="SELECT * FROM bk_video WHERE status='active'";
    $get_video=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($video=mysqli_fetch_array($get_video)){ ?>
                   <div class="col-sm-4">
						<iframe width="100%" height="260px" src="https://www.youtube.com/embed/<?= $video['link']; ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				   </div>
					<?php } ?>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>