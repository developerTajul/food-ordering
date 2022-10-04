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
					<a href="add_coupon_code.php">Add Coupon Code</a>
					<div class="row">
						<div class="col-12">
						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>Sl. N</th>
										<th>Coupon Code</th>
										<th>Coupon Type</th>
										<th>Coupon Value</th>
										<th>Cart Min Value</th>
										<th>Expired On</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$delivery_boy = mysqli_query($con, "SELECT * FROM  coupon_code");
									$results = mysqli_fetch_all($delivery_boy, MYSQLI_ASSOC);

									$number = 1;
									foreach($results as $coupon ):
									
									?>
									<tr>
										<td><?php echo $number; ?></td>
										<td><?php echo $coupon['coupon_code']; ?></td>
										<td><?php echo $coupon['coupon_type']; ?></td>
										<td><?php echo $coupon['coupon_value']; ?></td>
										<td><?php echo $coupon['cart_min_value']; ?></td>
										<td><?php echo $coupon['expired_on']; ?></td>
										<td>
											<?php 
											if( $coupon['status'] == 1 ){
												echo '<span class="btn btn-success" href="">Active</span>';
											}else{
												echo '<span class="btn btn-danger" href="">Deactive</span>';
											}  
											?>
										</td>
										<td>
											<a href="edit_coupon_code.php?coupon_code_edit_id=<?php echo $coupon['id']; ?>" class="btn btn-outline-primary">Edit</a>
											<a href="?coupon_code_delete_id=<?php echo $coupon['id']; ?>" class="btn btn-outline-primary">Delete</a>
											<?php 
											if( $coupon['status'] == 1 ): ?>
												<a href="?coupon_code_status_id=<?php echo $coupon['id']; ?>&coupon_code_status=<?php echo $coupon['status']; ?>" class="btn btn-outline-danger">Deactive</a>
											<?php
											else: ?>
												<a href="?coupon_code_status_id=<?php echo $coupon['id']; ?>&coupon_code_status=<?php echo $coupon['status']; ?>" class="btn btn-outline-success">Activate</a>		
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