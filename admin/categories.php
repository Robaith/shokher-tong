<?php 
   require('top.inc.php');

   if (isset($_GET['type']) && $_GET['type'] != '')
   {
      $type = get_safe_value($con, $_GET['type']);
      if ($type == 'status')
      {
         $operation = get_safe_value($con, $_GET['operation']);
         $id = get_safe_value($con, $_GET['id']);
         if ($operation == 'active') {
            $status = '1';
         }else{
            $status = '0';
         }
         $update_status = "update categories set status='$status' where id='$id'";
         mysqli_query($con, $update_status);
      }
      if ($type == 'delete')
      {
         $id = get_safe_value($con, $_GET['id']);
         $delete_sql = "delete from categories where id='$id'";
         mysqli_query($con, $delete_sql);
      }
   }

   $sql = "select * from categories order by name asc";
   $res = mysqli_query($con,$sql);
 ?>

<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="pull-left">
                           <h4 class="box-title">Categories </h4>
                           </div>
                           <div class="pull-right">
                              <button style="background: #17a2b8; border-color: #17a2b8"><a href="add_categories.php" style="color: white">Add New Category</a></button>
                           </div>
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">S No</th>                                       
                                       <th>ID</th>
                                       <th>Category</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       $i = 1;
                                       while ($row = mysqli_fetch_assoc($res)){ ?>
                                          <tr>
                                             <td class="serial"><?php echo $i ?></td>
                                             <td><?php echo $row['id'] ?></td>
                                             <td><?php echo $row['name'] ?></td>
                                             <td>
                                                <?php 
                                                   if ($row['status'] == 1){
                                                      echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                                   }
                                                   else{
                                                      echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                                   }
                                                   echo "&nbsp;<span class='badge badge-edit'><a href='edit_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";

                                                   echo "&nbsp;<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                                                ?>
                                             </td>    
                                          </tr>  
                                          

                                       <?php } ?>
                                     
                                 </tbody>
                              </table>
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