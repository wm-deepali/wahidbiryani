<?php 
include("header.php");
   $_HEADING = "Update About Us Profile";   
   $query = "SELECT * FROM bk_about";
   $get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
   $offer = mysqli_fetch_assoc($get_offer); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>About Management</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-files-o"></i> About Page Management</a></li>
			<li class="breadcrumb-item active">Edit About</li>
		</ol>
	</section>
	<br>
	<div class="box">
		<!-- /.box-header -->
		<div class="box-body">
		<?php if($_SESSION['brand']!=""){?>
           <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo $_SESSION['brand'];$_SESSION['brand']="";?>
                  </div>
       <?php } ?>
         <?php if($_SESSION['brand']!=""){?>
           <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo $_SESSION['brand'];$_SESSION['brand']="";?>
                  </div>
       <?php } ?>
			<div class="row">
				<div class="col">
					<form action="action/manage_about.php?subview=update&id=<?php echo $offer['id'];?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<h5>Heading<span class="text-danger">*</span></h5>
					<div class="controls">
<input type="text" name="title" class="form-control" value="<?php echo $offer['title']?>">
												 </div>
											</div>
												<div class="col-sm-6">
									<h5>Title<span class="text-danger">*</span></h5>
					<div class="controls">
<input type="text" name="name" class="form-control" value="<?php echo $offer['name']?>">
												 </div>
											</div>
								<div class="col-sm-6">
				<h5>Image<span class="text-danger">*</span></h5>
									<div class="controls">
									 <div class="form-group">
                        <?php if($offer['image_name']!=""){?>      
              <img src="gallery/<?php echo $offer['image_name']?>" height="100" width="100"/>
                <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="discount">Image only upload(403*407)</label>
                      <input type="file" class="form-control" name="image" id="image"/>
                    </div> 
								 </div>
									</div>
									<div class="col-sm-12">
												<h5>Content<span class="text-danger">*</span></h5>
												<div class="controls">
												<textarea class="form-control" name="text" id="elm1" rows="6" cols="30"><?php echo $offer['content']?></textarea>
													</div>
												</div>
										</div>
									</div>
										<div class="text-xs-right text-center">
											<button type="submit" class="btn btn-lg btn-info">Update About</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
				<?php include('footer.php'); ?>
				