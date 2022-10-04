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
			    <h1 class="card-title ml10">Basic form elements</h1>
                <a class="btn btn-info" href="add_category.php">Add New Category</a><br />
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<?php 
					$current_cat = get_cat_data();
					spellon_print_r( $_POST );
					?>
					<form class="forms-sample" action="" method="POST">
						<div class="form-group">
                            <input type="hidden" name="update_id" value="<?php echo $current_cat['id']; ?>">
							<label for="update_name">Name</label>
							<input type="text" name="update_name" value="<?php echo $current_cat['name']; ?>" class="form-control" id="update_name" placeholder="Update Name">
						</div>

						<div class="form-group">
							<label for="update_order_number">Category Order Number</label>
							<input type="number" name="update_order_number" value="<?php echo $current_cat['order_number']; ?>" class="form-control" id="update_order_number" placeholder="Update Order Number">
						</div>

						<button type="submit" name="update_category" class="btn btn-primary mr-2">Update Category</button>
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