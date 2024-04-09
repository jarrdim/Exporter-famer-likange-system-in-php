<?php $this->view('header') ?>
<?php $this->view('nav') ?>
<section  class="mt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-center py-md-5 py-4 h1">
               <span class="text-info"> <strong>AVOCADO</strong></span> 
               <div  style="font-family:cursive;">
               <span style="color:#6610f2; ">Farmer Exporter Linkage</span>
               </div>
               <div class="visible-logo">
                <img src="<?php echo ROOT ?>/assets/img/Avoslg.jpeg" class="img-fluid" alt="">
               </div>
            </div>
            <div class="col-md-5">
                <div class="card "
                 style="
                    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
                    ">
                    <form method="POST" class="card-body">
                         <?php if(!empty($errors['email'])):?>
                        <div class="text-danger"><?php echo $errors['email']?></div>
                     <?php endif; ?>  


                            <label for="email">Enter Email</label>
                        <input type="text" id="email" name="email" class="form-control mt-2" />
                          <div class="form-outline mt-2">
                            <label for="password">Enter Password</label>
                        <input type="password" id="password"  name="password" class="form-control mt-2 mb-4" />

                       <button type="submit" class="btn w-100 btn-primary btn-block mb-4" style="background-color:blue !important;">
                        Login
                        </button>
                        <div class="mb-4" >
                           <a style="color:#993133 !important;" href="<?php echo ROOT ?>/forgot"> Forgotten your password?</a>
                        </div>
                        <div class="text-center">
                         <span><a  href="signup">Sign Up</a></span>
                        </div>

                        </div>
                    </form>
                </div>
         

            </div>
        </div>
    </div>
</section>

<?php $this->view('footer') ?>





















