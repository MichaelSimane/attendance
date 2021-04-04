<?php 
    // same to localhost
    // $host = "127.0.0.1"; 
    // $db = "attendance_db";
    // $user = "root";
    // $pass = "";
    // $charset = 'utf8mb4';

    //same to remote database
    $host = "remotemysql.com"; 
    $db = "nYBDlGZnyN";
    $user = "nYBDlGZnyN";
    $pass = "h2kgAF6PJU";
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";  //short for data source name

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "<h1 class='text-danger text-center'>No database found</h1>";
        // throw new PDOException($e -> getMessage());  //its gone stop execution
    }
    
    require_once "crud.php";
    require_once "User.php";
    $crud = new crud($pdo);
    $User = new User($pdo);

    $User->insertUser("admin","password");
?>