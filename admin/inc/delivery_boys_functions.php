<?php
/**
 * Category
 */
if( isset( $_POST['add_delivery_boy'] ) ){

	$name = mysqli_real_escape_string( $con, trim($_POST['name']) );
	$username = mysqli_real_escape_string ($con, trim($_POST['username']) );
	$email = mysqli_real_escape_string ($con, trim($_POST['email']) );
	$mobile = mysqli_real_escape_string ($con, trim($_POST['mobile']) );
	$password = mysqli_real_escape_string ($con, md5(trim($_POST['password'])));


	// spellon_print_r( $_POST );
	$sql_query = "INSERT INTO delivery_boy(name, username, email, mobile, password) VALUES('$name', '$username', '$email', '$mobile', '$password')";

	mysqli_query( $con, $sql_query);
	spellon_redirect('delivery-boys.php');
}

//
if( isset( $_GET['delivery_boy_edit_id'] ) ){
    $current_delivery_boy_edit_id =  $_GET['delivery_boy_edit_id'];

    $results = mysqli_query($con, "SELECT * FROM delivery_boy WHERE id='$current_delivery_boy_edit_id'");
    $current_delivery_boy =   mysqli_fetch_assoc($results);
}



// update category

if( isset( $_POST['update_delivery_boy'] ) ){

	$update_delivery_boy_id 	= mysqli_real_escape_string( $con, trim($_POST['update_id']) );
	$update_delivery_boy_name 		= mysqli_real_escape_string( $con, trim($_POST['update_name']) );
	$update_delivery_boy_email		= mysqli_real_escape_string( $con, trim($_POST['update_email']) );
	$update_delivery_boy_mobile 		= mysqli_real_escape_string ($con, trim($_POST['update_mobile']) );

	mysqli_query($con, "UPDATE delivery_boy SET name = '$update_delivery_boy_name', email = '$update_delivery_boy_email', mobile='$update_delivery_boy_mobile' WHERE id='$update_delivery_boy_id'");
	spellon_redirect('delivery-boys.php');
}


// delete category item
if( isset( $_GET['delivery_boy_delete_id'] ) ){
	$current_delivery_boy_delete_id = $_GET['delivery_boy_delete_id'];
	mysqli_query( $con, "DELETE FROM delivery_boy WHERE id='$current_delivery_boy_delete_id'");
	spellon_redirect('delivery-boys.php');
}


// change status
if( isset( $_GET['delivery_boy_status_id'] ) ){
	$current_delivery_boy_id = $_GET['delivery_boy_status_id'];

	if(  $_GET['delivery_boy_status'] == 1){
		$status = 0;
	}else{
		$status = 1;
	}

	mysqli_query( $con, "UPDATE delivery_boy SET status='$status' WHERE id='$current_delivery_boy_id'");
	spellon_redirect('delivery-boys.php');
}