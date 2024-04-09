    <?php $this->view('header') ?> 
  <?php $this->view('nav') ?> 

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <?php if(!empty($row)):?>
          
          <div class="card">
            <div class="card-body">
            <h2>Contact Infromation (<?php echo $row->username?>)</h2>
              <h2 class="text-info">Email: <?php echo " ".$row->email?></h2>
              <h2 class="text-info">Phone: <?php echo " ".$row->phone?></h2>
            </div>
          </div>
          <?php endif;?>
          <ol>
            <li><a href="<?php echo ROOT?>">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Company Address</h3>
                  <p>Kabarak, 20158, Nakuru</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <?php if(!empty($row)):?>
                  <p>exporter@gmail.com<br>Seller Email Address <p class="text-primary"><?php echo esc($row->email)?></p> </p>
                  <?php endif;?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+254 702 830 006<br>+254 745 378 674</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
              
            <form action=""  method="post" role="form" class="lphp-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" name="phone" class="form-control" id="name" placeholder="Your Phone No." required>
                </div>
                <!-- <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div> -->
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
               
                <div class="error-message">
                    <?php if(!empty($errors)): ?>
                        <div class="text-danger"><?php echo $errors ?></div>
                    <?php endif;?>
                </div>
                <div class="sent-message">
                    <?php if(!empty($message)): ?>
                    <div class="text-success"><?php echo $message?></div>
                  <?php endif;?>
                   </div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

 
  </main><!-- End #main -->


    <?php  $this->view('footer') ?>