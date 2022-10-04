<?php
session_start();
require_once('inc/config.php');
require_once('inc/template-helper.php');

session_destroy();
unset( $_SESSION );
spellon_redirect( 'login.php' );