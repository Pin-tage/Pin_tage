<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $charset = 'utf8mb4';

    $dbhost = 'localhost';
    $dbid = 'test';
    $dbpw = '1111';
    $db = 'testdb';
    $dbport = '3307';

    $conn = mysqli_connect($dbhost, $dbid, $dbpw, $db, $dbport);

    if (!$conn) {
        die("연결 실패: " . mysqli_connect_error());
    } else {
        // echo "연결 성공"."<br>";
    }
?>