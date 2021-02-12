<?php require_once('dbconnection.php'); ?>
<section id="dsection">
	<h3>The data from the database table</h3>
	<table border="1">
		<?php
			$sql = "SELECT count(*) FROM students"; // no user input
			$result = $dbhandle->query($sql);
			$rowCount = $result->fetch_row();
			$results_per_page = 10;
			$no_of_records_per_page = ceil( $rowCount[0] / $results_per_page );
			if (!isset ($_GET['page']) ) {  
				$page = 1;  
			} else {  
				$page = $_GET['page'];  
			}
			$offset = ( $page-1 ) * $results_per_page;
			echo "<thead>
				<tr>
					<th>Id</th>
					<th>First name</th>
					<th>Last name</th>
					<th>Actions</th>
				</tr>
			</thead>";
			if( $rowCount[0] > 0 ){
				$sql = "SELECT * FROM students LIMIT $offset, $results_per_page";
				$result = $dbhandle->query( $sql );
				if( $result->num_rows > 0 ){
					while( $row = $result->fetch_assoc() ) {
						echo "<tr><td>" . $row["id"]. "</td><td>" . htmlspecialchars($row["firstname"]). "</td><td>" . htmlspecialchars($row["lastname"]). "</td><td><a href=\"studentregis.php?id=".$row['id']."\">Edit</a><a style='margin-left: 10px;' href=\"delete.php?id=".$row['id']."\">Delete</a></td></tr>";
					}
				}
			}
		?>
	</table>
</section>