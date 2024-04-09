  <?php $this->view('admin/header') ?>
  <?php $this->view('admin/nav') ?>
 
  <?php if($action == 'add'):?>
    <?php if(Auth::user_can('add_product')):?>
  <span><?php echo esc(strtolower(( URL()))) ?? ""?></span>
  <div class="text-end mb-2">
    <div class="btn btn-warning me-3 "><a class="text-light" href="<?php echo ROOT ?>/dashboard/products">back</a></div>

  </div>

  <form method="post" onsubmit=validate(event,this) enctype="multipart/form-data" class="card " style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px; border-radius:1rem !important;">
    <div class="row">
      <div class="text-center mt-2">
        <div class="fs-bold h5  text-muted">Upload  New Product</div>
      </div>
      <div class="col-md-6">

        <div class="card-body mt-3">


          <label for="review">
            <div style="height:max-100px; max-width:100px; margin-bottom:1rem;">
              <img class="img-review" src="" alt="" style="object-fit:cover; width:100px;" class="img-fluid">
            </div>
            <input onchange="display(this.files[0])" oninput="save_changes()" id="review"
              style="display:none !important;" type="file" name="image">
            <div class="mb-2 btn btn-primary">
              <i class="bi bi-upload  "></i>

            </div>
            <span class="img-name"></span>
          </label>
          <div class="mb-3">
            <?php if(!empty($categories)): ?>
            <?php ?>
            <select name="category_id" id="inputState" oninput="save_changes()" class="form-select">

              <option value="" selected="">Choose County...</option>
              <?php foreach ($categories as $category):?>
              <option value="<?php echo esc($category->id) ?>"><?php echo esc($category->category_name) ?? ''?></option>
              <?php endforeach ?>
            </select>
            <?php endif ?>
          </div>
          <div class="mb-3">
            <input type="text" value="<?php echo esc(check('product_name')) ?? '' ?>" name="product_name"
              class="form-control js-on" oninput="save_changes()" placeholder="Product name">
          </div>
          <div class="mb-3">
            <input type="text" value="<?php echo esc(check('phone')) ?? '' ?>" name="phone" class="form-control js-on"
              oninput="save_changes()" placeholder="Phone">
          </div>
          <div class="mb-3">
            <input type="text" name="quantity" class="form-control " oninput="save_changes()"
              placeholder="Product quantity">
          </div>
        </div>


      </div>
      <div class="col-md-6">
        <div>
          <div class="card-body mt-3">

            <div class="form-floating mb-3">
              <textarea value="     Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt vel excepturi, quisquam rerum quod
                        molestias itaque explicabo, optio repellendus esse molestiae officia dicta tempora facere quasi, unde
                        expedita dolores voluptate!" oninput="save_changes()" name="description" class="form-control"
                placeholder="Address" id="floatingTextarea" style="height: 100px;">

                    </textarea>
              <label for="floatingTextarea">product description and contact details</label>
            </div>


            <!-- <div class="form-floating">
              <textarea value="     Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt vel excepturi, quisquam rerum quod
                        molestias itaque explicabo, optio repellendus esse molestiae officia dicta tempora facere quasi, unde
                        expedita dolores voluptate!" oninput="save_changes()" name="features" class="form-control"
                placeholder="Address" id="floatingTextarea" style="height: 100px;">

                    </textarea>
              <label for="floatingTextarea">product features</label>
            </div> -->
            <button type="submit" class="btn save mt-3">save</button>
          </div>

        </div>
      </div>

    </div>
  </form>
 <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>
  <!--EDIT SECTION-->
  <?php elseif($action == 'edit'):?>
    <?php if(Auth::user_can('edit_product')):?>
  <span><?php echo esc(strtolower(( URL()))) ?? ""?></span>

  
  <div class="text-end mb-2">
    <div class="btn btn-warning me-3 "><a class="text-light" href="<?php echo ROOT ?>/dashboard/products">back</a></div>
     <div onclick = "save_data()" class="btn save disabled btn-dark ">save</div>
  </div>
  <?php if(!empty($product)):?>
  <form method="post" onsubmit=validate(event,this) enctype="multipart/form-data" class="card edit-js " style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px; border-radius:1rem !important;">
    <div class="row">
      <div class="text-center mt-2">
        <div class="fw-bold h5   message">PRODUCT EDIT SECTION</div>
      </div>
      <div class="col-md-6">
        <div class="card-body mt-3">
          <label for="review">
            <div style="height:max-100px; max-width:100px; margin-bottom:1rem;">
              <img class="img-review" src="<?php echo ROOT ?>/<?php echo esc($product->image)?>" alt="" style="object-fit:cover; width:100px;" class="img-fluid">
            </div>
            <input class="image" value="" onchange="display(this.files[0])" oninput="save_changes()" id="review"
              style="display:none !important;" type="file" name="image">
            <div class="mb-2 btn btn-primary">
              <i class="bi bi-upload  "></i>

            </div>
            <span class="img-name"></span>
          </label>
          <div class="mb-3">
          
            <?php if(!empty($categories) || true): ?>
            <?php ?>
            <select name="category_id" id="inputState" oninput="save_changes()" class="form-select select">

              <option value="" selected="">Choose category...</option>
              <?php foreach ($categories as $category):?>

              <option  <?php echo set_select('category_id', $category->id, $product->category_id)?>  value="<?php echo esc($category->id) ?>"><?php echo esc($category->category_name) ?? ''?></option>
              <?php endforeach ?>
            </select>
            <?php endif ?>
          </div>
          <div class="mb-3">
            <input type="text" value="<?php echo esc(check('product_name',esc($product->product_name))) ?? '' ?>" name="product_name"
              class="form-control js-on" oninput="save_changes()" placeholder="Product name">
          </div>
          <?php if(!empty($errors['product_name'])): ?>
            <div class="text-danger"><?php echo esc($errors['product_name'])?></div>
            <?php endif;?>
            <div class="js-product text-danger"></div>
          <div class="mb-3">
            <input type="text" value="<?php echo esc(check('phone',esc($product->phone))) ?? '' ?>" name="phone" class="form-control js-on"
              oninput="save_changes()" placeholder="Product phone">
          </div>
          <?php if(!empty($errors['phone'])): ?>
            <div class="text-danger"><?php echo esc($errors['phone'])?></div>
            <?php endif;?>
            <div class="js-phone text-danger"></div>
          <div class="mb-3">
            <input type="text" name="quantity" value="<?php echo esc(check('quantity',$product->quantity)) ?? ""?>" class="form-control js-on " oninput="save_changes()"
              placeholder="Product quantity">
          </div>
          <?php if(!empty($errors['quantity'])): ?>
            <div class="text-danger"><?php echo esc($errors['quantity'])?></div>
            <?php endif;?>
            <div class="js-quantity text-danger"></div>
        </div>
       

      </div>
      <div class="col-md-6">
        <div>
          <div class="card-body mt-3">

            <div class="form-floating mb-3">
              <textarea value="" oninput="save_changes()" name="description" class="form-control"
                placeholder="Address" id="floatingTextarea" style="height: 100px;">
                <?php echo esc(check('description', $product->description)) ?? ""?>
                    </textarea>
              <label for="floatingTextarea">product description and contact details</label>
            </div>
            <?php if(!empty($errors['description'])): ?>
            <div class="text-danger mb-1"><?php echo esc($errors['description'])?></div>
            <?php endif;?>
              <div class="js-description text-danger"></div>

        
          </div>

        </div>
      </div>

    </div>
  </form>
  <?php endif; ?>
   <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>
<!--END-->

<!--DELETE SECTION--->
  <?php elseif($action == 'delete'):?>
     <?php if(Auth::user_can('delete_product')):?>
  <div><?php echo esc(strtoupper(( URL())))?></div>
<div class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
                You sure want to delete the product

                <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Warning</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <form method="POST">
    <button type="submit" class="btn btn-danger">delete</button>

    <a href="<?php echo ROOT ?>/dashboard/products" class="btn btn-primary text-light">back</a>
  </form>
  <?php else:?>
  <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
 <?php endif?>
  <?php else:?>
     <?php if(Auth::user_can('view_product')):?>
    <div class="card" draggable="true" >
  <div class="card-body">
    <nav>
      <ol class="breadcrumb text-secondary">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item active">Username</li>
      </ol>
    </nav>

    <a class="btn mb-3 text-light" href="<?php echo ROOT ?>/dashboard/products/add">Add Product</a>
<?php if(!empty($rows)): ?>
    <div class="card-body table-responsive">
      <!-- Dark Table -->
      
      <table id="example" class="table table-striped" style="width:100%" >
        <thead>
          <tr >
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Owner</th>
            <th scope='col'>county</th>
            <!-- <th scope="col">Approved</th> -->
            <th scope="col">Phone number</th>
            <th scope="col">Date</th>
            <th scope='col'>Action</th>

          </tr>
        </thead>



        <tbody>

         
          <?php foreach($rows as $row): ?>
          <tr>

            <th scope="row"><?php echo esc($row->id ?? "") ?></th>
            <td><?php echo esc( $row->product_name) ?? ""?></td>
            <td style="width:50px; height:50px;">
              <img src="<?php echo ROOT ?>/<?php echo esc($row->image) ?>" class="img-fluid" style="with:50px;" alt="">
            </td>
            
            <td><?php echo esc($row->user_row_name->username) ?? "" ?></td>
           
            <td>
              
              <?php if(!empty($row->category_row_name)):?>
              <?php echo esc($row->category_row_name->category_name)?? "Unknown" ?>
             
              <?php else:?>
                Unknown
              <?php endif;?>
            </td>
            
            <!-- <td><?php// echo esc($row->approved) ?? "" ?></td> -->
            <td><?php echo esc($row->phone) ?? "" ?></td>
            <td><?php echo esc($row->date) ?? "" ?></td>
            <td>
              <a href="<?= ROOT?>/dashboard/products/delete/<?php echo $row->id ?? ""?>"><i
                  class="bi bi-trash pe-3 text-danger"></i></a>
              <a href="<?php echo ROOT ?>/dashboard/products/edit/<?php echo $row->id ?? ""?>"><i class="bi bi-pencil text-primary"></i></a>
            </td>

          </tr>
          <?php endforeach;?>
          <?php// else:?><!--
            <div class="alert alert-danger text-center">Empty Record Post Your Product</div>-->
          <?php endif?>
        </tbody>


      </table>
      <!-- End Dark Table -->

    </div>

          </div>
    <?php else:?>
    <div class="alert alert-danger text-center">You dont have permission to perform this action</div>
  <?php endif?>

    <?php endif;?>


    <script>






      function save_changes() {
        var save = document.querySelector(".save");
        save.classList.remove("disabled");
        save.style.backgroundColor = "red";

      }
      var image_added = false;

      function display(file) {

        var allowedext = ['img', 'png', 'jpg','jpeg'];

        imgext = file.name.split('.').pop();
        if (allowedext.includes(imgext.toLowerCase())) {
          var img = document.querySelector(".img-review");
          var imgName = document.querySelector(".img-name");
          imgName.innerHTML = file.name;
           img.src = URL.createObjectURL(file);
          image_added = true;
      
        
          
        } else {
          alert("Extention is not required");
          image_added = false;
        }

      }

      function validate(e, form)

      {
        e.preventDefault();
        if (!image_added) {
          alert("Please insert an image!");
          return;
        }

        form.submit()
      }

      //send form
      function save_data()   
       { 
        var obj = {};
        var containerdiv = document.querySelector(".edit-js");
        var inputs = containerdiv.querySelectorAll(".js-on, textarea, select");
      
        inputs.forEach(element => {
          var key = element.name;
          var value = element.value;
          obj[key] =value;
     
    });
        send_data(obj);
          
        }

      function  send_data(obj)
        {
      
          var image = document.querySelector('.image');
          var file = null;

       
         
        var xml = new XMLHttpRequest();
        var form = new FormData();
        for (key in obj) {
           
            form.append(key, obj[key]);
        }
           if(image.files.lenght >0)
          {
             
          }
          else{
            file = image.files[0];
            form.append('image', file);
           
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
        function  handle_result(result)
        {
    
          var obj = JSON.parse(result);
          if(typeof obj == "object")
          { 
            
        
            if(result.includes("message"))
            {
              var message = document.querySelector(".message");

             message.style.transition = "1s all ease";
             message.style.color = "orange";
             message.style.fontWeight = "bold";
              message.innerHTML = obj.message;
            
            }
            if(result.includes("product_name"))
              {
                var product = document.querySelector(".js-product");
                product.innerHTML = obj.product_name;
                 
            }
             if(result.includes("phone"))
              {

                var phone = document.querySelector(".js-phone");
                phone.innerHTML = obj.phone;
            
            }
              if(result.includes("quantity"))
              {

                var quantity = document.querySelector(".js-quantity");
                quantity.innerHTML = obj.quantity;
             
            }
              if(result.includes("description"))
              {

                var description = document.querySelector(".js-description");
                description.innerHTML = obj.description;
            
             
            }         
              if(result.includes("features"))
              {

                var features = document.querySelector(".js-features");
                features.innerHTML = obj.features;
             
            } 
               
          
            
  
           
          }
          else{
            message.iinerHTML = "Error occured";
         
          }

        }
    </script>




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