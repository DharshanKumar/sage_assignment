<h1>Student Details</h1>
<?php
	require_once('dbconnection.php');
	$editData = array( 'id' => NULL, 'firstname' => "", 'lastname' => "", 'DOB' => "", 'phoneno' => "" );
	if( !empty( $_POST ) ){
		if( !empty( $_POST['id'] ) ){
			$sql = "UPDATE students SET firstname = ?, lastname= ?, DOB = ?, phoneno = ? WHERE id = ?";	
			$stmt = $dbhandle->prepare( $sql );
			$stmt->bind_param( 'ssssi', $_POST['firstname'], $_POST['lastname'], $_POST['DOB'], $_POST['phoneno'], $_POST['id'] );
		}else{
			$sql = "INSERT INTO students ( firstname, lastname, DOB, phoneno ) VALUES (?,?,?,?)";
			$stmt = $dbhandle->prepare( $sql );
			$stmt->bind_param( 'ssss', $_POST['firstname'], $_POST['lastname'], $_POST['DOB'], $_POST['phoneno']);
		}
		if( $stmt->execute() ) { 
			echo "Data Saved Successfully";
		} else {
			echo "Data Saving Failed";
		}
		$stmt->close();
		$dbhandle->close();
	}else if( $_GET ){
		$editId = $_GET['id'];
		$sql = "Select * from students where id = $editId";
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
		<label for="firstname">First name: </label>
		<input type="text" name="firstname" id="firstname" required maxlength="30" minlength="1" value="<?php echo $editData['firstname'] ?>">  
	</p>
	<p>
		<label for="lastname">Last name: </label>
		<input type="text" name="lastname" id="lastname" required maxlength="30" minlength="1" value="<?php echo $editData['lastname'] ?>">
	</p>
	<p>
		<label for="dob">DOB: </label>
		<input type="date" name="DOB" required id="dob" value="<?php echo $editData['DOB'] ?>">
	</p>
	<p>
		<label for="phoneno">Phone No: </label>
		<input type="number" name = "phoneno" id="phoneno" required="" value="<?php echo $editData['phoneno'] ?>" >
	</p>
	<input type="submit" value="Submit"></p>
</form>

<a href="../index.php">Home</a>