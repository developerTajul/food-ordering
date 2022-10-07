<?php
/**
 * Category
 */
if( isset( $_POST['dish_item_submit'] ) ){

	
	
	// spellon_print_r( $attributeArr );
	// spellon_print_r( $priceArr );
	// foreach( $attributeArr as $key => $value ){

	// 	echo $priceArr[$key]." : ".$value."<br />";
	// }
	// die();

	$name = mysqli_real_escape_string( $con, trim($_POST['name']) );
	$content = mysqli_real_escape_string( $con, trim($_POST['content']) );
	$cat_id = mysqli_real_escape_string( $con, trim($_POST['category_id']) );

	$slug_array = preg_split("/ | ,|,/", $name);
    $slug = strtolower(implode("-", $slug_array));

    /**
     * Thumbnail
     */
    $dish_file_name = $_FILES['thumbnail']['name'];
    $dish_tmp_name = $_FILES['thumbnail']['tmp_name'];
    move_uploaded_file($dish_tmp_name, '../uploads/dishes/'.$dish_file_name);



	$sql_query = "INSERT INTO dish(name, slug, content, thumbnail, category_id) VALUES('$name', '$slug', '$content', '$dish_file_name', '$cat_id')";
	mysqli_query( $con, $sql_query);

	$last_id = mysqli_insert_id( $con );
	
	if( $last_id !== 0 ){
		$attributeArr = $_POST['attribute'];
		$priceArr = $_POST['price'];

		foreach( $attributeArr as $key => $value ){

			$sql_query_dish_details = "INSERT INTO `dish_details` (`dish_id`, `attribute`, `price`) VALUES ('$last_id', '$value', '$priceArr[$key]');";
			mysqli_query( $con, $sql_query_dish_details);
		}
	}

  	spellon_redirect('dishes.php');
}


/**
 * Store data from database
 */
if( isset( $_GET['dish_edit_id'] ) ){
    $current_dish_edit_id =  $_GET['dish_edit_id'];

    $results = mysqli_query($con, "SELECT * FROM dish WHERE id='$current_dish_edit_id'");

    $current_dish = mysqli_fetch_assoc($results);
}


// update dash

if( isset( $_POST['update_dish_item'] ) ){


	$update_dish_id = mysqli_real_escape_string( $con, trim($_POST['update_dish_id']) );
	$update_name = mysqli_real_escape_string( $con, trim($_POST['update_name']) );
	$update_content = mysqli_real_escape_string ($con, trim($_POST['update_content']) );
	$update_category_id = mysqli_real_escape_string ($con, trim($_POST['update_category_id']) );

	$update_slug_array = preg_split("/ | ,|,/", $update_name);
	$update_slug = strtolower(implode("-", $update_slug_array));


    if( $_FILES['update_thumbnail']['name'] != ""){

        $update_file_name = $_FILES['update_thumbnail']['name'];
        $update_tmp_file_name = $_FILES['update_thumbnail']['tmp_name'];
        move_uploaded_file($update_tmp_file_name, '../uploads/dishes/'.$update_file_name);

        // delete previous image
        unlink('../uploads/dishes/'.$current_dish['thumbnail']);

		mysqli_query($con, "UPDATE dish SET name = '$update_name', slug ='$update_slug', content='$update_content', category_id = '$update_category_id', thumbnail='$update_file_name' WHERE id='$update_dish_id'");

    }else{
		mysqli_query($con, "UPDATE dish SET name = '$update_name', slug ='$update_slug', content='$update_content', category_id = '$update_category_id' WHERE id='$update_dish_id'");  
    }

	/**
	 * Dish Item 
	 */
	$attributeArr = $_POST['attribute'];
	$priceArr = $_POST['price'];
	$dishDetailsIdArr = $_POST['dish_details_id'];

	foreach( $attributeArr as $key => $value ){
		$attr = $value;
		$price = $priceArr[$key];

		if( isset( $dishDetailsIdArr[$key] ) ){
			$current_dish_item = $dishDetailsIdArr[$key];

			mysqli_query($con, "UPDATE dish_details SET attribute = '$attr', price ='$price' WHERE id='$current_dish_item'");  

		}else{
			$sql_current_new_dish_item = "INSERT INTO dish_details (dish_id, attribute, price) VALUES ('$update_dish_id', '$value', '$price');";
			mysqli_query( $con, $sql_current_new_dish_item);
		}
	}



	spellon_redirect('dishes.php');
}


// delete category item
if( isset( $_GET['dish_delete_id'] ) ){
	$current_dish_deleted_id = $_GET['dish_delete_id'];
	mysqli_query( $con, "DELETE FROM dish WHERE id='$current_dish_deleted_id'");
	spellon_redirect('dishes.php');
}

/**
 * Dish Item Delete
 */
if( isset( $_GET['dish_details_id'] ) ){
	$current_dish_details_deleted_id = $_GET['dish_details_id'];
	$current_edit_dish_id = $_GET['dish_edit_id'];
	mysqli_query( $con, "DELETE FROM dish_details WHERE id='$current_dish_details_deleted_id'");
	spellon_redirect('edit_dish.php?dish_edit_id='.$current_edit_dish_id);
}

// change status
if( isset( $_GET['dish_status_id'] ) ){
	$current_dish_id = $_GET['dish_status_id'];

	if(  $_GET['dish_status'] == 1){
		$status = 0;
	}else{
		$status = 1;
	}

	mysqli_query( $con, "UPDATE dish SET status='$status' WHERE id='$current_dish_id'");
	spellon_redirect('dishes.php');
}