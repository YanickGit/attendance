
    <?php
        $title = 'Index';
        require_once 'includes/header.php';
    ?>
    
    <h1 class = "text-center">IT Conference Registration</h1>

    <!--
        Form Fields
        - FirstName
        - LastName
        - Date of Birth (Use Date Picker)
        - Specialty (Database Admin, Software Developer, Web Administrator, Other)
        - Email Address
        - Contact Number
    -->

    <form autocomplete="off">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" aria-describedby="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" aria-describedby="lastname" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" id="dob" aria-describedby="dob" required>
            <small id="dobHelp" class="form-text text-muted">The minimum age is 16 years old.</small>
        </div>
        <!-- Pull List From Database -->
        <div class="form-group">    
            <label for="specialization">Specialization</label>
                <select multiple class="form-control" id="specialization" required>
                    <option>Database Administrator</option>
                    <option>Software Developer</option>
                    <option>Web Administrator</option>
                    <option>SaaS Provider</option>
                    <option>Other</option>
                </select>
            <small id="specializationHelp" class="form-text text-muted">Select your specialization/s.</small>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="tel" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your contact number with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        <button type="reset" class="btn btn-warning btn-block">Reset</button>
        

       <!--
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="reset" class="btn btn-primary btn-block">Reset</button>
            </div>
            <div class="btn-group">
            
            </div>
        </div>
        -->
            
    </form>
   
    <?php
        require_once 'includes/footer.php';
    ?>