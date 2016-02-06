<?php include 'database.php'; ?>
<?php
	$query = "SELECT * FROM list ORDER BY due";
	$tasks = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> My To Do List </title>
    <link rel="stylesheet" href="css/form/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/index.css">
 
</head>

<body id="index">
<div class="container">

<div class="row">

<div class="col-sm-12">




<h1>My To-Do list</h1>

<p class="middle"><a href="enter_new_task.php">Add a new task</a></p>

<p class="middle">To update or delete a task, select it below and then
	click the Submit button at the bottom of the list.</p>

<form class="smallform" method="post" action="task_edit.php" autocomplete="off">
<table class="table table-hover">
    <tr>
        <th>Select</th>
        <th>Task</th>
        <th>Importance</th>
        <th>Length</th>
        <th>Due</th>
    </tr>

<!-- begin PHP while-loop to display database query results
     with each row enclosed in LI tags -->
<?php while( $row = mysqli_fetch_assoc($tasks) ) :  ?>

<tr>
    <td><input type="radio" name="id" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"></td>
	<!-- notice how, above, the database record id becomes
		 the id and value of the radio button -->
    <td><?php echo stripslashes($row['task']); ?></td>
    <td><?php echo $row['importance']; ?></td>
    <td><?php echo $row['length']; ?></td>
    <td><?php echo $row['due']; ?></td>
</tr>

<?php endwhile;  ?>
<!-- end the PHP while-loop
     everything else on this page is normal HTML -->

</table>

<input  type="submit" id="submit" value="Edit a Task">
</form>

<p class="middle"><a href="enter_new_task.php">Add a new task</a></p>



</div>
</div>
</div>
</body>
</html>