<?php
    $title = 'Edit';
    require_once "includes/header.php";
    require_once 'includes/auth_check.php';
    require_once "db/conn.php";

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        include "includes/error.php";
        header("Location: viewrecords.php");
    } else {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeesDetails($id);    
    
?>
    <h1 class="text-center">Edit Record</h1>

    <form action="editPost.php" method="post">        
        <input type="hidden" name="id" value="<?php echo $attendee['Id'] ?>" >
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['fname'] ?>" id="fname" name="fname" required>                
        </div>

        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lname'] ?>" id="lname" name="lname" required>
        </div>

        <div class="form-group">
            <label for="birth">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dob'] ?>" id="birth" name="birth" required>               
        </div>

        <div class="form-group">
            <label for="specialty">Specialty</label>
            <select id="specialty" class="form-control" name="specialty" required>
                <?php 
                    while($r = $results->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
                        <?php echo $r['name'] ?>
                    </option>
                <?php }?>
                    
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="email" name="email" required>                
        </div>

        <div class="form-group">
            <label for="contact">Contact number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contact'] ?>" id="contact" name="contact" required>
        </div>

        <button class="btn btn-success" name="submit">Save Changes</button>
    </form>

<?php } ?>


<?php require_once "includes/footer.php"; ?>