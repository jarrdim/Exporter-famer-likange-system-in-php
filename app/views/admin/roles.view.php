<?php $this->view('admin/header') ?>
<?php $this->view('admin/nav') ?>



<?php if($action == "add"): ?>
 <?php if(Auth::user_can('add_role')):?>
<div class="alert alert-success text-center mt-2">Add ROLE</div>
<form method="POST" class="mt-5">

  <div class="row gy-2">
    <div class="col-md-2 text-center">
      <a href="<?php echo ROOT?>/dashboard/roles" class="btn btn-secodary">back</a>
    </div>
    <div class="col-md-6 card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

      <div class="mb-3 mt-3">
        <input type="text" value="" name="role" class="form-control js-on " placeholder="Category name">
      </div>
      <?php if(!empty($errors)): ?>
      <div class="alert alert-danger"><?php echo esc($errors['role']);?></div>
        <?php endif; ?>
      <div class="mb-3">
        <select name="disabled" id="inputState" class="form-select ">
         
          <option value="0" selected="">no</option>
          <option value="1">yes</option>
        </select>
      </div>

    </div>

    <div class="col-md-2 text-center">
      <input type="submit" value="save" class="btn btn-secodary">
    </div>
  </div>
</form>
<?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>

<?php elseif($action == 'delete'): ?>
   <?php if(Auth::user_can('delete_role')):?>
  <div class="alert alert-danger mt-2 text-center">You sure want to delete this category<span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Warning</span></div>
  <form method="POST">
   

    <a href="<?php echo ROOT ?>/dashboard/products" class="btn btn-primary text-light">back</a>
     <button type="submit" class="btn btn-danger">delete</button>
  </form>
<?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>

<?php elseif($action == 'edit'): ?>
    <?php if(Auth::user_can('edit_role')):?>
<div class="alert alert-success text-center message mt-2">Edit ROLE</div>

<form method="POST" class="mt-5 js-form">
  <div class="row ">
    <div class="col-md-2">
   <a class="btn btn-secodary text-light" href="<?php echo ROOT?>/dashboard/roles">back</a>
    
    </div>
    <div class="col-md-8 card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
      <?php if(!empty($row)): ?>   

      
      <div class="mb-3 mt-3">       
        <input type="text" value="<?php echo check('role',$row->role)?>" name="role" class="form-control js-on " placeholder="Category name">   
      </div>
      <?php if(!empty($errors)): ?>
      <div class="alert alert-danger"><?php echo esc($errors['role']);?></div>
        <?php endif; ?>
      <div class="mb-3">
        <select name="disabled"   id="inputState" class="form-select ">
         
          <option  <?php echo selected($row->disabled,"0")?>  value="0" >no</option>
          <option  <?php echo selected($row->disabled,'1')?> value="1">yes</option>
        </select>
      </div>
      <?php endif;?>
    </div>
      <div class="col-md-2 text-center">
      <button type="submit"  class="btn btn-secodary">save</button>
    </div>
  

  </div>
</form>
<?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>

<?php else: ?>
<?php if(Auth::user_can('view_role')):?>
<form method="POST" class="card" style="box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;" >
  <div class="card-body ">
    <div class="card-title  d-flex">
      <div class="me-3">
        <a  class="btn btn-primary float-end  " href="<?php echo ROOT ?>/dashboard/roles/add">
        <i class="bi bi-plus fw-bold text-light"></i>
      </a>
      </div>

       <div class="fw-bold mt-2 ">roles</div>
       <button type="submit" class="btn btn-warning ms-auto">SAVE 1</button>

    </div>
    <!-- Table with stripped rows -->
    <div class="table-responsive">
      <table id="example" class="table table-striped">
        <thead>
          <tr class="text-start">
            <th scope="col">id</th>
            <th scope="col">Role</th>
            <th scope="col">permission</th>
            <th scope="col">Satus</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>


          <?php if(!empty($rows)): ?>
          <?php foreach($rows as $row):?>
          
          <tr class="text-start">
            <th scope="row"><?php echo $row->id ?? "" ?></th>
            <td><?php echo esc($row->role) ?? '' ?></td>

            <td scope="col" colspan="4">
            
              <?php $incm = 0 ?>
            <?php foreach(PERMISSIONS as $permission): ?>
              <?php 
              $incm ++ ;
              $row->permissions = $row->permissions ?? [];
              ?>
              
              <?php if(strtolower($row->role) == 'admin'): ?>
              <div class="col-md-6">
                <div class="form-check form-switch">
                  <input checked disabled  class="form-check-input" type="checkbox" id="<?php echo $incm?>flexSwitchCheckChecked<?php echo $row->id ?>" >
                  <label class="form-check-label" for="<?php echo $incm?>flexSwitchCheckChecked<?php echo $row->id ?>"><div>All permissions</div></label>
                </div>
              </div>
                <?php break; ?>
              <?php endif ?>
              <div class="col-md-6">
                <div class="form-check form-switch">
                 

                  <input  <?php echo (in_array($permission, $row->permissions)? 'checked': '') ?> value="<?php echo $permission ?>" name="<?php echo $row->id?>_<?php echo $incm ?>" class="form-check-input" type="checkbox" id="<?php echo $incm?>flexSwitchCheckChecked<?php echo $row->id ?>" >
                  <label class="form-check-label" for="<?php echo $incm?>flexSwitchCheckChecked<?php echo $row->id ?>"><div style="white-space:nowrap;"><?php echo esc(str_replace('_', ' ',$permission)) ?></div></label>
                </div>
              </div>
            <?php endforeach ?>  

            </td>

              <?php if($row->disabled == 0):?>
            <td scope="col"><span class="badge bg-warning text-dark">disabled</span></td>
            <?php else:?>
               <td scope="col"><span class="badge bg-info text-dark">active</span></td>
              <?php endif;?>
          
 
            <td>
              <a href="<?php echo ROOT?>/dashboard/roles/delete/<?php echo $row->id ?>"><i
                  class="bi bi-trash text-danger pe-3"></i></a>

              <a href="<?php echo ROOT?>/dashboard/roles/edit/<?php echo $row->id ?>"><i class="bi bi-pencil-square"></i></a>
            </td>
          </tr>
          <?php endforeach?>
          <?php endif?>



        </tbody>
      </table>
    </div>
    <!-- End Table  -->
  </div>

 </form>

 <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>

<?php endif ?>



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

<?php $this->view('admin/footer') ?>