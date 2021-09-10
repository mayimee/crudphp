<?php

    require('retrievedata.php');
    require('server.php');

    if (isset($_POST['add']))
    {
        $bookTitle = $_POST['bookTitle'];
        $bookISBN = $_POST['bookISBN'];
        $bookAuthor = $_POST['bookAuthor'];
        $bookPublisher = $_POST['bookPublisher'];
        $bookYrPublished = $_POST['bookYrPublished'];
        $bookCategory = $_POST['bookCategory'];

        $queryInsert = "INSERT INTO book (bookTitle, bookISBN, bookAuthor, bookPublisher, bookYrPublished, bookCategory) VALUES ('$bookTitle', '$bookISBN', '$bookAuthor', '$bookPublisher', '$bookYrPublished', '$bookCategory');";

        $sqlInsert = mysqli_query($connection, $queryInsert) OR trigger_error('Query failed. ' . $query);

        echo "<script> alert('You added a new book.') </script>";

        echo "<script> window.location.href = 'index.php'; </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new entry</title>

    <!-- css stylesheet for bootstrap design  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <?php require('navbar.php') ?>

    <div class="m-5">
        <strong>New Book Entry</strong>

        <form action="create.php" method="POST">
            <input type="text" name="bookTitle" id="bookTitle" class="form-control mb-3" placeholder="Book Title">
            <input type="text" name="bookISBN" id="bookISBN" class="form-control mb-3" placeholder="ISBN">
            <input type="text" name="bookAuthor" id="bookAuthor" class="form-control mb-3" placeholder="Author">
            <input type="text" name="bookPublisher" id="bookPublisher" class="form-control mb-3" placeholder="Publisher">
            <input type="text" name="bookYrPublished" id="bookYrPublished" class="form-control mb-3" placeholder="Year Published">
            <select name="bookCategory" id="bookCategory" class="form-control mb-3">
                <option value="" hidden>Choose a Category</option>
                <option value="Fiction">Fiction</option>
                <option value="Non-Fiction">Non-Fiction</option>
            </select>

            <button type="submit" name="add" value="Add Book" class="btn btn-primary">Add Book</button>
        </form>
    </div>

</body>
</html>