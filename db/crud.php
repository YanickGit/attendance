<?php 
    class crud {
        //private database object
        private $db;

        private $active = "1";
        private $softDelete = "0";
        private $softDeleteFK = "4";
        private $activateFK = "3";
        

        //constructor to initialize private variable to the database connection
        function __construct($db_connect){
            $this->db = $db_connect;
        }

        //function to insert a new record in the attendee_tbl in the attendance_db
        public function insertAttendees ($firstname, $lastname, $imgpath, $dob, $specialization, $email, $contact_num){
            try {
                //define sql statement to be executed 
                $sql = "INSERT INTO `attendee_tbl`(`firstname`, `lastname`, `imgpath`, `dob`, `specialization_fk`, `email`, `contact_num`) 
                VALUES (:firstname, :lastname, :imgpath, :dob, :specialization, :email, :contact_num)";
                
                //prepare the sql statement for execution
                $statement = $this->db->prepare($sql);
                
                //bind all placeholders to the actual values
                $statement->bindparam(':firstname',$firstname);
                $statement->bindparam(':lastname',$lastname);
                $statement->bindparam(':imgpath',$imgpath);
                $statement->bindparam(':dob',$dob);
                $statement->bindparam(':specialization',$specialization);
                $statement->bindparam(':email',$email);
                $statement->bindparam(':contact_num',$contact_num);

                //execute statement
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id, $firstname, $lastname, $imgpath, $dob, $specialization, $email, $contact_num, $status1){
            try {
                $sql = "UPDATE `attendee_tbl` 
                SET `firstname`=:firstname,`lastname`=:lastname, `imgpath`=:imgpath, `specialization_fk`=:specialization,`dob`=:dob,`email`=:email,`contact_num`=:contact_num, `status_fk`=:status1 
                WHERE attendee_id = :id";

             //bind all placeholders to the actual values
                
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id',$id);              
                $statement->bindparam(':firstname',$firstname);
                $statement->bindparam(':lastname',$lastname);
                $statement->bindparam(':imgpath',$imgpath);
                $statement->bindparam(':dob',$dob);
                $statement->bindparam(':specialization',$specialization);
                $statement->bindparam(':email',$email);
                $statement->bindparam(':contact_num',$contact_num);
                $statement->bindparam(':status1',$status1);

             $statement->execute();
             return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees (){
            try {
                $sql = "SELECT * FROM `attendee_tbl` 
                inner join specialization_tbl on specialization_fk = specialization_id 
                inner join status_tbl on status_fk = status_id
                where status_tbl.status_num = $this->active";

                $results =$this->db->query($sql);
                return $results;
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getDeletedAttendees (){
            try {
                $sql = "SELECT * FROM `attendee_tbl` 
                inner join specialization_tbl on specialization_fk = specialization_id 
                inner join status_tbl on status_fk = status_id
                where status_tbl.status_num = $this->softDelete";

                $results =$this->db->query($sql);
                return $results;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails ($id){
            try {
                $sql = "SELECT * FROM `attendee_tbl` 
                inner join specialization_tbl on specialization_fk = specialization_id 
                inner join status_tbl on status_fk = status_id
                where attendee_id = :id";

                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id', $id);        
                $statement->execute();
                $result = $statement->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id){
            try {
                $sql = "DELETE FROM `attendee_tbl` 
                WHERE attendee_id = :id";

                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id', $id);        
                $statement->execute();
                return true;    
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteSoftAttendee($id){
            try {
                $sql = "UPDATE `attendee_tbl` 
                SET `status_fk`= $this->softDeleteFK
                WHERE attendee_id = :id";

                //bind all placeholders to the actual values
                   
                   $statement = $this->db->prepare($sql);
                   $statement->bindparam(':id',$id);              
                      
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function activateAttendee($id){
            try {
                $sql = "UPDATE `attendee_tbl` 
                SET `status_fk`= $this->activateFK
                WHERE attendee_id = :id";

                //bind all placeholders to the actual values
                   
                   $statement = $this->db->prepare($sql);
                   $statement->bindparam(':id',$id);              
                      
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialization (){
            try {
                $sql = "SELECT * FROM `specialization_tbl`";
                $results =$this->db->query($sql);
                return $results;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecializationId ($id){
            try {
                $sql = "SELECT * FROM `specialization_tbl`
                WHERE specialization_id = :id";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id',$id);              
                $statement->execute();
                return true;
                
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getStatus (){
            try {
                $sql = "SELECT * FROM `status_tbl`";
                $resultsStatus =$this->db->query($sql);
                return $resultsStatus;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
        
?>