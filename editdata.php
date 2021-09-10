<?php

    require('server.php');

    if (isset($_POST['edit']))
    {
        $bookISBN = $_POST['bookISBN'];

        $querySelect = "SELECT * FROM book WHERE bookISBN = '$bookISBN';";

        $sqlData = mysqli_query($connection, $querySelect);
        $row = mysqli_fetch_assoc($sqlData);
    }

    if(isset($_POST['update']))
    {
        $bookTitle = $_POST['bookTitle'];
        $bookISBN = $_POST['bookISBN'];
        $bookAuthor = $_POST['bookAuthor'];
        $bookPublisher = $_POST['bookPublisher'];
        $bookYrPublished = $_POST['bookYrPublished'];
        $bookCategory = $_POST['bookCategory'];

        $queryUpdate = "UPDATE book SET bookTitle='$bookTitle', bookAuthor='$bookAuthor', bookPublisher='$bookPublisher', bookYrPublished='$bookYrPublished', bookCategory='$bookCategory' WHERE bookISBN='$bookISBN';";

        $sqlUpdate = mysqli_query($connection, $queryUpdate);

        echo "<script> alert('Successfully updated!'); </script>";

        header('location: index.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data entry</title>

    <!-- css stylesheet for bootstrap design  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <?php require('navbar.php') ?>

    <div class="m-5">
        <strong>Edit Book Entry for <?php echo $bookISBN; ?></strong>

        <form action="editdata.php" method="POST">
            <label>Book Name</label>
            <input type="text" name="bookTitle" id="bookTitle" class="form-control mb-3" value="<?php echo $row['bookTitle']; ?>">
            <label>ISBN</label>
            <input type="text" name="bookISBN" id="bookISBN" class="form-control mb-3" placeholder="ISBN" value="<?php echo $row['bookTitle']; ?>">
            <label>Author</label>
            <input type="text" name="bookAuthor" id="bookAuthor" class="form-control mb-3" placeholder="Author" value="<?php echo $row['bookAuthor']; ?>">
            <label>Publisher</label>
            <input type="text" name="bookPublisher" id="bookPublisher" class="form-control mb-3" placeholder="Publisher" value="<?php echo $row['bookPublisher']; ?>">
            <label>Year Published</label>
            <input type="text" name="bookYrPublished" id="bookYrPublished" class="form-control mb-3" placeholder="Year Published" value="<?php echo $row['bookYrPublished']; ?>">
            <label>Category</label>
            <select name="bookCategory" id="bookCategory" class="form-control mb-3">
                <option value="" hidden>Choose a Category</option>
                <option value="Fiction" <?php echo $row(['bookYrPublished'] == 'Fiction' ? 'selected' : ' '); ?>>Fiction</option>
                <option value="Non-Fiction" <?php echo $row(['bookYrPublished'] == 'Non-Fiction' ? 'selected' : ' '); ?>>Non-Fiction</option>
            </select>

            <button type="submit" name="update" value="Add Book" class="btn btn-primary">Add Book</button>
        </form>
    </div>

</body>
</html>