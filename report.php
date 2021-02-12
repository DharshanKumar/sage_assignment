<h1>Report</h1>
<table border="1">
<?php
	require_once('dbconnection.php');
	$sql = "SELECT students.firstname, course.name FROM studentcoursemapping LEFT join students on (students.id=studentcoursemapping.student_id) LEFT join course on (course.id=studentcoursemapping.course_id)";
	$result = $dbhandle->query( $sql );
	if( $result->num_rows > 0 ){
		echo "<thead>
				<tr>
					<th>Student name</th>
					<th>Course name</th>
				</tr>
			</thead>";
		while( $row = $result->fetch_assoc() ) {
			echo "<tr><td>" . htmlspecialchars($row["firstname"]). "</td><td>" . htmlspecialchars($row["name"]). "</td></tr>";
		}
	}
?>
</table>