
  <?php $this->view('admin/header') ?>
  <?php $this->view('admin/nav') ?>



<style>
    .order-details {
        color: #6e93ce;
        background-color: #eee;
        width: 100%;
        position: absolute;
        left: 0px;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        z-index: 200 !important;

    }

    .hide {
        display: none;
    }
</style>
  <!--ADD-->

  <?php if($action == "add"):?>
    <?php if(Auth::user_can('add_order')):?>

      <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>
    <!--EDIT-->
  <?php elseif($action == "edit"):?>
       <?php if(Auth::user_can('edit_order')):?>
      
      <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>
    <!--DELETE-->
  <?php elseif($action == "delete"):?>
    
  <?php if(Auth::user_can('delete_order')):?>
      
  


  
  <div class="alert alert-danger mt-2 text-center ">You sure want to delete this user<span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Warning</span></div>
  <form method="POST">
  
    <a href="<?php echo ROOT?>/dashboard/users" class="btn btn-primary text-light">back</a>
     <button type="submit" class="btn btn-danger">delete</button>
  </form>




    
    <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>
  <?php else:?>
    <?php if(Auth::user_can('view_order')):?>

    
<div class="card">
  
            <div class="card-body ">
              <h5 class="card-title fw-bold">

            Notifications Orders
              </h5>
             
              <!-- Table with stripped rows -->
              <div class="table-responsive ">
                <table id="example" class="table table-striped  ">
                  <thead>
                    <tr class="text-center">
                        <th>Order no:</th>
                        <th>Exporter </th>
                        <th>Order Date</th>
                       <th>Email</th>
                        <th>Phone</th>
                      
                     
                    </tr>
                  </thead>
                      
                  <tbody >

              
                    <?php if(is_array($orders)):?>
             
                        <?php foreach($orders as $order): ?>

                          
                       
                    <tr class="text-start  ">
                        <td><?php echo $order->order_id?></td>
                      
                        <td><a href="<?php echo  ROOT?>/profile/<?php echo  $order->username ?? 'empty'?>"><?php echo esc($order->username)?? "" ?></a></td>
                        <td><?php echo date("jS m Y h:i a",strtotime($order->date))?></td>
                        <td><?php echo esc($order->email)?></td>
                        <td><?php echo $order->phone?></td>
                       
                      
                    </tr>
                    <?php endforeach ?>
                    <?php endif;?>

                  
                
                     </tbody>
                </table>
              </div>
              <!-- End Table  -->
            </div>
          </div>
      <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>

<?php endif?>
<!--
<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src=" https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
                        -->
  <script src="<?php echo ROOT?>/assets/js/jquery-3.5.1.js"></script>
  <script src="<?php echo ROOT?>/assets/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo ROOT?>/assets/js/dataTables.bootstrap5.min.js"></script>


       <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

<script>

        function show(e) {
        var row = e.target.parentNode;

        if (row.tagName != "TR") {
            row = row.parentNode;
        }
        var details = row.querySelector(".js-details");
        var all = e.currentTarget.querySelectorAll('.js-details');
        for (let i = 0; i < all.length; i++) {
            if (all[i] != details) {
                all[i].classList.add("hide");
            }


        }
        if (details.classList.contains('hide')) {
            details.classList.remove("hide");
        } else {
            details.classList.add("hide");
        }

    }
</script>

<?php $this->view('admin/footer') ?>