<?php
    $title = 'Index';
    require_once "includes/header.php";
    require_once "db/conn.php";

    $results = $crud->getSpecialties();
?>    
    <h1 class="text-center">Registration for IT Conference</h1>

    <form action="success.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" required>                
        </div>

        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" required>
        </div>

        <div class="form-group">
            <label for="birth">Date of Birth</label>
            <input type="text" class="form-control" id="birth" name="birth" required>               
        </div>

        <div class="form-group">
            <label for="specialty">Specialty</label>
            <select id="specialty" class="form-control" name="specialty" required>

                <?php 
                    while($r = $results->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                <?php }?>
                    
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>                
        </div>

        <div class="form-group">
            <label for="contact">Contact number</label>
            <input type="text" class="form-control" id="contact" name="contact" required>
        </div>

        <div class="custom-file">            
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar"/>
            <label class="custom-file-label" for="avatar">Choose File</label>
            <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
        </div>
        <br>
        <br>        

        <button class="btn btn-primary" name="submit">Submit</button>
    </form>

<?php require_once "includes/footer.php"; ?>