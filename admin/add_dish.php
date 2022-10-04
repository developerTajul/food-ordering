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
                <a class="btn btn-info" href="dishes.php">Manage Dishes</a><br />
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <?php
                        spellon_print_r( $_POST );
                        echo "<pre>";
                        print_r( $_FILES );
                        echo "</pre>";
                        

                    ?>
					<form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" value="" class="form-control" id="name" placeholder="Type Dish Name">
						</div>

						<div class="form-group">
							<label for="content">Dish Details</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
						</div>

                        <div class="form-group">
                            <label>Upload Image</label>
                            <div class="input-group col-xs-12">
                                <input type="file" name="thumbnail">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category_id">
                                <?php
                                $all_cats = mysqli_query($con, "SELECT * FROM categories WHERE status = 1");
                                $results = mysqli_fetch_all( $all_cats, MYSQLI_ASSOC);
                                if( $results > 0):
                                    foreach( $results as $cat ): ?>
                                        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                                    <?php
                                    endforeach; 
                                endif;
                                ?>   
                                
                            </select>
                        </div>

						<button type="submit" name="dish_item_submit" class="btn btn-primary mr-2">Add Dish</button>
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