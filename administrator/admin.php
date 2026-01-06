<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-xl-3 col-md-6 col-12">
        <div class="info-box bg-blue">
          <span class="info-box-icon push-bottom"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Contact Enquiry</span>
            <?php 
            $result=mysqli_query($db->conn,"SELECT count(*) as total from bk_contact");
            $data=mysqli_fetch_assoc($result);

            ?>
            <span class="info-box-number"><?php echo $data['total']; ?></span>

            <div class="progress">
              <div class="progress-bar" style="width: 45%"></div>
            </div>
            <span class="progress-description">
              45% Increase
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-xl-3 col-md-6 col-12">
        <div class="info-box bg-green">
          <span class="info-box-icon push-bottom"><i class="ion ion-ios-eye-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Slider</span>
            <?php 
            $result=mysqli_query($db->conn,"SELECT count(*) as total from bk_slider");
            $data=mysqli_fetch_assoc($result);

            ?>
            <span class="info-box-number"><?php echo $data['total']; ?></span>

            <div class="progress">
              <div class="progress-bar" style="width: 40%"></div>
            </div>
            <span class="progress-description">
              40% Increase
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-xl-3 col-md-6 col-12">
        <div class="info-box bg-purple">
          <span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Testimonial </span>
            <?php 
            $result=mysqli_query($db->conn,"SELECT count(*) as total from bk_testimonial");
            $data=mysqli_fetch_assoc($result);

            ?>
            <span class="info-box-number"><?php echo $data['total']; ?></span>

            <div class="progress">
              <div class="progress-bar" style="width: 85%"></div>
            </div>
            <span class="progress-description">
              85% Increase
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-xl-3 col-md-6 col-12">
        <div class="info-box bg-red">
          <span class="info-box-icon push-bottom"><i class="fa fa-files-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Enquiry</span>
            <?php 
            $result=mysqli_query($db->conn,"SELECT count(*) as total from bk_contact");
            $data=mysqli_fetch_assoc($result);
            ?>
            <span class="info-box-number"><?php echo $data['total']; ?></span>
            <div class="progress">
              <div class="progress-bar" style="width: 50%"></div>
            </div>
            <span class="progress-description">
              50% Increase
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <?php 
     if($_REQUEST['subview']=="delete")
   {
       $table = "bk_contact";
     $id = $_REQUEST['id'];
     //print_r($_POST['id']);
      $sql2 = "SELECT * FROM bk_contact WHERE id='".$id."'";
    $get_images = mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
     if($db->delete_records($table,$id) == true)
      {
      $_SESSION['enquiry'] = "Record Deleted Successfully.";
      }
     else
        {
      $_SESSION['enquiry'] = "Record couldn't be Deletd. Please try again.";  
      }  
    echo "<script>window.location.href='admin.php'</script>";         
   } 
   ?>
    <!-- /.row -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Contact Enquiry</h3>
        <h6 class="box-subtitle"></h6>
      </div>
      <!-- /.box-header -->
      <?php if($_SESSION['enquiry']!=""){?>
           <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo $_SESSION['enquiry'];$_SESSION['enquiry']="";?>
                  </div>
       <?php } ?>
      <div class="box-body">
       <div class="table-rs">
        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
          <thead>
           <tr>
            <th>Sr. No</th>
            <th>User Name</th>
            <th>Email ID</th>
            <th>Mobile Number</th>
            <th>Message</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $query = "SELECT * FROM bk_contact where status = 'active' order by id DESC limit 0,20";
          $get_enqury =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
          $i=1; while($row = mysqli_fetch_assoc($get_enqury)){?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['mobile']?></td>
            <td><?php echo $row['message']?></td>
            <td>
              <ul class="actions">
                <li><a href="admin.php?subview=delete&id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
              </ul>
            </td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot>
         <tr>
          <th>Sr. No</th>
          <th>User Name</th>
          <th>Email ID</th>
          <th>Mobile Number</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
<!-- /.box-body -->
</div>
</section>
<!-- /.content -->
</div>
<?php include('footer.php'); ?>
