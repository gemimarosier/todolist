<?php include 'database.php'; ?>

<?php
// this scripts updates an exisiting record based on the id
if ( isset($_POST['id']) && isset($_POST['task']) ) {
    // sanitizeMySQL() is a custom function, written below
    // these values came from the form
    $id = sanitizeMySQL($conn, $_POST['id']);
    $task = sanitizeMySQL($conn, $_POST['task']);
    $importance = sanitizeMySQL($conn, $_POST['importance']);
    $length = sanitizeMySQL($conn, $_POST['length']);
    $due = sanitizeMySQL($conn, $_POST['due']);
    // the prepared statement - note: question marks represent
    // variables we will send to database separately
    // we don't check which fields the user changed - we just update all
    $query = "UPDATE list SET task = ?,
        importance = ?,
        length = ?,
        due = ?
    WHERE id = ?";
    // prepare the statement in db
    if ( $stmt = mysqli_prepare($conn, $query) ) {
        // bind the values to replace the question marks
        // the order matters! so id is at end!
        // note that 7 letters in 'sssidsi' MUST MATCH data types in table
        // Type specification chars:
        // i - integer, s - string , d - double (decimal), b - blob
        mysqli_stmt_bind_param($stmt, 'ssisi',
        $task,
        $importance,
        $length,
        $due,
        $id
        );
        // executes the prepared statement with the values already set, above
        mysqli_stmt_execute($stmt);
        // close the prepared statement
        mysqli_stmt_close($stmt);
        // close db connection
        mysqli_close($conn);
    }
} else {
    echo "Failed to update!";
}
// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}
?>