<?php 
    class crud {
        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($db_connect){
            $this->db = $db_connect;
        }

        //function to insert a new record in the attendee_tbl in the attendance_db
        public function insertAttendees ($firstname, $lastname, $dob, $specialization, $email, $contact_num){
            try {
                //define sql statement to be executed 
                $sql = "INSERT INTO `attendee_tbl`(`firstname`, `lastname`, `dob`, `specialization_fk`, `email`, `contact_num`) VALUES (:firstname, :lastname, :dob, :specialization, :email, :contact_num)";
                
                //prepare the sql statement for execution
                $statement = $this->db->prepare($sql);
                
                //bind all placeholders to the actual values
                $statement->bindparam(':firstname',$firstname);
                $statement->bindparam(':lastname',$lastname);
                $statement->bindparam(':dob',$dob);
                $statement->bindparam(':specialization',$specialization);
                $statement->bindparam(':email',$email);
                $statement->bindparam(':contact_num',$contact_num);

                //execute statement
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                //throw $th;
                return false;
            }
        }

        public function getAttendees (){
            $sql = "SELECT * FROM `attendee_tbl` inner join specialization_tbl on specialization_fk = specialization_id";
            $results =$this->db->query($sql);
            return $results;
        }

        public function getAttendeeDetails ($id){
            $sql = "SELECT * FROM `attendee_tbl` inner join specialization_tbl on specialization_fk = specialization_id where attendee_id = :id";
            $statement = $this->db->prepare($sql);
            $statement->bindparam(':id', $id);        
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        }

        public function getSpecialization (){
            $sql = "SELECT * FROM `specialization_tbl`";
            $results =$this->db->query($sql);
            return $results;
        }

       
    }


 




?>