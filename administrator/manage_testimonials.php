<?php 
include("header.php");
   $_HEADING = "Update Testimonial Profile";   
   $query = "SELECT * FROM bk_testimonial";
    $get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
   // $offer = mysqli_fetch_assoc($get_offer);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Testimonials
    </h1>
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><i class="fa fa-cog"></i> Testimonials Management</li>
        <li class="breadcrumb-item active">View Testimonials</li>
      </ol>
    </section>

          <div class="box">
           <?php if($_SESSION['slider']!=""){?>
           <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo $_SESSION['slider'];$_SESSION['slider']="";?>
                  </div>
       <?php } ?>
         <?php if($_SESSION['slider']!=""){?>
           <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo $_SESSION['slider'];$_SESSION['slider']="";?>
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
            <th>Mobile Number</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $i=1; while($row = mysqli_fetch_assoc($get_offer)){?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['mobile']?></td>
            <td><?php echo $row['content']?></td>
            <td><?php echo $row['status']?></td>
            <td>
               <ul class="actions">
                  <li> <a href="action/manage_testimonials.php?subview=delete&id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
                   <li>

               <?php
               if($row['status'] == 'active'){ 
             ?>  
                                <a href="action/manage_testimonials.php?subview=update1&id=<?php echo $row['id'];?>" ><i class="fa fa-close" aria-hidden="true"></i></a>
                           
          <?php   } else { ?>


                                <a href="action/manage_testimonials.php?subview=update2&id=<?php echo $row['id'];?>" ><i class="fa fa-check" aria-hidden="true"></i></a>
           
                           
              <?php } ?>
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
            <th>Mobile Number</th>
            <th>Message</th>
            <th>Status</th>
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
 