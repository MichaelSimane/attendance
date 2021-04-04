<!-- crud  create read update and delete  -->
<?php 
    class crud{
        private $db;

        // constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $avatar_path){
            try {
                $sql = 'INSERT INTO attendee(fname, lname, dob, email, contact, specialty_id, avatar_path)VALUE(:fname, :lname, :dob, :email, :contact, :specialty,:avatar_path)';
                $stmt = $this -> db->prepare($sql);

                $stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
                $stmt->bindParam(':dob', $dob);                
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':contact', $contact);
                $stmt->bindParam(':specialty',$specialty);
                $stmt->bindParam(':avatar_path',$avatar_path);

                $stmt->execute();

                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees() {
            try {
                $sql = "SELECT * FROM attendee INNER JOIN specialty on attendee.specialty_id=specialty.specialty_id";
                $result = $this->db->query($sql);
    
                return $result;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }           
        }

        public function getSpecialties() {
            try {
                $sql = "SELECT * FROM specialty";
                $result = $this->db->query($sql);

                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }            
        }

        public function getAttendeesDetails($id) {
            try {
                $sql = "SELECT * from attendee INNER JOIN specialty on attendee.specialty_id=specialty.specialty_id where id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $result = $stmt->fetch();

                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }            
        }

        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty) {
            try {
                $sql = "UPDATE `attendee` SET `fname`=:fname,`lname`=:lname,`dob`=:dob,`specialty_id`=:specialty,`email`=:email,`contact`=:contact WHERE id=:id";

                $stmt = $this -> db->prepare($sql);

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
                $stmt->bindParam(':dob', $dob);
                $stmt->bindParam(':specialty',$specialty);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':contact', $contact);

                $stmt->execute();

            return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function deleteAttendee($id) {
            try {
                $sql = "DELETE FROM attendee WHERE id = :id";

                $stmt = $this -> db->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

    }
?>

