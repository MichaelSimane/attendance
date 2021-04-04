<?php 
    require_once 'includes/auth_check.php';
    require_once "db/conn.php";
    if(!$_GET['id']) {
        include "includes/error.php";
        header("Location: viewrecords.php");
    } else {
        $id = $_GET['id'];

        // call delete function
        $result = $crud->deleteAttendee($id);
        // redirect 

        if($result) {
            header("Location: viewRecords.php");
        } else {
            include 'includes/erro.php';
        }
    }
?>
    
