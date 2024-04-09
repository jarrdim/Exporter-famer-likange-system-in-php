<?php $this->view('admin/header') ?>
<?php $this->view('admin/nav') ?>



<?php if($action == "add"): ?>
<?php if(Auth::user_can('add_category')):?>
<div class="alert alert-success text-center mt-2">Add new category</div>
<form method="POST" class="mt-5">

  <div class="row gy-2">
    <div class="col-md-2 text-center">
      <a href="<?php echo ROOT?>/dashboard/categories" class="btn btn-secodary">back</a>
    </div>
    <div class="col-md-6 card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

      <div class="mb-3 mt-3">
        <input type="text" value="" name="category_name" class="form-control js-on " placeholder="Category name">
      </div>
      <?php if(!empty($errors)): ?>
      <div class="alert alert-danger"><?php echo esc($errors['category_name']);?></div>
        <?php endif; ?>
      <div class="mb-3">
        <select name="active" id="inputState" class="form-select ">
         
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
  <?php if(Auth::user_can('delete_category')):?>
  <div class="alert alert-danger mt-2 text-center">You sure want to delete this category<span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Warning</span></div>
  <form method="POST">
   

  
     <button type="submit" class="btn btn-danger">delete</button>
  </form>
  <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>

<?php elseif($action == 'edit'): ?>
   <?php if(Auth::user_can('edit_category')):?>
<div class="alert alert-success text-center message mt-2">Edit County</div>
<form  class="mt-5 js-form">
  <div class="row ">
    <div class="col-md-2">
   <a class="btn btn-secodary text-light" href="<?php echo ROOT?>/dashboard/categories">back</a>
    
    </div>
    <div class="col-md-8 card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
      <?php if(!empty($row)): ?>   
      <div class="mb-3 mt-3">       
        <input type="text" value="<?php echo check('category_name',$row->category_name)?>" name="category_name" class="form-control js-on " placeholder="Category name">   
      </div>
      <?php if(!empty($errors)): ?>
      <div class="alert alert-danger"><?php echo esc($errors['category_name']);?></div>
        <?php endif; ?>
      <div class="mb-3">
        <select name="active"   id="inputState" class="form-select ">
         
         
          <option  <?php echo selected($row->active,"0")?>  value="0" >no</option>
          <option  <?php echo selected($row->active,'1')?> value="1">yes</option>
        </select>
      </div>
      <?php endif;?>
    </div>
      <div class="col-md-2 text-center">
      <button type="button" onclick="save_data()" class="btn btn-secodary">save</button>
    </div>
  

  </div>
</form>
 <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>

<?php else: ?>
<?php if(Auth::user_can('view_category')):?>
<div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" >
  <div class="card-body ">
    <div class="card-title  d-flex">
      <div class="me-3">
        <a  class="btn btn-primary float-end  " href="<?php echo ROOT ?>/dashboard/categories/add">
        <i class="bi bi-plus fw-bold text-light"></i>
      </a>
      </div>
       <div class="fw-bold mt-2 ">COUNTIES</div>

    </div>
    <!-- Table with stripped rows -->
    <div class="table-responsive">
      <table id="example" class="table table-striped">
        <thead>
          <tr class="text-start">
            <th scope="col">id</th>
            <th scope="col">COUNTY NAME</th>
            <th scope="col">ACTIVE</th>
            <th scope="col">Date</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>

          <?php if(!empty($categories)): ?>
          <?php foreach($categories as $row):?>
          <tr class="text-start">
            <th scope="row"><?php echo $row->id ?? "" ?></th>
            <td><?php echo esc($row->category_name) ?? '' ?></td>
            <?php if($row->active == '1'): ?>
            <td><?php echo '<span class="badge bg-success">active</span>' ??'' ?></td>
            <?php else: ?>
              <td><?php echo '<span class="badge bg-danger">disabled</span>' ??'' ?></td>
              <?php endif ;?>
            <td><?php echo esc($row->date) ?? "" ?></td>
            <td><?php echo esc($row->slug) ?? "" ?></td>

            <td>
              <a href="<?php echo ROOT?>/dashboard/categories/delete/<?php echo $row->id ?>"><i
                  class="bi bi-trash text-danger pe-3"></i></a>

              <a href="<?php echo ROOT?>/dashboard/categories/edit/<?php echo $row->id ?>"><i class="bi bi-pencil-square"></i></a>
            </td>
          </tr>
          <?php endforeach?>
          <?php endif?>



        </tbody>
      </table>
    </div>
    <!-- End Table  -->
  </div>

</div>
<?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
  <?php endif?>
<?php endif ?>

<script>
  function save_data()
  { 
    var obj = {};
    var input = document.querySelector(".js-form");
    inputs = input.querySelectorAll('input, select');
    inputs.forEach(element => {
      var key = element.name;
      var value = element.value;
      obj[key] =value;
     
    });

   
     send_data(obj);
  }
  function send_data(obj)
  {
 

  var xml = new XMLHttpRequest();
        var form = new FormData();
        for (key in obj) {
            form.append(key, obj[key]);
        }
   
        xml.addEventListener('readystatechange', function () {

            if (xml.readyState == 4) {
                if (xml.status == 200) {
                    handle_result(xml.responseText)
                    //console.log(xml.responseText)
                    //window.location.reload();
                }

            }
        });
  xml.open('POST','',true);
  xml.send(form);
  }
  function handle_result(result)
  {

    var message = document.querySelector(".message");
    const obj = JSON.parse(result);
    if(typeof obj == "object")
    {
      var str = result;
      if(str.includes("message"))
      {
        message.style.color = "#41cf2e";
        message.innerHTML = obj.message;

      }
      else
      {
        message.style.color = "red";
       message.innerHTML = obj.errors.category_name;
      }
      
      
    }
  }

</script>
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