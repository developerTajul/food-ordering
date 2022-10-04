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

					<form class="forms-sample" action="" method="POST">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Name">
						</div>

						<div class="form-group">
							<label for="order_number">Category Order Number</label>
							<input type="number" name="order_number" class="form-control" id="order_number" placeholder="Type Order Number">
						</div>

						<button type="submit" name="category_submit" class="btn btn-primary mr-2">Submit</button>
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