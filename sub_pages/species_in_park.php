<?php
	// Start the session
	session_start();

	// Connect to the database
	include( "../connection/park_connect.php" );

	$results_page = 0;

	if ( isset( $_REQUEST[ "add" ] ) )
		if ( $_REQUEST[ "add" ] == "Search"
			 && isset( $_REQUEST[ "park" ] )
		   ) // Check all setted
		{
			// Change what to display
			$results_page = 1;
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Park Menagement</title>
	</head>
	<body>
	<?php
	// $query = "SELECT animals.species_id, animals_species.name FROM animals LEFT JOIN animals_species ON animals.species_id = animals_species.id";
	// $result = mysqli_query( $park_connection, $query );
	// for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
	// 	echo mysqli_fetch_array( $result )["name"];
	if ( $results_page != 1 )
	{
	?> 
		<div class = "select_park_div" >
			<a>View Park Species</a>
			<form name = "select_park_form" method = "post" action = "" >
				<a>Select Park<a><br>
				<select name = "park" >
					<option disabled selected value>Park</option>
					<?php
						// Get the parks
						$query = "SELECT * from parks";
						$result = mysqli_query( $park_connection, $query );

						// Print all the parks
						for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
						{
							// Fetch the result
							$fetched_result = mysqli_fetch_assoc( $result );

							// Add the option
							// Change the selected if anything was selected
							echo "<option ";
							if ( isset( $_REQUEST[ "park" ] ) )
							{
								if ( $_REQUEST[ "park" ] == $fetched_result["id"] )
									echo "selected";
							}
							echo " value = '" . $fetched_result["id"] . "'>" . $fetched_result["name"] . "</option>";
						}
					?>
				</select><br>
				<input type = "submit" name = "add" value = "Search" >
			</form>
		</div>
	<?php
	}
	else
	{
		$park_id = mysqli_real_escape_string( $park_connection, $_REQUEST[ "park" ] );

		$query = "SELECT animals.species_id, animals_species.name FROM animals LEFT JOIN animals_species ON animals.species_id = animals_species.id WHERE animals.park_id = '" . $park_id . "'";
		
		echo $query;

		$result = mysqli_query( $park_connection, $query );

		// Check if something was found
		if ( mysqli_num_rows( $result ) == 0 ) // Nothing
		{
			echo "No animals in this park";
		}
		else
		{
			// Print the species found
			for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
				echo mysqli_fetch_array( $result )["name"];
		}

		// Clear the request
		$_REQUEST = array();
	}
	?>
	</body>
</html>