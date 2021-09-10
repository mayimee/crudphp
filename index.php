<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
		<!-- css stylesheet for bootstrap design  -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>

	<body>

		<?php 
		
			require('navbar.php');
			require('retrievedata.php');

		?>
		
		<main class="p-4">

			<table class="table table-striped table-bordered table-hover">

				<tr class="text-center">
					<th><a href="?column=bookTitle&sort=<?php echo $sort; ?>">Title</a></th>
					<th><a href="?column=bookISBN&sort=<?php echo $sort; ?>">ISBN</a></th>
					<th><a href="?column=bookAuthor&sort=<?php echo $sort; ?>">Author</a></th>
					<th><a href="?column=bookPublisher&sort=<?php echo $sort; ?>">Publisher</a></th>
					<th><a href="?column=bookYrPublished&sort=<?php echo $sort; ?>">Year Published</a></th>
					<th><a href="?column=bookCategory&sort=<?php echo $sort; ?>">Category</a></th>
					<th class="col-3">Actions</th>
				</tr>

				<?php

					while ($row = mysqli_fetch_array($sqlData)){
				
				?>

				<tr>
					<td><?php echo $row['bookTitle']; ?></td>
					<td><?php echo $row['bookISBN']; ?></td>
					<td><?php echo $row['bookAuthor']; ?></td>
					<td><?php echo $row['bookPublisher']; ?></td>
					<td><?php echo $row['bookYrPublished']; ?></td>
					<td><?php echo $row['bookCategory']; ?></td>

					<td class="text-center col-3">
						<form action="editdata.php" method="POST" class="mb-1">
							
							<button type="submit" name="edit" class="btn btn-success col-5">Edit</button>
							<input type="text" hidden name="edit" value="<?php echo $row['bookISBN']; ?>">

						</form>

						<form action="deletedata.php" method="POST">

							<button type="submit" name="deletedata" onClick="return (confirm('Do you want to delete this book?'));" class="btn btn-danger col-5">Delete</button>
							<input type="text" hidden name="delete" value="<?php echo $row['bookISBN']; ?>">

						</form>
						
					</td>
				</tr>

				<?php } ?>

			</table>

		</main>

	</body>
	
	<!-- javascript library for bootstrap design  -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>