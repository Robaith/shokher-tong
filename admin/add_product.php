<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$quantity='';
$image='';
$short_desc ='';
$description   ='';
$meta_title ='';
$meta_description ='';
$meta_keyword='';

$msg='';


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
   
   $res=mysqli_query($con,"select * from product where name='$p_name'");
   $check=mysqli_num_rows($res);
   if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']){
         
         }else{
            $msg="Product already exist";
         }
      }else{
         $msg="Product already exist";
      }
   }
   
   if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
      $msg="Please select only png,jpg and jpeg image formate";
   }
   
   if($msg==''){
         $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
         move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
         mysqli_query($con,"insert into product(categories_id,p_name,mrp,price,quantity,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$quantity','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
      
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
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                     <div class="card-body card-block">
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Categories</label>
                           <select class="form-control" name="categories_id">
                              <option>Select Category</option>
                              <?php
                              $res=mysqli_query($con,"select id,name from categories order by name asc");
                              while($row=mysqli_fetch_assoc($res)){
                                 if($row['id']==$categories_id){
                                    echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                 }else{
                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                                 }
                                 
                              }
                              ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Product Name</label>
                           <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">MRP</label>
                           <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Price</label>
                           <input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Quantity</label>
                           <input type="text" name="quantity" placeholder="Enter quantity" class="form-control" required value="<?php echo $quantity?>">
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Image</label>
                           <input type="file" name="image" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Short Description</label>
                           <textarea name="short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc?></textarea>
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Description</label>
                           <textarea name="description" placeholder="Enter product description" class="form-control" ><?php echo $description?></textarea>
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Meta Title</label>
                           <textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Meta Description</label>
                           <textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_description?></textarea>
                        </div>
                        
                        <div class="form-group">
                           <label for="categories" class=" form-control-label">Meta Keyword</label>
                           <textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
                        </div>
                        
                        
                        <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="payment-button-amount">Submit</span>
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