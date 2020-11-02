
    <?php
        $title = 'Edit Records';
        require_once 'includes/header.php';
        require_once 'db/db_connect.php';

        //get all specialization
        $results = $crud->getSpecialization();

        if (!isset($_GET['id'])) {
            //echo '<h1 class = "text-center text-danger">Please check details and try again.</h1>';
            include 'includes/error_message.php';
        } else {
            $id = $_GET['id'];
            $attendee = $crud->getAttendeeDetails($id);
    ?>
    
    <h1 class = "text-center">Edit Attendee Details</h1>

    <form method="post" action="editpost.php" autocomplete="off">
        <input type="hidden" id="id" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        <input type="hidden" id="registration_time" name="registration_time" value="<?php echo $attendee['registration_time'] ?>" />

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname" aria-describedby="firstname"  required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname" aria-describedby="lastname"  required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dob'] ?>" id="dob" name="dob" aria-describedby="dob" required>
            <small id="dobHelp" class="form-text text-muted">The minimum age is 16 years old.</small>
        </div>
        <!-- Pull List From Database -->
        <div class="form-group">    
            <label for="specialization">Specialization</label>
                <select class="form-control" value="<?php echo $attendee['specialization_id'] ?>" id="specialization" name="specialization" required>
                   
                    <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['specialization_id'] ?>"
                            <?php 
                                if ($row['specialization_id'] == $attendee['specialization_id']) echo 'selected'
                            ?>>
                            <?php echo $row['name'] ?>
                        </option>
                    <?php } ?>
                
                </select>
            <small id="specializationHelp" class="form-text text-muted">Select your specialization/s.</small>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="email" name="email" aria-describedby="emailHelp"  required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="contact_num">Contact Number</label>
            <input type="tel" class="form-control" value="<?php echo $attendee['contact_num'] ?>" id="contact_num" name="contact_num" aria-describedby="contact_numHelp" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
            <small id="contact_numHelp" class="form-text text-muted">We'll never share your contact number with anyone else. (format: 123-456-7890)</small>
        </div>
        <button type="submit" name="submit" class="btn btn-info btn-block">View List</button>
        <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
    </form>

    <?php } ?>
   
    <?php
        require_once 'includes/footer.php';
    ?>