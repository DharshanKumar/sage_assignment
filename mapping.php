<style type="text/css">
	.container {
		width: 100%;
		height: 200px;
		margin: auto;
		padding: 10px;
	}

	.one {
		width: 15%;
		height: 200px;
		float: left;
	}

	.two {
		margin-left: 15%;
		height: 200px;
		float: left;
	}
</style>
<?php
	require_once('dbconnection.php');
	if( !empty( $_POST ) ){
		$sql = "INSERT INTO studentcoursemapping ( student_id, course_id ) VALUES (?,?)";
		$stmt = $dbhandle->prepare( $sql );
		$stmt->bind_param( 'ii', $_POST['studentId'], $_POST['courseId'] );
		if( $stmt->execute() ) { 
			echo "Data Saved Successfully";
		} else {
			echo "Data Saving Failed";
		}
		$stmt->close();
		$dbhandle->close();
	}
?>
<h1>Student Course Registration</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="container">
		<div style="" class="one">
			<label for="firstname">Student: </label>
			<select name="studentId" id="studentId">
			<?php 
				$sql = "SELECT * FROM students";
				$result = $dbhandle->query( $sql );
				if( $result->num_rows > 0 ){
					while( $row = $result->fetch_assoc() ) {
						echo '<option value='.$row["id"].'>' . $row["firstname"] . '</option>';
					}
				}
			?>
			</select>
		</div>
		<div style="" class="two">
			<label for="name">Course: </label>
			<select name="courseId" id="courseId">
			<?php 
				$sql = "SELECT * FROM course";
				$result = $dbhandle->query( $sql );
				if( $result->num_rows > 0 ){
					while( $row = $result->fetch_assoc() ) {
						echo '<option value='.$row["id"].'>' . $row["name"] . '</option>';
					}
				}
			?>
			</select>
		</div>
	</div>
	<input style="margin-left: 25%;" class=".btn" type="submit" value="Submit">
</form>