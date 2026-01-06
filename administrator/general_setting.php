<?php 
include("header.php");
   $_HEADING = "Update General Setting";   
   $query = "SELECT * FROM bk_general_setting";
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
        <li class="breadcrumb-item active">General Setting</li>
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
           <!--  <?php 
print_r($_FILES);
echo $_POST['address'];
echo $_POST['email'];
echo $_POST['mob'];
?>
     -->          <form action="action/general_setting.php?subview=update&id=<?php echo $offer['id'];?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
           <div class="row">
            <div class="col-sm-6">
            <h5>Website Logo<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="file" name="image" class="form-control">
            </div>
            </div>
            <div class="col-sm-6">
            <h5>Current Logo<span class="text-danger">*</span></h5>
            <div class="controls">
              <div class="form-group">
                        <?php if($offer['image_name']!=""){?>      
              <img src="logo/<?php echo $offer['image_name']?>" height="100" width="100"/>
                <?php } ?>
                    </div>
                   
            </div>
            
           </div>
           
          </div>
        

        <!-- <form novalidate>
          <div class="form-group">
           <div class="row">
           <div class="col-sm-12">
            <h3>Change Password</h3>
           </div>
            <div class="col-sm-4">
            <h5>Current Password<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" class="form-control">
            </div>
            </div>
            
            <div class="col-sm-4">
            <h5>New Password<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" class="form-control">
            </div>
            </div>

            <div class="col-sm-4">
            <h5>Confirm Password<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" class="form-control">
            </div>
            </div>
           <div class="col-sm-12 mt20">
           <div class="text-xs-right text-center">
            <button type="submit" class="btn btn-lg btn-info">Change Password</button>
            </div>
            </div>
          </div>
        </form> -->
          <div class="form-group">
           <div class="row">
           <div class="col-sm-12">
           </div>
            <!-- <div class="col-sm-12">
            <h5>Map (<span style="color: red;">Write Google Map Source Code</span>)<span class="text-danger">*</span></h5>
            <div class="controls">
              <textarea rows="4" cols="20" class="form-control" name="map"><?php echo $offer['map']?></textarea>
            </div>
            </div> -->
            
            <div class="col-sm-12">
            <h5>Address<span class="text-danger">*</span></h5>
            <div class="controls">
              <textarea rows="4" cols="20" class="form-control" name="address"><?php echo $offer['address']?></textarea>
            </div>
            </div>
            <div class="col-sm-6">
            <h5>Email Address<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" class="form-control" name="email" value="<?php echo $offer['email']?>">
            </div>
            </div>
                          
                      <div class="col-sm-6">
            <h5>Phone Number<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" class="form-control" name="mob" value="<?php echo $offer['mob']?>">
            </div>
            </div>
            <div class="col-sm-6">
            <h5>Tel Number<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" class="form-control" name="tel" value="<?php echo $offer['tel']?>">
            </div>
            </div>
           <div class="col-sm-12 mt20">
           <div class="text-xs-right text-center">
            <button type="submit" class="btn btn-lg btn-info">Update </button>
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
  <script>
$(document).ready(function(){
    $("form").submit(function(){
        alert("Submitted");
    });
});
</script>
  <?php include('footer.php'); ?>

 