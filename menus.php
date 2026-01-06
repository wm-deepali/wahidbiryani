<?php include('header.php'); ?>
<section>
    <div class="lgx-banner lgx-banner-inner">
        <div class="lgx-page-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading-area">
                            <div class="lgx-heading lgx-heading-white">
                                <h2 class="heading-title">Our Menus</h2>
                            </div>
                            <ul class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Our Menus</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="menu" class="menu-area-two ptb-100">
            <div class="container">
                <div class="row">
					<div class="col-sm-12 category-menus">
                        <?php
    $query="SELECT * FROM bk_menu_category WHERE status='active'";
    $get_menu_category=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($menu_category=mysqli_fetch_array($get_menu_category)){
    ?>
				<a href="menus.php?cat_id=<?= $menu_category['id']; ?>"><?php echo $menu_category['title']; ?></a>
                    <?php } ?>
					</div>
				</div>
                <div class="row">
    <?php
     if($_GET['cat_id']!=""){
    $query="SELECT * FROM bk_menu_detail WHERE status='active' and cat_id='".$_GET['cat_id']."'";
    $get_menu_detail=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($menu_detail=mysqli_fetch_array($get_menu_detail)){
    ?>
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
                <?php } } 
                else{ 
     $query="SELECT * FROM bk_menu_detail WHERE status='active' order by id desc limit 0,12";
    $get_menu_detail=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
    while($menu_detail=mysqli_fetch_array($get_menu_detail)){
                    ?>
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
              <?php } } ?>
                </div>
            </div>
        </section>
<?php include('footer.php'); ?>