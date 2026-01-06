<?php 
include("header.php");
   $_HEADING = "Update Social Media Profile";   
   $query = "SELECT * FROM bk_social_media";
    $get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
    $offer = mysqli_fetch_assoc($get_offer);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Website Setting
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><i class="fa fa-files-o"></i> Website Setting
        <li class="breadcrumb-item active">Social Media Setting</li>
      </ol>
    </section>
<br>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
            <?php if($_SESSION['social']!=""){?>
           <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo $_SESSION['social'];$_SESSION['social']="";?>
                  </div>
       <?php } ?>
         <?php if($_SESSION['social']!=""){?>
           <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo $_SESSION['social'];$_SESSION['social']="";?>
                  </div>
       <?php } ?>
             <div class="row">
            <div class="col">
            	<form action="action/social_media.php?subview=update&id=<?php echo $offer['id'];?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
					 <div class="row">
					 	<div class="col-sm-12">
					 		<h4>Example : www.facebook.com/<span style="color:red;">yourusername</span></h4>
					 	</div>
						<div class="col-sm-6">
						<h5>Facebook Username<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="text" name="facebook" class="form-control" value="<?php echo $offer['facebook']?>">
						</div>
						</div>
            <div class="col-sm-6">
            <h5>Twitter Username<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="twitter" class="form-control" value="<?php echo $offer['twitter']?>">
            </div>
            </div>
            <div class="col-sm-6">
            <h5>Youtube Username<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="youtube" class="form-control" value="<?php echo $offer['youtube']?>">
            </div>
            </div>
						<div class="col-sm-6">
            <h5>Google Plus Username<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="ggle" class="form-control" value="<?php echo $offer['ggle']?>">
            </div>
						</div>
            <div class="col-sm-6">
              <h5>Rss Username<span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="rss" class="form-control" value="<?php echo $offer['rss']?>">
            </div>
            </div>
            <div class="col-sm-6">
              <h5>whatsapp Username<span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="whatsapp" class="form-control" value="<?php echo $offer['whatsapp']?>">
            </div>
            </div>
					 <div class="col-sm-12 mt20">
					 <div class="text-xs-right text-center">
						<button type="submit" class="btn btn-lg btn-info">Update Socials</button>
					  </div>
					  </div>
					</div>
				</form>
						</div>
					</div>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
</div>
  <?php include('footer.php'); ?>
 