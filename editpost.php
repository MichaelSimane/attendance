<?php 
    require_once "db/conn.php";
    if(isset($_POST['submit'])) {
        // extract values from the $_post array
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $specialty = $_POST['specialty'];
        $dob = $_POST['birth'];    
        $email = $_POST['email'];    
        $contact = $_POST['contact'];  
                
        // call crud function

        $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);

        // redirect to index.php

        if($result) {
            header("Location: viewrecords.php");   //header takes a link
        } else {
            include "includes/error.php";
        }

    }else {
        include "includes/error.php";
    }
?>
    
