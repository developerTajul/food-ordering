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
			    <h1 class="card-title ml10">You can manage coupon codes</h1>
                <a class="btn btn-info" href="coupon-codes.php">Manage Coupon Codes</a><br />
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

					<form class="forms-sample" action="" method="POST">
                        
						<div class="form-group">
							<label for="coupon_code">Coupon Code</label>
							<input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Enter Coupon Code">
						</div>

						<div class="form-group">
							<label for="coupon_type">Coupon Type</label>
							<input type="text" name="coupon_type" class="form-control" id="coupon_type" placeholder="Type Coupon Type">
						</div>

						<div class="form-group">
							<label for="coupon_value">Coupon Value</label>
							<input type="text" name="coupon_value" class="form-control" id="coupon_value" placeholder="Type Coupon Value Here">
						</div>

						<div class="form-group">
							<label for="cart_min_value">Cart Min Value</label>
							<input type="text" name="cart_min_value" class="form-control" id="cart_min_value" placeholder="Type Cart Min Value">
						</div>

						<div class="form-group">
							<label for="expired_on">Expired On</label>
							<input type="date" name="expired_on" class="form-control" id="expired_on" placeholder="Type Expired On">
						</div>

						<button type="submit" name="add_coupon_code" class="btn btn-primary mr-2">Add Delivery Boy</button>
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