<?php

    require('server.php');
    require('retrievedata.php');
    
    if (isset($_GET['delete']))
    {
        $bookISBN = $_GET['bookISBN'];
        echo $bookISBN;
        $querySelect = "DELETE FROM book WHERE bookISBN = '$bookISBN';";
        $sqlData = mysqli_query($connection, $querySelect);

        echo "<script> alert('Successfully deleted the book.'); </script>";
    }
    
?>