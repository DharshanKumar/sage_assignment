<?php
$id = $_GET['id'];
if( !empty( $id ) ){
	require_once('dbconnection.php');
	$sql = "DELETE FROM students WHERE id = $id";
	if ( $dbhandle->query( $sql ) ) {
		header('Location: studentindex.php');
	} else {
		echo "Error deleting record";
	}
}