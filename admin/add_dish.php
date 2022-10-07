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

                        <div class="form-group" id="disb_box_1">
                            <div class="row mb-3">
                                <div class="col-5">
                                    <input type="text" name="attribute[]" class="form-control" id="attribute" placeholder="Add Atribute" required>
                                </div>
                                <div class="col-5">
                                    <input type="text" name="price[]" class="form-control" id="price" placeholder="Add Price" required>
                                </div>
                            </div>
                        </div>

						<button type="submit" name="dish_item_submit" class="btn btn-primary mr-2">Add Dish</button>
						<button type="button" class="btn btn-danger" onclick="add_more()">Add More</button>
					</form>

                    <input type="hidden" name="add_number" id="add_more" class="form-class mt-5" value="1">
                </div>
              </div>
            </div>
            
		 </div>
        
		</div>

        <script>
            function add_more(){
                var add_more = jQuery('#add_more').val();
                add_more++;
                jQuery('#add_more').val(add_more);
  
                var dish_box ='<div class="row mb-3" id="box'+add_more+'"><div class="col-5"><input type="text" name="attribute[]" class="form-control" id="attribute" placeholder="Add Atribute" required></div><div class="col-5"><input type="text" name="price[]" class="form-control" id="price" placeholder="Add Price" required></div><div class="col-2"><button type="button" class="btn btn-danger" onclick="remove_more('+add_more+')">Remove More</button></div></div>';
                jQuery("#disb_box_1").append(dish_box);
            }

            function remove_more(id){
                jQuery('#box'+id).remove();
            }
          </script> 
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
<?php
require_once('footer.php'); ?>