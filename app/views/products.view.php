<?php $this->view('header') ?>
<?php $this->view('nav') ?>



<!--EDITING-->
<div class="container mb-5" style="margin-top:8rem !important; ">
    <div class="row ">
   
          
        <?php if(!empty($product)):?>
          
            <div class="col-md-10 col-sm-12">
                <div class="card xol">
                    <h3 class="pt-2"><strong class="p-3  text-secondary">SELLER(<?php echo esc($product->user_row_name->username)?>)</strong></h3>
                     <strong class="p-4"><?php echo esc( $product->product_name)?></strong>
                        <div class="card-body text-start">
                            <img style="    object-fit: cover !important;
                            border-radius: 8px;
                            width: 100%;
                            height: 310px;
                            min-height: 300px !important;" 
                            src="<?php echo ROOT?>\<?php echo esc($product->image)?>"
                            alt="" class="img-fluid">
                            <div class="card-title text-center m-1">
                               

                              
                            </div>
                            <div class="text-center mt-4">
                               
                               <a
                                href="<?php echo ROOT ?>contact/<?php echo esc($product->user_id)?>"
                               class="btn btn-warning " style="background-color: gold !important;">SHOW CONTACT  <strong class="text-primary"></strong></a>
                            </div>
                        </div>
                           <div class="text-center">
                <strong><?php echo esc( $product->product_name)?> Description</strong>
                </div>
               <p class="p-4">
                    <?php echo esc($product->description) ?? 'unknown'?>         
                </p>
                    </div>
             
            </div>
           
            
        <?php endif;?>
          
        </div>
      
 
  

        



        </div>
    </div>



 


</div>


<?php $this->view('footer') ?>