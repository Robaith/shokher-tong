<?php 
require('top.inc.php');
$categories_id = '';
$name = '';
$mrp = '';
$price = '';
$quantity = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$msg = '';
$image_required='required';
if (isset($_GET['id']) && $_GET['id'] != ''){
   $id = get_safe_value($con, $_GET['id']);
   $image_required='';
   $res = mysqli_query($con, "select * from product where id = '$id'");
   $check = mysqli_num_rows($res);
   if ($check>0) {
      $row = mysqli_fetch_assoc($res);
      $categories_id=$row['categories_id'];
      $name=$row['p_name'];
      $mrp=$row['mrp'];
      $price=$row['price'];
      $quantity=$row['quantity'];
      $short_desc=$row['short_desc'];
      $description=$row['description'];
      $meta_title=$row['meta_title'];
      $meta_desc=$row['meta_desc'];
      $meta_keyword=$row['meta_keyword'];
   }else{
      header('location:product.php');
      die();
   }
}

if(isset($_POST['submit'])){
   $categories_id=get_safe_value($con,$_POST['categories_id']);
   $name=get_safe_value($con,$_POST['name']);
   $mrp=get_safe_value($con,$_POST['mrp']);
   $price=get_safe_value($con,$_POST['price']);
   $quantity=get_safe_value($con,$_POST['quantity']);
   $short_desc=get_safe_value($con,$_POST['short_desc']);
   $description=get_safe_value($con,$_POST['description']);
   $meta_title=get_safe_value($con,$_POST['meta_title']);
   $meta_desc=get_safe_value($con,$_POST['meta_desc']);
   $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

   $res = mysqli_query($con,"select * from product where p_name = '$name'");
   $check = mysqli_num_rows($res);

   if ($check>0) {

      if (isset($_GET['id']) && $_GET['id'] != ''){
         $getdata = mysqli_fetch_assoc($res);
         $id = get_safe_value($con, $_GET['id']);

         if ($id == $getdata['id']) {
            
         }else{
            $msg = "product already exist";
         }
      }else{
         $msg = "product already exist";
      }
   }
   if ($msg == '') {
      if($_FILES['image']['name']!=''){
            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            $update_sql="update product set categories_id='$categories_id',p_name='$name',mrp='$mrp',price='$price',quantity='$quantity',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'";
         }else{
            $update_sql="update product set categories_id='$categories_id',p_name='$name',mrp='$mrp',price='$price',quantity='$quantity',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
         }
         mysqli_query($con,$update_sql);
         header('location:product.php');
         die();
            
      }
      
}
   

 ?>


<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Edit Product</strong><small></small></div>
                        <form method="post" enctype="multipart/form-data">
                     <div class="card-body card-block">
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Category</label>
                           <select class="form-control" name="categories_id">
                              <option>Select Category</option>
                              <?php 
                                 $res = mysqli_query($con, "select id,name from categories order by name desc");
                                 while ($row = mysqli_fetch_assoc($res)) {
                                   if ($row['id'] == $categories_id) {
                                      echo " <option selected value=".$row['id'].">".$row['name']."</option>";
                                   }
                                   else{
                                      echo " <option value=".$row['id'].">".$row['name']."</option>"; 
                                   }
                                 }
                               ?>
                           </select>
                           
                        </div>

                        <div class="form-group">
                           <label for="name" class=" form-control-label">Product Name</label>
                           <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name ?>">
                        </div>

                        <div class="form-group">
                           <label for="mrp" class=" form-control-label">MRP</label>
                           <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp ?>">
                        </div>

                        <div class="form-group">
                           <label for="price" class=" form-control-label">Price</label>
                           <input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price ?>">
                        </div>

                        <div class="form-group">
                           <label for="quantity" class=" form-control-label">Quantity</label>
                           <input type="text" name="quantity" placeholder="Enter product quantity" class="form-control" required value="<?php echo $quantity ?>">
                        </div>

                        <div class="form-group">
                           <label for="image" class=" form-control-label">Image</label>
                           <input type="file" name="image" class="form-control"<?php echo  $image_required?>>
                        </div>

                        <div class="form-group">
                           <label for="short_desc" class=" form-control-label">Short Description</label>
                           <textarea name="short_desc" placeholder="Enter short description" class="form-control" required><?php echo $short_desc ?></textarea>
                        </div>

                        <div class="form-group">
                           <label for="description" class=" form-control-label">Description</label>
                           <textarea name="description" placeholder="Enter description" class="form-control"><?php echo $description ?></textarea>
                        </div>

                        <div class="form-group">
                           <label for="meta_title" class=" form-control-label">Meta Title</label>
                           <textarea name="meta_title" placeholder="Enter meta title" class="form-control"><?php echo $meta_title ?></textarea>
                        </div>

                        <div class="form-group">
                           <label for="meta_desc" class=" form-control-label">Meta description</label>
                           <textarea name="meta_desc" placeholder="Enter Meta description" class="form-control"><?php echo $meta_desc ?></textarea>
                        </div>

                        <div class="form-group">
                           <label for="meta_keyword" class=" form-control-label">Meta Keyword</label>
                           <textarea name="meta_keyword" placeholder="Enter Meta Keyword" class="form-control"><?php echo $meta_keyword ?></textarea>
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