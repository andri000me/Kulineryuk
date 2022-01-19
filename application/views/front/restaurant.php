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
            <div class="card mb-4 bg-orange">
                  <div class=" col-lg-6 ml-5">
                        <form method="post" action="<?php echo base_url('Restaurant/search_keyword') ?>">
                              <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari kuliner yuk"
                                          name="keyword">
                                    <span class="input-group-btn">
                                          <button class="btn btn-moca text-white" type="submit">Cari</button>
                                    </span>
                              </div>
                        </form>
                  </div>
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
                        <?php $image = $store['img'];?>
                        <?php $v_url = $store['v_url'];?>
                        <img height="50% !important" class=" card-img-top"
                              src="<?php echo base_url() . 'public/uploads/restaurant/thumb/' . $image; ?>">
                        <div class="card-body">

                              <h4 class=" card-title"><?php echo $store['name']; ?></h4>

                              <p class="card-text mb-0"><?php echo $store['address']; ?></p>
                              <hr>
                              <p class="card-text mb-0"></p>
                              <p class="card-text mb-0">OPENING HOURS</p>
                              <p class="card-text mb-0"><?php echo $store['o_days']; ?></p>
                              <p class="card-text"><?php echo $store['o_hr']; ?> - <?php echo $store['c_hr']; ?></p>
                              <p class="card-text mb-0"><?php echo $store['phone']; ?></p>
                              <hr>

                              <a href="<?php echo base_url() . 'dish/list/' . $store['r_id']; ?>"
                                    class="btn btn-orange">View
                                    Menu</a>


                              <div class="mt-4">


                                    <video width="100%" height="50%" controls>

                                          <source types='video/mp4'
                                                src="<?php echo base_url() . 'public/uploads/restaurant/thumb/' . $v_url; ?>">

                                    </video>
                              </div>

                        </div>
                  </div>
            </div>
            <?php }?>
            <?php } else {?>
            <h1>No records found</h1>
            <?php }?>

      </div>
</div>