<?php $this->view('header') ?>
<?php $this->view('nav') ?>

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
<div class="container px-5 " style="margin-top:8rem; margin-bottom:8rem;">

    <div class="row gy-5">
        <!--PROFILE DATA-->
        <div class="col-md-5">

            <?php if(!empty($_SESSION['USER_INFO'])):?>
            <div class="card p-3 mb-4 text-center"
                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                <div class="text-center  mx-auto">
                    <div>MY ACCOUNT</div>
                    <div class="rounded-circle bg-primary " style="height:3rem !important; width:3rem !important;">
                        <img src="<?php echo ROOT ?>/assets/img/hero.jpg" alt=""
                            class="img-fulid rounded-circle"
                            style="object-fit:cover; height:3rem; width:3rem; border:solid gold;">
                    </div>
                </div>
                <div class="d-flex ">
                    <div class="text-start">
                        <div>NAME:<span class="text-primary"><?php echo "  ". esc(Auth::getUsername()) ?? '' ?></span></div>
                        <div>Email:<span class="text-primary"><?php echo "  ".esc(Auth::getEmail()) ?? ''?></span></div>
                        <div>Member Since</div>
                        <div><?php echo esc(Auth::getDate()) ?? ''?></div>
                        <div class="bi bi-pen text-warning p-2 mt-3">Edit</div>
                    </div>
                    <div class="ms-auto">
                        <div>Post Product</div>
                        <div><a href="<?php echo ROOT ?>/dashboard/products"><i class="bi bi-upload"></i></a></div>
                    </div>
                </div>

            </div>

        </div>
        <?php endif; ?>
        <!--END PROFILE DATA-->
    
    </div>
</div>

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


<?php $this->view('footer') ?>