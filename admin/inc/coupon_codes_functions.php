<?php
/**
 * Category
 */
if( isset( $_POST['add_coupon_code'] ) ){

	$coupon_code = mysqli_real_escape_string( $con, trim($_POST['coupon_code']) );
	$coupon_type = mysqli_real_escape_string ($con, trim($_POST['coupon_type']) );
	$coupon_value = mysqli_real_escape_string ($con, trim($_POST['coupon_value']) );
	$cart_min_value = mysqli_real_escape_string ($con, trim($_POST['cart_min_value']) );
	$expired_on = mysqli_real_escape_string ($con, md5(trim($_POST['expired_on'])));

    $sql_query ="INSERT INTO coupon_code (coupon_code, coupon_type, coupon_value, cart_min_value, expired_on) VALUES ('$coupon_code', '$coupon_type', '$coupon_value', '$cart_min_value', '2022-09-30')";

	mysqli_query( $con, $sql_query);
	spellon_redirect('coupon-codes.php');
}

//
if( isset( $_GET['coupon_code_edit_id'] ) ){
    $current_coupon_code_edit_id =  $_GET['coupon_code_edit_id'];

    $results = mysqli_query($con, "SELECT * FROM coupon_code WHERE id='$current_coupon_code_edit_id'");
    $current_coupon_code =   mysqli_fetch_assoc($results);
	
}



// update category

if( isset( $_POST['update_coupon_code'] ) ){

	$update_coupon_code_id 	= mysqli_real_escape_string( $con, trim($_POST['update_id']) );
	$update_coupon_code_name 		= mysqli_real_escape_string( $con, trim($_POST['update_coupon_code_name']) );
	$update_coupon_type		= mysqli_real_escape_string( $con, trim($_POST['update_coupon_type']) );
	$update_coupon_value 		= mysqli_real_escape_string ($con, trim($_POST['update_coupon_value']) );
	$update_cart_min_value 		= mysqli_real_escape_string ($con, trim($_POST['update_cart_min_value']) );
	$update_expired_on 		= mysqli_real_escape_string ($con, trim($_POST['update_expired_on']) );

	mysqli_query($con, "UPDATE coupon_code SET coupon_code = '$update_coupon_code_name', coupon_type = '$update_coupon_type', coupon_value='$update_coupon_value', cart_min_value='$update_cart_min_value',  expired_on='$update_expired_on' WHERE id='$update_coupon_code_id'");
	spellon_redirect('coupon-codes.php');
}


// delete coupon code item
if( isset( $_GET['coupon_code_delete_id'] ) ){
	$current_coupon_code_delete_id = $_GET['coupon_code_delete_id'];
	mysqli_query( $con, "DELETE FROM coupon_code WHERE id='$current_coupon_code_delete_id'");
	spellon_redirect('coupon-codes.php');
}


// change status
if( isset( $_GET['coupon_code_status_id'] ) ){
	$current_coupon_code_id = $_GET['coupon_code_status_id'];

	if(  $_GET['coupon_code_status'] == 1){
		$status = 0;
	}else{
		$status = 1;
	}

	mysqli_query( $con, "UPDATE coupon_code SET status='$status' WHERE id='$current_coupon_code_id'");
	spellon_redirect('coupon-codes.php');
}