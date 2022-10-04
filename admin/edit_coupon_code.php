<?php
require_once('header.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
<?php require_once('template-parts/sidebar.php'); ?>
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
			    <h1 class="card-title ml10">You can add Users from here</h1>
                <a class="btn btn-info" href="add_coupon_code.php">Add New User</a><br />
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<?php
						echo "<pre>";
						print_r( $_POST);
						echo "</pre>";
					?>
					<form class="forms-sample" action="" method="POST">

						<div class="form-group">
                            <input type="hidden" name="update_id" value="<?php echo $current_coupon_code['id']; ?>">

							<label for="update_coupon_code">Coupon Code</label>
							<input type="text" name="update_coupon_code_name" value="<?php echo $current_coupon_code['coupon_code']; ?>" class="form-control" id="update_coupon_code" placeholder="Update Coupon Name">
						</div>

						<div class="form-group">
							<label for="update_coupon_type">Coupon Type</label>
							<input type="text" name="update_coupon_type" value="<?php echo $current_coupon_code['coupon_type']; ?>" class="form-control" id="update_coupon_type" placeholder="Update Coupon type">
						</div>

						<div class="form-group">
							<label for="update_coupon_value">Coupon Value</label>
							<input type="number" name="update_coupon_value" value="<?php echo $current_coupon_code['coupon_value']; ?>" class="form-control" id="update_coupon_value" placeholder="Update Coupon Value">
						</div>

						<div class="form-group">
							<label for="update_cart_min_value">Cart Min Value</label>
							<input type="text" name="update_cart_min_value" class="form-control" value="<?php echo $current_coupon_code['cart_min_value']; ?>" id="cart_min_value" placeholder="Update Type Cart Min Value">
						</div>

						<div class="form-group">
							<label for="update_expired_on">Expired On</label>
							<input type="date" name="update_expired_on" class="form-control" value="<?php echo $current_coupon_code['expired_on']; ?>" placeholder="Update Type Expired On Date">
						</div>

						<button type="submit" name="update_coupon_code" class="btn btn-primary mr-2">Update Code Code</button>
						<button class="btn btn-light">Cancel</button>
					</form>
                </div>
              </div>
            </div>
            
		 </div>
        
		</div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
<?php
require_once('footer.php'); ?>