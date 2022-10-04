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
					<a href="add_dish.php">Add New Dish</a>
					<div class="row">
						<div class="col-12">
						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>SL #</th>
										<th>Name</th>
										<th>Description</th>
										<th>Category</th>
										<th>Photo</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$dish_sql = "SELECT dish.*, categories.name as cat_name, categories.id as cat_id FROM dish
									INNER JOIN categories ON dish.category_id = categories.id
									";
									$dishes = mysqli_query($con, $dish_sql);
									$results = mysqli_fetch_all($dishes, MYSQLI_ASSOC);
									$number = 1;
									foreach($results as $dish ):
									?>
									<tr>
										<td><?php echo $number; ?></td>
										<td><?php echo $dish['name']; ?></td>
										<td><?php echo $dish['content']; ?></td>
										<td><?php echo $dish['cat_name']; ?></td>
										<td>
                                            <a href="#"><img src="../uploads/dishes/<?php echo $dish['thumbnail']; ?>" alt=""></a>
                                            
                                        </td>
										<td>
											<?php 
											if( $dish['status'] == 1 ){
												echo '<span class="btn btn-success" href="">Active</span>';
											}else{
												echo '<span class="btn btn-danger" href="">Deactive</span>';
											}  
											?>
										</td>
										<td>
											<a href="edit_dish.php?dish_edit_id=<?php echo $dish['id']; ?>" class="btn btn-outline-primary">Edit</a>
											<a href="?dish_delete_id=<?php echo $dish['id']; ?>" class="btn btn-outline-primary">Delete</a>
											<?php 
											if( $dish['status'] == 1 ): ?>
												<a href="?dish_status_id=<?php echo $dish['id']; ?>&dish_status=<?php echo $dish['status']; ?>" class="btn btn-outline-danger">Deactive</a>
											<?php
											else: ?>
												<a href="?dish_status_id=<?php echo $dish['id']; ?>&dish_status=<?php echo $dish['status']; ?>" class="btn btn-outline-success">Activate</a>		
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