<?php
    $title = 'success';
    require_once "includes/header.php";
    require_once "db/conn.php";

    if(isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $specialty = $_POST['specialty'];
        $dob = $_POST['birth'];    
        $email = $_POST['email'];    
        $contact = $_POST['contact'];        
        
        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file, $destination);

        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $destination);        

        if($isSuccess) {
            include "includes/successMessage.php";
        }else {
            include "includes/error.php";
        }
    }
?>

    <img src="<?php echo $destination; ?>" class="rounded-circle" alt="avatar_image" style="width: 20%; height: 20%;">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php 
                    echo $_POST['fname'] . " ";
                    echo $_POST['lname']; 
                ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php 
                    echo $_POST['specialty'];                    
                ?>
            </h6>
            <p class="card-text">
                Date of birth:
                <?php 
                    echo $_POST['birth'];                    
                ?>
            </p>
            <p class="card-text">
                Email Address: 
                <?php 
                    echo $_POST['email'];                    
                ?>
            </p>
            <p class="card-text">
                Contact Number:  
                <?php 
                    echo $_POST['contact'];                    
                ?>
            </p>
        </div>    

<?php require_once "includes/footer.php"; ?>