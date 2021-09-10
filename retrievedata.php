<?php

    require('server.php');

    $sort = 'ASC';
    $column = 'bookTitle';

    if(isset($_GET['column']) && isset($_GET['sort']))
    {
        $column = $_GET['column'];
        $sort= $_GET['sort'];

        $sort == 'ASC' ? $sort = 'DESC' : $sort = 'ASC';
    }

    $querySelect = "SELECT * FROM book ORDER BY $column $sort;";
    $sqlData = mysqli_query($connection, $querySelect);

?>