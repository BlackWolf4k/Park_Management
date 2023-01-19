<!DOCTYPE html>
<html>
	<head>
		<title>Park Menagement</title>
		<link rel = "stylesheet" href = "style/style.css" >
	</head>
	<body>
		<div class = "page_header" >
			<a class = "page_header_title" >Welcone to Park Manegment</a>
		</div>

		<div class = "columns_holder" >
			<div class = "column" >
				<a class = "column_title" >Set Informations</a>
				<div class = "options_container" >
					<div class = "option" >
						<a class = "option_title" href = "./pages/insert/order.php" >Insert new Order</a>
						<p class = "option_description" >Have you achived the goal of finding another form of life?<br>Congraturations!<br>Now insert it in the database and take some credits</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/insert/species.php" >Insert new Species</a>
						<p class = "option_description" >If you have discovered a new species, a great discovery, insert it in the database</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/insert/animal.php" >Insert new Animal</a>
						<p class = "option_description" >A new animal joined our park?<br>Insert and specify birthday, health and species</p>
					</div>
				</div>
			</div>
			<div class = column >
				<a class = "column_title" >Get Informations</a>
				<div class = "options_container" >
					<div class = "option" >
						<a class = "option_title" href = "./pages/get/species.php" >Get Species</a>
						<p class = "option_description" >Do you want to know all the species in your park?</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/get/age.php" >Get Animals Age</a>
						<p class = "option_description" >If you want to know the medium age of a species in the park, this is the page for you</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/get/animals.php" >Get Animals</a>
						<p class = "option_description" >Get a list of all the animals in the database</p>
					</div>
				</div>
			</div>
			<div class = column >
				<a class = "column_title" >Edit Informations</a>
				<div class = "options_container" >
					<div class = "option" >
						<a class = "option_title" href = "./pages/other/work_in_progress.php" >Edit Order</a>
						<p class = "option_description" >Someone mispelled a order name?<br>Don't worry, just edit it<br>( It is possible to delete it too )</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/other/work_in_progress.php" >Edit Species</a>
						<p class = "option_description" >There was an error typing a species name?<br>Edit it, but this time check twice what ypu have written<br>( It is possible to delete it too )</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/other/work_in_progress.php" >Edit Animal</a>
						<p class = "option_description" >Have you inserted some wrong informations about a animal? Make them correct<br>( It is possible to delete it too )</p>
					</div>
					<!--<div class = "option" >
						<a class = "option_title" href = "" ></a>
						<p class = "option_description" ></p>
					</div>-->
				</div>
			</div>
		</div>
	</body>
</html>