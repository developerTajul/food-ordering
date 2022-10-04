<?php
/**
 * Category
 */
if( isset( $_POST['add_new_user'] ) ){

	$name = mysqli_real_escape_string( $con, trim($_POST['name']) );
	$username = mysqli_real_escape_string ($con, trim($_POST['username']) );
	$email = mysqli_real_escape_string ($con, trim($_POST['email']) );
	$mobile = mysqli_real_escape_string ($con, trim($_POST['mobile']) );
	$password = mysqli_real_escape_string ($con, md5(trim($_POST['password'])));


	// spellon_print_r( $_POST );
	$sql_query = "INSERT INTO users(name, username, email, mobile, password) VALUES('$name', '$username', '$email', '$mobile', '$password')";
	// $sql_query = "INSERT INTO users (name, username, email, mobile, poassword) VALUES ('$name', '$username', '$email', '$mobile', '$password');";

	mysqli_query( $con, $sql_query);
  	spellon_redirect('users.php');
}

//

if( isset( $_GET['user_edit_id'] ) ){
    $current_user_edit_id =  $_GET['user_edit_id'];

    $results = mysqli_query($con, "SELECT * FROM users WHERE id='$current_user_edit_id'");

    $current_user =   mysqli_fetch_assoc($results);

    
}



// update category

if( isset( $_POST['update_user'] ) ){

	$update_user_id 	= mysqli_real_escape_string( $con, trim($_POST['update_id']) );
	$update_name 		= mysqli_real_escape_string( $con, trim($_POST['update_name']) );
	$update_email		= mysqli_real_escape_string( $con, trim($_POST['update_email']) );
	$update_mobile 		= mysqli_real_escape_string ($con, trim($_POST['update_mobile']) );

	mysqli_query($con, "UPDATE users SET name = '$update_name', email = '$update_email', mobile='$update_mobile' WHERE id='$update_user_id'");
	spellon_redirect('users.php');
}


// delete category item
if( isset( $_GET['user_delete_id'] ) ){
	$current_user_deleted_id = $_GET['user_delete_id'];
	mysqli_query( $con, "DELETE FROM users WHERE id='$current_user_deleted_id'");
	spellon_redirect('users.php');
}


// change status
if( isset( $_GET['user_status_id'] ) ){
	$current_user_id = $_GET['user_status_id'];

	if(  $_GET['user_status'] == 1){
		$status = 0;
	}else{
		$status = 1;
	}

	mysqli_query( $con, "UPDATE users SET status='$status' WHERE id='$current_user_id'");
	spellon_redirect('users.php');
}