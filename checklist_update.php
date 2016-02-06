<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Update Task </title>
    <link rel="stylesheet" href="css/form/bootstrap.min.css">
      <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="js/update.js"></script>
</head>

<body id="index">
<div class="container">

<div class="row">

<div class="col-sm-4">

<div id="container">

<h1>Update Task</h1>


<div id="inner_content">

<?php
// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}
// check if _choice_ was sent here via POST ...
if ( isset($_POST['choice']) ) {
    $choice = $_POST['choice'];
    // OPTION 1 - delete
    // check if delete record was selected ...
    if ($choice == "delete") {
        // sanitize the id
        $id = sanitizeMySQL($conn, $_POST['id']);
?>
<!-- start plain HTML -->

        <form id="taskdelete" class="smallform" method="post"  action="view_checklist.php" autocomplete="off">
            <p>Are you sure you want to DELETE this task?</p>

            <p><div class="form-group"><label>
            <input type="radio" name="destroy" id="yes" value="yes"> Yes, delete this task</label></div></p>

            <p><div class="form-group"><label>
            <input type="radio" name="destroy" id="no" value="no"> No, do not delete it</label></div></p>

            <!-- pass _id_ value to the next script -->
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

            <input type="submit" id="submit" value="Submit">
        </form>

<?php
    // end of the ($choice == "delete") code
    // OPTION 2 - update
    // check if update record was selected ...
    } else if ($choice == "update") {
        // create PHP variables from the hidden form values
        $id = sanitizeMySQL($conn, $_POST['id']);
        // these are simply written into the form on THIS page, below
        // and so I did not sanitize them
        $task = $_POST['task'];
        $importance = $_POST['importance'];
        $length = $_POST['length'];
        $due = $_POST['due'];
?>
        <!-- switch from PHP to HTML
             show entire form with the PHP values filled in ...
             note: the select options employ abbreviated PHP if-statements
             which are nec. to insert "selected" in the option tag
             -->

        <p class="middle">Make changes in one or more fields. Then
        click the Update Task button.</p>

        <div id="tasks">

        <form id="taskupdate" method="post" action="view_checklist.php" autocomplete="off">
            <!-- retain id to be passed to JS file -->
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div class="form-group"><label for="task"> Task </label>
            <input class="form-control" type="text" name="task" id="task" maxlength="20" required value="<?php echo stripslashes($task) ?>"> </div>
            <!-- previously any single quote was escaped with a backslash
                 we use stripslashes() to get rid of the slashes -->

            <div class="form-group"><label for="importance"> Importance </label>
            <select class="form-control" name="importance" id="importance" required>
            <!-- each option requires this test to see if value matches:
                 if value of $style == (some value), then write "selected"
                 into the option tag - only one will be selected
                 -->
                 <option value="" <?php echo $importance == "" ? " selected" : ""; ?>></option>
                 <option value="high" <?php echo $importance == "high" ? " selected" : ""; ?>>high</option>
                 <option value="low" <?php echo $importance == "low" ? " selected" : ""; ?>>low</option>
                 <option value="neutral" <?php echo $importance == "neutral" ? " selected" : ""; ?>>neutral</option>
             </select></div>

             <div class="form-group"><label for="length">Length </label>
             <input class="form-control" type="number" name="length" id="length" max="999" required value="<?php echo $length ?>"></div>

             <div class="form-group"><label for="due"> When's it due? </label>
             <input class="form-control" type="date" name="due" id="due" maxlength="20" required value="<?php echo $due ?>"></div>


         	<input type="submit" id="submit" value="Update Record">
         </form>
     </div> <!-- close the socks div -->

<?php
    } // end of if ($choice = "update")
} else {
    // if _choice_ was NOT sent here via POST, write a message with HTML
    // break out of PHP to write HTML next ...
?>

    <p class='announce'>No task was selected!</p>


<?php
// return to PHP just to close the if-statement
} // end of if-else isset($_POST['choice'])
?>
</div> <!-- close inner_content -->

<!-- below will print no matter what -->

<p class="middle"><a href="view_checklist.php">View To Do List</a></p>

<p class="middle"><a href="enter_new_task.php">Add a new task</a></p>

</div> <!-- close container -->
</div>
</div>
</div>
</body>
</html>