<?php 
include("header.php");
$query = "SELECT id,title FROM bk_menu_category WHERE status='active'";
$get_cat=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
if($_REQUEST['subview']=="add")
 $_HEADING = "Add New Menu";
else if($_REQUEST['subview']=="update")
{
 $_HEADING = "Update Menu";   
 $query = "SELECT * FROM bk_menu_detail WHERE id='".$_REQUEST['id']."'";
 $get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
 $offer = mysqli_fetch_assoc($get_offer);
}
else if($_REQUEST['subview']=="list")
{
 $_HEADING = "View All Menu";
 $rowsperpage = 2000000;
 if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
   $sql1 = "SELECT * FROM bk_menu_detail ORDER BY id DESC ";
 elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
   $sql1 = "SELECT * FROM bk_menu_detail WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC";
 $db1 = $db->conn;
   $website = $_SERVER['PHP_SELF']."?subview=list"; // other arguments if need it.
   $pagination = new CSSPagination($db1, $sql1, $rowsperpage, $website); // create instance object
   $pagination->setPage($_GET['page']);
   if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
     $sql2 = "SELECT * FROM bk_menu_detail ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
   elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
    $sql2 = "SELECT * FROM bk_menu_detail WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
  $result =  mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
  $num_data = mysqli_num_rows($result);
} 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Menu Details
   </h1>
   <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="#"><i class="fa fa-files-o"></i> Menu Details Management</a></li>
    <li class="breadcrumb-item active">Edit Menu</li>
  </ol>
  <?php if($_SESSION['menu']!=""){ ?>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['menu'];$_SESSION['menu']="";?>
  </div>
  <?php } ?>
  <?php if($_SESSION['menu']!="") { ?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['menu'];$_SESSION['menu']="";?>
  </div>
  <?php } ?>
</section>
<br>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Report Data</h3>
    <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
    <button class="btn btn-primary pull-right" data-target="#add_gal" data-toggle="modal">Add New Menu</button>
  </div>
  <!-- /.box-header -->
  <?php if($_REQUEST['subview']=="list") {?>
  <div class="box-body">
   <div class="table-rs">
    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
      <thead>
       <tr>
        <th>Sr. No.</th>
        <th>Category</th>
        <th>Title</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php $i=1; while($row = mysqli_fetch_assoc($result)){?>
     <tr>
      <td><?php echo $i; ?></td>
      <?php 
      $query = "SELECT id,title FROM bk_menu_category WHERE status='active' and id='".$row['cat_id']."'";
      $get_cat=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
      $cat = mysqli_fetch_assoc($get_cat);?>
      <td><?php echo $cat['title'] ?></td>
      <td><?php echo $row['title'] ?></td>
      <td><img src="gallery/<?php echo $row['image_name']; ?>" height="50" width="50"></td>
      <td>
        <ul class="actions">
          <li><a href="?subview=update&id=<?php echo $row['id'];?>" data-target="#<?php echo $row['id'];?>" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></li>
          <li><a href="action/menu_detail.php?subview=delete&id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
        </ul>
      </td>
    </tr>
    <div id="<?php echo $row['id'];?>" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Menu</h4>
          </div>
          <form action="action/menu_detail.php?subview=update&id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
           <div class="form-group">
             <div class="row">
              <div class="col-sm-12">
                <h5>Category<span class="text-danger">*</span></h5>
                <div class="controls">
                  <?php  $query = "SELECT id,title FROM bk_menu_category WHERE status='active'";
                  $get_cat=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted"); 
                  ?>
                  <select name="category" id="category" class="form-control" onchange="get_sub_cat1();">
                   <?php if(mysqli_num_rows($get_cat)){?>
                   <option value="">Select Category Name</option>
                   <?php while( $cat = mysqli_fetch_assoc($get_cat)){?>
                   <option value="<?php echo $cat['id']?>" <?php if($cat['id']==$row['cat_id']) echo 'selected="selected"'?>><?php echo $cat['title']?></option>
                   <?php }
                 } else {?>
                 <option value="">No Category Added Yet</option>
                 <?php }?>
               </select>  
             </div>
           </div>
           <div class="col-sm-12">
            <h5>Title<span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="title" class="form-control" value="<?php echo $row['title']?>"> </div>
            </div>
            <div class="col-sm-12">
                  <h5>Featured Image<span class="text-danger">*</span></h5>
                  <div class="controls">
                   <div class="form-group">
                        <?php if($row['image_name']!=""){?>      
              <img src="gallery/<?php echo $row['image_name']?>" height="100" width="100"/>
                <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="discount">Image only upload(255*155)</label>
                      <input type="file" class="form-control" name="image" id="image"/>
                    </div> 
                 </div>
                  </div>
      <div class="col-sm-12">
            <h5>Content<span class="text-danger">*</span></h5>
            <div class="controls">
              <textarea rows="4" name="text" class="form-control"><?php echo $row['content']?></textarea>
              <input type="hidden" name="added_image" value="<?php echo $offer['image_name']?>">
            </div>
      </div> 
  </div>
  <div class="modal-footer">
   <button type="submit" class="btn btn-primary">Update</button>
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 </div>
 </form>
</div>
</div>
</div>
<?php $i++;} ?>
<input type="hidden" id="id" value="<?php echo $i-1;?>" />
</tbody>
<tfoot>
 <tr>
  <th>Sr. No.</th>
  <th>Category</th>
  <th>Title</th>
  <th>Image</th>
  <th>Action</th>
</tr>
</tfoot>
</table>
</div>
</div>
<?php } ?>
<!-- /.box-body -->
</div>
</div>
<div id="add_gal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New</h4>
      </div>
      <form action="action/menu_detail.php?subview=add" method="post" enctype="multipart/form-data">
        <div class="modal-body">
         <div class="form-group">
           <div class="row">
            <div class="col-sm-12">
              <h5>Category<span class="text-danger">*</span></h5>
              <div class="controls">
               <?php  $query = "SELECT id,title FROM bk_menu_category WHERE status='active'";
               $get_cat=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted"); 
               ?>
               <select name="category" id="category" class="form-control" onchange="get_sub_cat1();">
                 <?php if(mysqli_num_rows($get_cat)){?>
                 <option value="">Select Category Name</option>
                 <?php while( $cat = mysqli_fetch_assoc($get_cat)){
                  ?>
                  <option value="<?php echo $cat['id']?>" <?php if($cat['id']==$offer['cat_id']) echo 'selected="selected"'?>><?php echo $cat['title']?></option>
                  <?php }
                } else {?>
                <option value="">No Category Added Yet</option>
                <?php }?>
              </select>  
            </div>
          </div>
           <div class="col-sm-12">
            <h5>Title<span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="title" class="form-control" required=""> </div>
            </div>
            <div class="col-sm-12">
                  <h5>Featured Image<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <div class="form-group">
                      <label for="discount">Image only upload(255*185)</label>
                      <input type="file" class="form-control" name="image" id="image"/>
                    </div> 
                 </div>
                  </div>
          <div class="col-sm-12">
        <h5>Content<span class="text-danger">*</span></h5>
            <div class="controls">
            <textarea rows="4" name="text" class="form-control"></textarea>
        </div>
      </div>        
    </div>         
  </div>
</div>
<div class="modal-footer">
 <button type="submit" name="cat" id="cat" class="btn btn-primary">Add</button>
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<?php include('footer.php'); ?>
