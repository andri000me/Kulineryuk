<div class="container-fluid padding">
      <div class="row welcome text-center welcome">
            <div class="col-12">
                  <h1 class="display-4">About Us</h1>
            </div>
            <hr>
      </div>
</div>



</div>
<div class="container text-center padding dish-card ">
      <div class="row container">
            <?php if (!empty($stores)) {?>
            <?php foreach ($stores as $store) {?>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                  <div class=" card mb-4 shadow-sm">
                        <?php $v_about = $store['v_about'];?>

                        <div class="mt-4">
                              <div class="card-body">


                                    <video width="100%" height="80%" controls>

                                          <source types='video/mp4'
                                                src="<?php echo base_url() . 'public/uploads/restaurant/thumb/' . $v_about; ?>">

                                    </video>
                                    <h5 class="card-title"><?php echo $store['nama']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $store['job_desk']; ?></h6>
                                    <p class="card-text" id="transisi"><?php echo $store['keterangan']; ?></p>
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