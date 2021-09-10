<?php

    $host = "localhost";
    $root = "root";
    $password = "M@rielle9891";
    $database = "book_database";
    $port = "3306";

    $connection = mysqli_connect($host, $root, $password, $database, $port);

    if (mysqli_connect_error())
    {
        echo "Unable to connect to MySQL. " + mysqli_connect_error();
    }

?>