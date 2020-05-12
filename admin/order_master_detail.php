<?php 
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);

if (isset($_POST['update_order_status'])) {
  $update_order_status = $_POST['update_order_status'];
  mysqli_query($con, "update `order` set order_status = $update_order_status where id = $order_id");
}

?>

<div class="content pb-0">
  <div class="orders">
   <div class="row">
    <div class="col-xl-12">
     <div class="card">
      <div class="card-body">
       <div class="pull-left">
        <h4 class="box-title">Order Details </h4>
      </div>


    </div>
    <div class="card-body--">
     <div class="table-stats order-table ov-h">
      <table class="table">
        <thead>
          <tr>
            <th class="product-thumbnail">Product Name</th>
            <th class="product-thumbnail">Product Image</th>
            <th class="product-name">Quantity</th>
            <th class="product-price">Price</th>
            <th class="product-price">Total Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $res=mysqli_query($con,"select distinct(order_detail.id), order_detail.*,product.p_name,product.image from order_detail,product,`order` where order_detail.order_id = '$order_id' and order_detail.product_id = product.id ");
          $total_price = 0;
          while($row=mysqli_fetch_assoc($res)){
            $total_price=$total_price+($row['quantity']*$row['price']);
            ?>
            <tr>
              <td class="product-name"><?php echo $row['p_name']?></td>
              <td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
              <td class="product-name"><?php echo $row['quantity']?></td>
              <td class="product-name"><?php echo $row['price']?></td>
              <td class="product-name"><?php echo $row['quantity']*$row['price']?></td>

            </tr>
          <?php } ?>
          <tr>
            <td colspan="3"></td>
            <td class="product-name">Sub Total</td>
            <td class="product-name"><?php echo $total_price?></td>

          </tr>
        </tbody>



      </table>
      <div id="address_details">
        <?php 
        $res1 = mysqli_query($con,"select `order`.* , order_status.* from `order`,order_status where `order`.id = $order_id and `order`.order_status = order_status.id ");
        $row1 = mysqli_fetch_assoc($res1);
        ?>
        &nbsp;<strong>Address : </strong>
        <?php echo $row1['address'] ?>, <?php echo $row1['city'] ?>, <?php echo $row1['pincode'] ?> <br><br>
        &nbsp;<strong>Mobile : </strong>
        <?php echo $row1['mobile'] ?> <br><br>

        &nbsp;<strong>Order Status : </strong>
        <?php echo $row1['name'] ?>
        <div>
          &nbsp;<form method="post">
            <select class="form-control" name="update_order_status">
              <option>Select Status</option>
              <?php
              $res=mysqli_query($con,"select * from order_status order by name asc");
              while($row=mysqli_fetch_assoc($res)){
               echo "<option value=".$row['id'].">".$row['name']."</option>";
             }
             ?>
           </select>
           <input type="submit" class="form-control">
         </form>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
</div>

<?php 
require('footer.inc.php');
?>