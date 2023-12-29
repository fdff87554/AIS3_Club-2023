<?php

$databaseConnection = null;

function getConnect()
{
    $hosthome = "db";
    $database = "txone_target";
    $username = "txone";
    $password = "tx0ne_TargEt_2023";
    global $databaseConnection;
    $databaseConnection = @mysqli_connect($hosthome, $username, $password, $database);

    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    mysqli_set_charset($databaseConnection, "utf8");
}

function closeConnect()
{
    global $databaseConnection;
    if ($databaseConnection) {
        mysqli_close($databaseConnection) or die(mysqli_error($databaseConnection));
    }
}
