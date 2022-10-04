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
                <a class="btn btn-info" href="users.php">Manage Users</a><br />
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
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="username" placeholder="Type Username">
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Type Email Here">
						</div>

						<div class="form-group">
							<label for="mobile">Mobile</label>
							<input type="text" name="mobile" class="form-control" id="mobile" placeholder="Type Mobile Number">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Type Password">
						</div>



						<button type="submit" name="add_new_user" class="btn btn-primary mr-2">Submit</button>
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