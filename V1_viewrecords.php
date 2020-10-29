<?php
    $title = 'View Records';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';

    //get all attendees
    $results = $crud->getAttendees();
?>

<h1 class = "text-center">Registered IT Professionals</h1>
<br>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Registration Time</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Specialization</th>
      <th scope="col">Email Address</th>
      <th scope="col">Contact Number</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
    
    <tr>
      <th scope="row"><?php echo $row['attendee_id'] ?></th>
      <td><?php echo $row['registration_time'] ?></td>
      <td><?php echo $row['firstname'] ?></td>
      <td><?php echo $row['lastname'] ?></td>
      <td><?php echo $row['dob'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['contact_num'] ?></td>
    </tr>

    <?php } ?>
  </tbody>
</table>

<?php
    require_once 'includes/footer.php';
?>