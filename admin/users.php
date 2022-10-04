<?php
require_once('header.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
<?php require_once('template-parts/sidebar.php'); ?>
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Data table</h4>
					<a href="add_user.php">Add User</a>
					<div class="row">
						<div class="col-12">
						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>Sl. N</th>
										<th>Name</th>
										<th>Username</th>
										<th>Email Address</th>
										<th>Mobile</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$cats = mysqli_query($con, "SELECT * FROM users");
									$results = mysqli_fetch_all($cats, MYSQLI_ASSOC);

									$number = 1;
									foreach($results as $user ):
									?>
									<tr>
										<td><?php echo $number; ?></td>
										<td><?php echo $user['name']; ?></td>
										<td><?php echo $user['username']; ?></td>
										<td><?php echo $user['email']; ?></td>
										<td><?php echo $user['mobile']; ?></td>
										<td>
											<?php 
											if( $user['status'] == 1 ){
												echo '<span class="btn btn-success" href="">Active</span>';
											}else{
												echo '<span class="btn btn-danger" href="">Deactive</span>';
											}  
											?>
										</td>
										<td>
											<a href="edit_user.php?user_edit_id=<?php echo $user['id']; ?>" class="btn btn-outline-primary">Edit</a>
											<a href="?user_delete_id=<?php echo $user['id']; ?>" class="btn btn-outline-primary">Delete</a>
											<?php 
											if( $user['status'] == 1 ): ?>
												<a href="?user_status_id=<?php echo $user['id']; ?>&user_status=<?php echo $user['status']; ?>" class="btn btn-outline-danger">Deactive</a>
											<?php
											else: ?>
												<a href="?user_status_id=<?php echo $user['id']; ?>&user_status=<?php echo $user['status']; ?>" class="btn btn-outline-success">Activate</a>		
											<?php
											endif; ?>
										</td>
									</tr>
									<?php
									$number++;
									endforeach; ?>
								</tbody>
							</table>
						</div>
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