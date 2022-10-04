<?php
function spellon_print_r( $arr ){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}


function spellon_redirect( $link ){
    ?>
    <script>
        window.location.href = "<?php echo $link; ?>";
    </script>
    <?php
    die();
}


function spellon_is_user_logged_in(){
    if( isset( $_SESSION['name'] ) ){
        return true;
    }
}

