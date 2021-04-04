<?php
    $title = 'View Record';
    require_once "includes/header.php";
    require_once 'includes/auth_check.php';
    require_once "db/conn.php";

    // get attendee by id
    if(!isset($_GET['id'])){
        include "includes/error.php";        
    } else {
        $id = $_GET['id'];
        $result = $crud->getAttendeesDetails($id);
?>
    <img src="<?php echo empty($result["avatar_path"]) ? "uploads/blank.png" : $result["avatar_path"]; ?>" class="rounded-circle" alt="avatar_image" style="width: 20%; height: 20%;">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php 
                    echo $result['fname'] . " ";
                    echo $result['lname']; 
                ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php 
                    echo $result['name'];                    
                ?>
            </h6>
            <p class="card-text">
                Date of birth:
                <?php 
                    echo $result['dob'];                    
                ?>
            </p>
            <p class="card-text">
                Email Address: 
                <?php 
                    echo $result['email'];                    
                ?>
            </p>
            <p class="card-text">
                Contact Number:  
                <?php 
                    echo $result['contact'];                    
                ?>
            </p>

        </div>
    </div>
    
    <a href="viewrecords.php" class="btn btn-info">Back to list</a>
    <a href="edit.php?id=<?php echo $result['id'] ?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure you want to delete this record');" href="delete.php?id=<?php echo $result['id'] ?>" class="btn btn-danger">Delete</a>


<?php } ?>

<?php require_once "includes/footer.php"; ?>