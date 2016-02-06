<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> To Do List - Enter </title>
    <link rel="stylesheet" href="css/form/bootstrap.min.css">
     <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> 
</script>
    <script src="js/enter.js"></script>
</head>

<body id="index">
<div class="container">

<div class="row">

<div class="col-sm-12">


<h1>  My To-do List</h1>
 
 <h4>Enter New Task</h4>

<p class="middle"><a href="view_checklist.php">View all tasks</a></p>

<div id="tasks">

<form id="taskform"  method="post" autocomplete="off"> 
<!-- autocomplete="off" ensures form will be empty if user clicks
     the browser's Back button -->
     
     <div class="form-group">
    <label for="task">Task</label> 
	<input type="text"  class="form-control" name="task" id="task" maxlength="140" required></div>
	
	
	<div class="form-group">
	<label for="length"> Importance </label>
    <select  class="form-control" name="importance" id="importance" required>
        <option value="high"> High</option>
        <option value="low">Low</option>
        <option value="neutral">Neutral</option>
    </select>
   </div>
	
	<div class="form-group">
    <label for="Length"> Length(in minutes) </label> 
	<input class="form-control" type="number" name="length" id="length" max="999" required></div>
	
	
	<div class="form-group">
     <label for="due"> When's it due?(MM/DD) </label> 
	<input class="form-control" type="date" name="due" id="due" maxlength="20" required> </div>
	



	<input  type="submit" id="submit" value="Submit">
	
</form>

</div>

<div id="response">
    <p class="announce">Thanks for submitting the form!</p>
    <p class="middle"><a href="enter_new_task.php">Return to the form</a></p>
</div>



</div>
</div>
</div>

</body>
</html>