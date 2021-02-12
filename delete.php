<?php
$id = $_GET['id'];
if( !empty( $id ) ){
	require_once('dbconnection.php');
	$table = "students";
	if( !empty( $_GET['table'] ) ){
		$table = "course";
	}
	$sql = "DELETE FROM $table WHERE id = $id";
	if ( $dbhandle->query( $sql ) ) {
		header('Location: studentindex.php');
	} else {
		echo "Error deleting record";
	}
}
