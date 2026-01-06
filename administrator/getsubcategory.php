<?php
include("connection.php");
//echo $_POST['category']; exit();
if($_POST['category'])
{ 
	$cat=$_POST['category'];
     $query = "SELECT * FROM bk_sub_category WHERE status='active' and cat_id='".$cat."'";
               $get_cat=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
   if(mysqli_num_rows($get_cat)){ ?>
                 <option value="">Select Sub Category</option>
                 <?php while( $cat = mysqli_fetch_assoc($get_cat)){
                  ?>
                  <option value="<?php echo $cat['id']?>"><?php echo $cat['title']?></option>
                  <?php }
                } else {?>
                <option value="">No Category Added Yet</option>
                <?php }
}
?>