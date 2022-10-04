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
                <a class="btn btn-info" href="add_dish.php">Add New Dish</a><br />
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
                            <input type="hidden" name="update_dish_id" value="<?php echo $current_dish['id']; ?>">
							<label for="update_name">Name</label>
							<input type="text" name="update_name" value="<?php echo $current_dish['name']; ?>" class="form-control" id="update_name" placeholder="Update Name">
						</div>

						<div class="form-group">
							<label for="update_content">Dish Details</label>
                            <textarea name="update_content" id="update_content" class="form-control" cols="30" rows="10"><?php echo $current_dish['content']; ?><?php echo $current_dish['content']; ?></textarea>
						</div>

                        <div class="form-group">
                            <label>File upload</label>
                            
                            <div class="input-group col-xs-12">
                                <input type="file" name="update_thumbnail">
                            </div>
                            <img style="width:150px; height: 150px;" src="../uploads/dishes/<?php echo $current_dish['thumbnail']; ?>" alt="">
                        </div>

                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <select class="form-control" id="category" name="update_category_id">
                            <?php
                                $all_cats = mysqli_query($con, "SELECT * FROM categories WHERE status = 1");
                                $results = mysqli_fetch_all( $all_cats, MYSQLI_ASSOC);
                                if( $results > 0):
                                    foreach( $results as $cat ): ?>
                                        <option value="<?php echo $cat['id']; ?>"
                                        <?php
                                            if( $cat['id'] == $current_dish['category_id']){
                                                echo "selected";
                                            }
                                        ?>
                                        ><?php echo $cat['name']; ?></option>
                                    <?php
                                    endforeach; 
                                endif;
                                ?>  
                            </select>
                        </div>

						<button type="submit" name="update_dish_item" class="btn btn-primary mr-2">Update Dish</button>
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