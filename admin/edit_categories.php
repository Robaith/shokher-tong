<?php 
require('top.inc.php');
$categories = '';
$msg = '';

if (isset($_GET['id']) && $_GET['id'] != ''){
   $id = get_safe_value($con, $_GET['id']);
   $res = mysqli_query($con, "select * from categories where id = '$id'");
   $check = mysqli_num_rows($res);
   if ($check>0) {
      $row = mysqli_fetch_assoc($res);
      $categories = $row['name'];
   }else{
      header('location:categories.php');
      die();
   }
}

if(isset($_POST['submit'])){
   $categories=get_safe_value($con,$_POST['categories']);
   $res = mysqli_query($con,"select * from categories where name = '$categories'");
   $check = mysqli_num_rows($res);

   if ($check>0) {

      if (isset($_GET['id']) && $_GET['id'] != ''){
         $getdata = mysqli_fetch_assoc($res);
         $id = get_safe_value($con, $_GET['id']);

         if ($id == $getdata['id']) {
            
         }else{
            $msg = "Category already exist";
         }
      }else{
         $msg = "Category already exist";
      }
   }
   if ($msg == '') {
      mysqli_query($con,"update categories set name = '$categories' where id = '$id'");
      header('location:categories.php');
      die();
   }
   
}
 ?>


<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Edit Category</strong><small></small></div>
                        <form method="post">
                     <div class="card-body card-block">
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Category Name</label>
                           <input type="text" name="categories" placeholder="Enter category name" class="form-control" required value="<?php echo $categories ?>">
                        </div>
                        <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="payment-button-amount">Update</span>
                        </button>
                        <div class="field_error"><?php echo $msg?></div>
                     </div>
                  </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php 
   require('footer.inc.php');
 ?>