<h1>Student Details</h1>
<?php
	require_once('dbconnection.php');
	$table = "course";
	$editData = array( 'id' => NULL, 'name' => "", 'details' => "" );
	if( !empty( $_POST ) ){
		if( !empty( $_POST['id'] ) ){
			$sql = "UPDATE $table SET name = ?, details= ? WHERE id = ?";	
			$stmt = $dbhandle->prepare( $sql );
			$stmt->bind_param( 'ssi', $_POST['name'], $_POST['details'], $_POST['id'] );
		}else{
			$sql = "INSERT INTO $table ( name, details ) VALUES (?,?)";
			$stmt = $dbhandle->prepare( $sql );
			$stmt->bind_param( 'ss', $_POST['name'], $_POST['details'] );
		}
		if( $stmt->execute() ) { 
			echo "Course details Saved Successfully";
		} else {
			echo "Data Saving Failed";
		}
		$stmt->close();
		$dbhandle->close();
	}else if( $_GET ){
		$editId = $_GET['id'];
		$sql = "Select * from $table where id = $editId";
		$result = $dbhandle->query( $sql );
		if( $result->num_rows > 0 ){
			$editData = $result->fetch_assoc();
		}else{
			echo "ID: $editId not found";
		}
	}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="hidden" name="id" value="<?php echo $editData['id'] ?>">
	<p>
		<label for="name">Course name: </label>
		<input type="text" name="name" id="name" required maxlength="30" minlength="1" value="<?php echo $editData['name'] ?>">  
	</p>
	<p>
		<label for="details">Course Details: </label>
		<textarea rows = "5" type="text" name="details" id="details" required maxlength="100" minlength="1">	<?php echo $editData['details'] ?>
		</textarea>
	</p>
	<input type="submit" value="Submit"></p>
</form>

<a href="../index.php">Home</a>