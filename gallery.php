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
                                <li class="active">Image Gallery</li>
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
			<div class="col-sm-12 mb-4">
			<div align="center" class="category-menus" id="dynamic_buttons">
            	<!-- <button class="filter-button active" data-filter="all">All</button> -->
            	<?php
    $query="SELECT * FROM bk_gallery_category WHERE status='active'";
    $get_gallery_category=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($gallery_category=mysqli_fetch_array($get_gallery_category)){
    ?>
          <button class="filter-button" data-filter="<?= $gallery_category['id']; ?>"><?= $gallery_category['title']; ?></button>
            <?php } ?>
        	</div>
			</div>
			<?php
    $query="SELECT * FROM bk_gallery_category WHERE status='active'";
    $get_gallery_category=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($gallery_category=mysqli_fetch_array($get_gallery_category)){
    $query="SELECT * FROM bk_gallery_image WHERE status='active' and cat_id='".$gallery_category['id']."'";
    $get_gallery_image=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($gallery_image=mysqli_fetch_array($get_gallery_image)){
    ?>
			<div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter <?= $gallery_category['id']; ?>">
	
				<a class="thumbnail fancybox" rel="ligthbox" href="administrator/gallery/<?=$gallery_image['image_name']; ?>">
                <img src="administrator/gallery/thumb/<?=$gallery_image['image_name']; ?>" class="img-responsive">
				</a>
            </div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>