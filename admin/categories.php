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
					<a href="add_category.php">Add New Category</a>
					<div class="row">
						<div class="col-12">
						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>Order #</th>
										<th>Name</th>
										<th>Order Number</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$cats = mysqli_query($con, "SELECT * FROM categories");
									$results = mysqli_fetch_all($cats, MYSQLI_ASSOC);

									$number = 1;
									foreach($results as $cat ):
									?>
									<tr>
										<td><?php echo $number; ?></td>
										<td><?php echo $cat['name']; ?></td>
										<td><?php echo $cat['order_number']; ?></td>
										<td>
											<?php 
											if( $cat['status'] == 1 ){
												echo '<span class="btn btn-success" href="">Active</span>';
											}else{
												echo '<span class="btn btn-danger" href="">Deactive</span>';
											}  
											?>
										</td>
										<td>
											<a href="edit_category.php?cat_edit_id=<?php echo $cat['id']; ?>" class="btn btn-outline-primary">Edit</a>
											<a href="?cat_delete_id=<?php echo $cat['id']; ?>" class="btn btn-outline-primary">Delete</a>
											<?php 
											if( $cat['status'] == 1 ): ?>
												<a href="?cat_status_id=<?php echo $cat['id']; ?>&cat_status=<?php echo $cat['status']; ?>" class="btn btn-outline-danger">Deactive</a>
											<?php
											else: ?>
												<a href="?cat_status_id=<?php echo $cat['id']; ?>&cat_status=<?php echo $cat['status']; ?>" class="btn btn-outline-success">Activate</a>		
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