<?php $this->view('header') ?>
<?php $this->view('nav') ?>
<section  class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-center py-5 h1">
               <span class="text-warning "> <strong>Welcome to</strong></span> 
               <div  style="font-family:cursive;">
                <span class="text-primary">Agri</span> 
               <span style="color:#6610f2; ">Tech Online Shop</span>
               </div>
               <div class="visible-logo">
                <img src="<?php echo ROOT ?>/assets/img/AgriTechNullbg.png" class="img-fluid" alt="">
               </div>
            </div>
            <div class="col-md-5">
                <div class="card "
                 style="
                    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
                    ">
                    <form method="POST" class="card-body">
                        <div class="form-outline">
                            <label for="username">Enter Username</label>
                        <input type="text" id="username" name="username" class="form-control mt-2" />

                         <?php if(!empty($errors['username'])):?>
                        <div class="text-danger"><?php echo $errors['username']?></div>
                         <?php endif; ?>  
                       
                          <div class="form-outline mt-2">
                            <label for="email">Enter Email</label>
                        <input type="text" id="email" name="email"  class="form-control mt-2" />
                         <?php if(!empty($errors['email'])):?>
                        <div class="text-danger"><?php echo $errors['email']?></div>
                     <?php endif; ?>  
                          <div class="form-outline mt-2">
                            <label for="email">Phone Number</label>
                        <input type="text" id="phone" name="phone"  class="form-control mt-2" />
                         <?php if(!empty($errors['phone'])):?>
                        <div class="text-danger"><?php echo $errors['phone']?></div>
                     <?php endif; ?>  
                          <div class="form-outline mt-2">
                            <label for="password">Enter Password</label>
                        <input type="password" id="password" name="password" class="form-control mt-2" />
                        <?php if(!empty($errors['password'])):?>
                        <div class="text-danger"><?php echo $errors['password']?></div>
                     <?php endif; ?>  

                       <button type="submit" class="btn w-100 btn-primary btn-block mb-4 mt-4" style="background-color:blue !important;">
                        Sign up
                        </button>
                        <div class="text-center">
                         <span>Already have an account <a  href="login">Login</a></span>
                        </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->view('footer') ?>