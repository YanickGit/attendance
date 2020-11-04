<?php
    $title = 'View Deleted Records';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';

    //get all attendees
    $results = $crud->getDeletedAttendees();
?>

<h1 class = "text-center">Deleted IT Professionals</h1>
<br>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Specialization</th>
      <th scope="col">Status</th>
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
      <td><?php echo $row['status_fk'] ?></td>
      <td>
        <a href ="view.php?id=<?php echo $row['attendee_id'] ?>" class ="btn btn-primary">View</a>
        <a href ="edit.php?id=<?php echo $row['attendee_id'] ?>" class ="btn btn-warning">Edit</a>
        <!--
          <a onclick="return confirm('WARNING: You are about to delete a record. Are you sure?');" href ="delete.php?id=?php echo $row['attendee_id'] ?>" class ="btn btn-danger">Delete</a> 
        -->
        <a href ="viewrecords.php" class ="btn btn-success">List</a>
      </td>
    </tr>
    <?php } ?>
  </tbody> 
</table>
<br>
<a href ="viewrecords.php" class ="btn btn-warning btn-block">View List</a>
<?php
    require_once 'includes/footer.php';
?>