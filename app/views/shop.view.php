<?php $this->view('header') ?>
<?php $this->view('nav') ?>



<!--EDITING-->
<div class="container" style="margin-top:8rem !important; ">
    <div class="row ">
        <div class="col-md-3 card-cat">
            <?php if(!empty($rows)):?>
            <div class="mb-3" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;background-color:#fff;">
                <div class=" card-body text-center p-2">
                    <div class="fw-bold text-center mt-2 mb-4 text-primary">SELECT CATEGORIES</div>
                    <a href="<?php echo ROOT?>/shop"><div class="btn btn-secodary mb-2">All</div></a>
                    <?php foreach($rows as $category):?>
                    <a href="<?php echo ROOT?>shop/products/<?php echo esc($category->slug)?>"><div class="btn btn-secodary mb-2" ><?php echo esc($category->category_name) ?? ''?></div></a>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endif;?>
            <?php if(!empty($old_product)):?>
            <div class="card card-categories" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
            <div class="fw-bold text-center text-success mt-2 mb-2">Other Products</div>
                <div class="card-body text-center p-2">
                    <?php foreach($old_product as $pro):?>
                    <div class="btn btn-secodary mb-2"><?php echo esc($pro->product_name) ?? ''?></div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="col-md-9">

   
        <?php if(!empty($products)):?>
            
        <div class="row">
            <div class="text-center fw-bold text-primary">ALL PRODUCTS</div>
            <?php foreach($products as $product):?>
                
            <div class="col-md-4">
                <div  class="card xol">
                    <a href="<?php echo ROOT?>product/<?php echo esc($product->id)?>" class="card-body text-start">
                        <img src="<?php echo ROOT ?>/<?php echo esc($product->image)?>" alt="" class="img-fluid img-olx">
                        <div class="card-title text-center m-1 mt-2">
                                <strong><?php echo esc($product->product_name) ?? "unknown"?></strong>

                                <p>
                                    <?php echo substr(trim(esc($product->description)),0,20)."..." ?? 'unknown'?>      
                                </p>
                        </div>
                        <div class="text-center">
                               <div> <strong>Click to view Product info and Seller Details</strong></div>
    
                        </div>
            </a>
            </div>
            </div>
            <?php endforeach;?>
        </div>
        <?php endif;?>
 
  

        



        </div>
    </div>





</div>


<!--ENDenditing-->



    <!--PRODUCTS SWIPPER-->
    <!--
    <section class="p-md-4">
        <div class="container  text-center">
            <div class="row mb-3">
            </div>
            <h1 class="p-2 text-muted"><b>SHOP WITH US</b></h1>


                <div class=" p-1 py-2 swiper  " >
                <div class="swiper-olx olx">
                    <div class="swiper-wrapper ">
                        <div class="swiper-slide">
                            <div class="card xol p-1 ">
                                <img src="<?php echo ROOT ?>/assets/img/agri1.jpg" alt="" class="img-fluid img-olx">
                                <div class=" px-2  text-start ">
                                    <div class="card-title py-1">
                                        <strong>bmw 2. 1.3 comfort</strong>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet11.
                                    </p>
                                    <div class="xol-heart">
                                        <strong>550$</strong>
                                        
                                        <a href="#"> <i class="bi bi-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev swiper-navBtn text-dark  "></div>
                    <div class="swiper-button-next swiper-navBtn text-dark  "></div>
                </div>




            </div>





          
            <div class="row gy-5 py-4">
                <div class="col-md-3 col-sm-6 ">
                    <div class="card xol">
                        <div class="card-body text-start">
                            <img src="<?php echo ROOT ?>/assets/img/agri2.jpg" alt="" class="img-fluid img-olx">
                            <div class="card-title py-2">
                                <strong>bmw 2. 1.34 comfort</strong>

                                <p>Lorem ipsum dolor sit amet. lorem 19
                                    Lorem ipsum dolor sit amet.
                                </p>
                            </div>
                            <div class="xol-heart">
                                <strong>550$</strong>
                                <a href="#"> <i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <div class="card xol">
                        <div class="card-body text-start">
                            <img src="<?php echo ROOT ?>/assets/img/agri2.jpg" alt="" class="img-fluid img-olx">
                            <div class="card-title py-2">
                                <strong>bmw 2. 1.3 comfort</strong>
                                <p>Lorem ipsum dolor sit amet. lorem 19
                                    Lorem ipsum dolor sit amet.
                                </p>
                            </div>
                            <div class="xol-heart">
                                <strong>550$</strong>
                                <a href="#"> <i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card xol">
                        <div class="card-body text-start">
                            <img src="<?php echo ROOT ?>/assets/img/agri2.jpg" alt="" class="img-fluid img-olx">
                            <div class="card-title py-2">
                                <strong>bmw 2. 1.3 comfort</strong>
                                <p>Lorem ipsum dolor sit amet. lorem 19
                                    Lorem ipsum dolor sit amet.
                                </p>
                            </div>
                            <div class="xol-heart">
                                <strong>550$</strong>
                                <a href="#"> <i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card xol">
                        <div class="card-body text-start">
                            <img src="<?php echo ROOT ?>/assets/img/agri2.jpg" alt="" class="img-fluid img-olx">
                            <div class="card-title py-2">
                                <strong>bmw 2. 1.3 comfort</strong>
                                <p>Lorem ipsum dolor sit amet. lorem 19
                                    Lorem ipsum dolor sit amet.
                                </p>
                            </div>
                            <div class="xol-heart">
                                <strong>550$</strong>
                                <a href="#"> <i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
            -->


            <script>
                var cart = {
                    add: function(id)
                    {
                        let obj={};
                        obj.data_type = "add";
                        obj.id = id;
                    
                    },
                }
               // alert(cart.add.obj);
            </script>

<?php $this->view('footer') ?>