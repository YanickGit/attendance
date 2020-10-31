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
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Specialization</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
    
    <tr>
      <th scope="row"><?php echo $row['attendee_id'] ?></th>
      <td><?php echo $row['firstname'] ?></td>
      <td><?php echo $row['lastname'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td>
        <a href ="view.php?id=<?php echo $row['attendee_id'] ?>" class ="btn btn-primary">View</a>
        <a href ="edit.php?id=<?php echo $row['attendee_id'] ?>" class ="btn btn-warning">Edit</a>
        <!--
          <a onclick="return confirm('WARNING: You are about to delete a record. Are you sure?');" href ="delete.php?id=?php echo $row['attendee_id'] ?>" class ="btn btn-danger">Delete</a> 
        -->
        <a href ="viewdelete.php?id=<?php echo $row['attendee_id'] ?>" class ="btn btn-danger">Delete</a>
      </td>
    </tr>

    <?php } ?>
  </tbody> 
</table>

<?php
    require_once 'includes/footer.php';
?>