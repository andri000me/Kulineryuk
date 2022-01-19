<div class="container p-4">
      <div class="row welcome text-center welcome">
            <div class="col-12">
                  <h1 class="display-4">Menu <?php echo $ketegori['k_name']; ?></h1>
            </div>
      </div>

</div>
</div>
<div class="container p-4 dish-card">
      <div class="row">
            <?php if (!empty($dishesh)) {?>
            <?php foreach ($dishesh as $dish) {?>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                  <div class="card mb-4 shadow-sm">
                        <?php $image = $dish['img'];?>
                        <img class="card-img-top"
                              src="<?php echo base_url() . 'public/uploads/dishesh/thumb/' . $image; ?>">
                        <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title"><?php echo $dish['name']; ?></h4>
                                    <h4 class="text-muted"><b>Rp<?php echo $dish['price']; ?></b></h4>
                              </div>
                              <p class="card-text"><?php echo $dish['about']; ?></p>
                             
                             
                        </div>
                  </div>
            </div>
            <?php }?>
            <?php } else {?>
            <div class="jumbotron">
                  <h1>No records found</h1>
            </div>
            <?php }?>
      </div>
      <hr class="my-4">
</div>