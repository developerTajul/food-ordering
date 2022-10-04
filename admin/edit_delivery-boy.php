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
                <a class="btn btn-info" href="add_user.php">Add New User</a><br />
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<form class="forms-sample" action="" method="POST">
						<div class="form-group">
                            <input type="hidden" name="update_id" value="<?php echo $current_delivery_boy['id']; ?>">
							<label for="update_name">Name</label>
							<input type="text" name="update_name" value="<?php echo $current_delivery_boy['name']; ?>" class="form-control" id="update_name" placeholder="Update Name">
						</div>

						<div class="form-group">
							<label for="update_email">Email</label>
							<input type="email" name="update_email" value="<?php echo $current_delivery_boy['email']; ?>" class="form-control" id="update_email" placeholder="Update Email Address">
						</div>

						<div class="form-group">
							<label for="update_mobile">Mobile Number</label>
							<input type="number" name="update_mobile" value="<?php echo $current_delivery_boy['mobile']; ?>" class="form-control" id="update_mobile" placeholder="Update Mobile Number">
						</div>

						<button type="submit" name="update_delivery_boy" class="btn btn-primary mr-2">Update Delivery Boy</button>
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