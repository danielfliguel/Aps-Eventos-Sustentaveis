<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP CRUD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<?php require_once 'process.php'?> 
	<?php 
	$conn = new PDO("mysql:dbname=crud;host=mysql","root","123456");
	$stmt = $conn->prepare("SELECT * FROM data") or die($mysqli->error);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	?>

	<h1>Usuários Cadastrados</h1>
	
	<table class="table">
		<tr>
			<td>Marcelo Viado</td>
			<td>Localização</td>	
		</tr>
		<?php foreach ($results as $row):?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['location'] ?></td>
				<td><a href="process.php?edit=<?php echo $row['ID'];?>" class="btn btn-primary">Editar</a></td>
				<td><a href="process.php?delete=<?php echo $row['ID'];?>" class="btn btn-danger">Remover</a></td>
			</tr>		
		<?php endforeach; ?>
	</table>
	<?php 
	

	?>	

	<div class="row justify-content-center">
		<form action="process.php" method="post">
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" value="Enter your name">
			</div>
			<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control" value="Enter your location">	
			</div>
			<div class="form-group">
				<button type="submit" name="save" class="btn btn-primary">Save</button>		
			</div>	
		</form>	
	</div>
	
	
</body>
</html>