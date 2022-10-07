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
                            <textarea name="update_content" id="update_content" class="form-control" cols="30" rows="10"><?php echo $current_dish['content']; ?></textarea>
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


                        <div class="form-group" id="disb_box_1">
                            <label for="category">Dish Details</label>
                            <?php
                            if( $current_dish['id'] == 0 ): ?>
                                <div class="row mb-3">
                                    <div class="col-5">
                                        <input type="text" name="attribute[]" class="form-control" id="attribute" placeholder="Add Atribute" required>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="price[]" class="form-control" id="price" placeholder="Add Price" required>
                                    </div>
                                </div>
                            <?php
                            else: 
                            $current_dish_id = $current_dish["id"];    
                            $dish_attr = mysqli_query( $con, "SELECT * FROM dish_details WHERE dish_id='$current_dish_id'");   
                            $result = mysqli_fetch_all($dish_attr, MYSQLI_ASSOC); 
                            $li = 1;    
                            foreach( $result as $value ):
                               
                            ?>
                                <div class="row mb-3">
                                    <div class="col-5">
                                        <input type="hidden" name="dish_details_id[]" value="<?php echo $value['id']; ?>" >

                                        <input type="text" name="attribute[]" class="form-control" id="attribute" value="<?php echo $value['attribute']; ?>" placeholder="Add Atribute" required>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="price[]" value="<?php echo $value['price']; ?>" class="form-control" id="price" placeholder="Add Price" required>
                                    </div>
                                    <?php
                                    if( $li !== 1 ): ?>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-danger" onclick="remove_more_item('<?php echo $value['id']; ?>')">Remove More</button>
                                        </div>
                                    <?php
                                    endif; ?>
                                </div>
                            <?php
                            $li++;
                            endforeach;
                            endif; ?>  
                        </div>

						<button type="submit" name="update_dish_item" class="btn btn-primary mr-2">Update Dish</button>
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

            function remove_more_item(id){
                var result = confirm("Are you sure?");
                if( result ){
                    var cur_path = window.location.href;
                    window.location.href = cur_path + "&dish_details_id="+id;
                }
            }
          </script>                          


        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
<?php
require_once('footer.php'); ?>