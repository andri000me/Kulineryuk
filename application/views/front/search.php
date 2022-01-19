<div class="container-fluid padding">
      <div class="row welcome text-center welcome">
            <div class="col-12">
                  <h1 class="display-4">Daftar Kuliner</h1>
            </div>
            <hr>
      </div>
</div>


<div class="row">
      <div class="container">
            <div class="col-lg-5 ml-5">
                  <form method="post" action="<?php echo base_url('Restaurant/search_keyword') ?>">
                        <div class="input-group">
                              <input type="text" class="form-control" placeholder="Cari kuliner yuk" name="keyword">
                              <span class="input-group-btn">
                                    <button class="btn btn-moca text-white" type="submit">Cari</button>
                              </span>
                        </div>
                  </form>
            </div>
      </div>
</div>



</div>
<div class="container text-center padding dish-card">
      <div class="row container">

            <?php if (!empty($stores)) {?>
            <?php foreach ($stores as $store) {?>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                  <div class="card mb-4 shadow-sm">
                        <?php $image = $store->img;?>
                        <img class="card-img-top"
                              src="<?php echo base_url() . 'public/uploads/restaurant/thumb/' . $image; ?>">
                        <div class="card-body">
                              <h4 class="card-title"><?php echo $store->name; ?></h4>

                              <p class="card-text mb-0"><?php echo $store->address; ?></p>
                              <hr>
                              <p class="card-text mb-0"></p>
                              <p class="card-text mb-0">OPENING HOURS</p>
                              <p class="card-text mb-0"><?php echo $store->o_days; ?></p>
                              <p class="card-text"><?php echo $store->o_hr; ?> - <?php echo $store->c_hr; ?></p>
                              <hr>
                              <a href="<?php echo base_url() . 'dish/list/' . $store->r_id; ?>"
                                    class="btn btn-orange">View
                                    Menu</a>
                        </div>
                  </div>
            </div>
            <?php }?>
            <?php }?>
      </div>
</div>