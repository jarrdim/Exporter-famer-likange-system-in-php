 <?php $this->view('admin/header') ?>
<?php $this->view('admin/nav') ?>
<div class="container">
    <div class="card">
        <div class="card-body">
        <div class="fw-bold text-muted text-center">UPDATE ABOUT US AND SERVICES SECTION</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <span class="fw-bold  text-success">ABOUT US PAGE</span>
                 
                    <div class="form-floating mt-3">
                    <textarea value=" " oninput="save_changes()" name="features" class="form-control"
                        placeholder="Address" id="floatingTextarea" style="height: 100px;">
                    <?php  ?>
                            </textarea>
                    <label for="floatingTextarea">About Us</label>
                    </div>
                
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <span class=" fw-bold  text-warning">BANNER SECTION</span>
                    <div class="form-floating mt-3">
                    <textarea value=" " oninput="save_changes()" name="features" class="form-control"
                        placeholder="Address" id="floatingTextarea" style="height: 100px;">
                    <?php  ?>
                            </textarea>
                    <label for="floatingTextarea">Banner</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <span class=" fw-bold  text-success">SERVICES SECTION ONE</span>
                    <div class="form-floating mt-3">
                    <textarea value=" " oninput="save_changes()" name="features" class="form-control"
                        placeholder="Address" id="floatingTextarea" style="height: 100px;">
                    <?php  ?>
                            </textarea>
                    <label for="floatingTextarea">Services</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <span class=" fw-bold  text-success">SERVICES SECTION TWO</span>
                    <div class="form-floating mt-3">
                    <textarea value=" " oninput="save_changes()" name="features" class="form-control"
                        placeholder="Address" id="floatingTextarea" style="height: 100px;">
                    <?php  ?>
                            </textarea>
                    <label for="floatingTextarea">Services</label>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php $this->view('admin/footer') ?>