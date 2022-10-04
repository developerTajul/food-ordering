<?php
/**
 * Category
 */
if( isset( $_POST['category_submit'] ) ){

	$name = mysqli_real_escape_string( $con, trim($_POST['name']) );
	$order_number = mysqli_real_escape_string ($con, trim($_POST['order_number']) );

	$slug_array = preg_split("/ | ,|,/", $name);
    $slug = strtolower(implode("-", $slug_array));

	$sql_query = "INSERT INTO categories(name, slug, order_number) VALUES('$name', '$slug', '$order_number')";

	mysqli_query( $con, $sql_query);
  	spellon_redirect('categories.php');
}

//
function get_cat_data(){
	global $con;
	if( isset( $_GET['cat_edit_id'] ) ){
		$current_edit_id =  $_GET['cat_edit_id'];
	
		$results = mysqli_query($con, "SELECT * FROM categories WHERE id='$current_edit_id'");
	
		return  mysqli_fetch_assoc($results);
	}
}


// update category

if( isset( $_POST['update_category'] ) ){

	$update_cat_id = mysqli_real_escape_string( $con, trim($_POST['update_id']) );

	$update_name = mysqli_real_escape_string( $con, trim($_POST['update_name']) );
	$update_order_number = mysqli_real_escape_string ($con, trim($_POST['update_order_number']) );

	$update_slug_array = preg_split("/ | ,|,/", $update_name);
	$update_slug = strtolower(implode("-", $update_slug_array));

	mysqli_query($con, "UPDATE categories SET name = '$update_name', slug ='$update_slug', order_number='$update_order_number' WHERE id='$update_cat_id'");
	spellon_redirect('categories.php');
}


// delete category item
if( isset( $_GET['cat_delete_id'] ) ){
	$current_deleted_id = $_GET['cat_delete_id'];
	mysqli_query( $con, "DELETE FROM categories WHERE id='$current_deleted_id'");
	spellon_redirect('categories.php');
}


// change status
if( isset( $_GET['cat_status_id'] ) ){
	$current_cat_id = $_GET['cat_status_id'];

	if(  $_GET['cat_status'] == 1){
		$status = 0;
	}else{
		$status = 1;
	}

	mysqli_query( $con, "UPDATE categories SET status='$status' WHERE id='$current_cat_id'");
	spellon_redirect('categories.php');
}

/**
 * Show all category
 */

 