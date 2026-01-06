<?php 
include("header.php");
//$_HEADING = "Update Book Order Profile";   
$query = "SELECT * FROM bk_book_package";
$get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
   // $offer = mysqli_fetch_assoc($get_offer);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Book Packages
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><i class="fa fa-cog"></i> Book Packages Management</li>
      <li class="breadcrumb-item active">View Book Packages</li>
    </ol>
  </section>

  <div class="box">
   <?php if($_SESSION['enquiry']!=""){?>
   <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['enquiry'];$_SESSION['enquiry']="";?>
  </div>
  <?php } ?>
  <?php if($_SESSION['enquiry']!=""){?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['enquiry'];$_SESSION['enquiry']="";?>
  </div>
  <?php } ?>
  <!-- /.box-header -->
  <div class="box-body">
   <div class="table-rs">
    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
      <thead>
        <tr>
          <th>Sr. No.</th>
          <th>Name</th>
          <th>Email ID</th>
          <th>Mobile Number</th>
          <th>Package</th>
          <th>Price</th>
          <th>Duration</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; while($row = mysqli_fetch_assoc($get_offer)){?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['email']?></td>
          <td><?php echo $row['mobile']?></td>
          <td><?php echo $row['package']?></td>
          <td><?php echo $row['price']?></td>
          <td><?php echo $row['duration']?></td>
          <td>
           <ul class="actions">
            <li> <a href="action/book_package.php?subview=delete&id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
            <li> 
            </li>
          </ul>
        </td>
      </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
       <th>Sr. No.</th>
          <th>Name</th>
          <th>Email ID</th>
          <th>Mobile Number</th>
          <th>Package</th>
          <th>Price</th>
          <th>Duration</th>
          <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>  
</div>
<!-- /.box-body -->
</div>

</div>
</div>
</div>
<?php include('footer.php'); ?>
