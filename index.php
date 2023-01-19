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
						<p class = "option_description" >Have you achived the goal of finding another form of life? Insert it in the database and take some credits</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/insert/species.php" >Insert new Species</a>
						<p class = "option_description" >If you have discovered a new species, a great discovery, insert it in the database</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/insert/animal.php" >Insert new Animal</a>
						<p class = "option_description" >Insert a new animal in the park, specifing birthday, health and species</p>
					</div>
				</div>
			</div>
			<div class = column >
				<a class = "column_title" >Get Informations</a>
				<div class = "options_container" >
					<div class = "option" >
						<a class = "option_title" >Get Species</a>
						<p class = "option_description" >Do you want to know all the species in your park?</p>
					</div>
					<div class = "option" >
						<a class = "option_title" href = "./pages/get/age.php" >Get Animals Age</a>
						<p class = "option_description" >Select a animal and the species and the medium age will be returned to you</p>
					</div>
					<div class = "option" >
						<a class = "option_title" >Get Animals</a>
						<p class = "option_description" >Get a list of all the animals in the database</p>
					</div>
				</div>
			</div>
			<div class = column >
				<a class = "column_title" >Edit Informations</a>
				<div class = "options_container" >
					<div class = "option" >
					</div>
				</div>
			</div>
		</div>
	</body>
</html>