<?php include 'database.php'; ?>

<?php
// This is the "prepared statement" version of this file
if (isset($_POST['task']) && isset($_POST['importance'])) {
    // sanitizeMySQL() is a custom function, written below
    $task = sanitizeMySQL($conn, $_POST['task']);
    $importance = sanitizeMySQL($conn, $_POST['importance']);
    $length = sanitizeMySQL($conn, $_POST['length']);
    $due = sanitizeMySQL($conn, $_POST['due']);
    // the prepared statement - note: 4 question marks represent
    // 4 variables we will send to database separately
    $query = "INSERT INTO list (task, importance, length, due)
    VALUES (?, ?, ?, ?)";
    // prepare the statement in db
    if ( $stmt = mysqli_prepare($conn, $query) ) {
        // bind the values to replace the 4 question marks
        // note that 6 letters in 'sssids' MUST MATCH data types in table
        // Type specification chars:
        // i - integer, s - string , d - double (decimal), b - blob
        mysqli_stmt_bind_param($stmt, 'ssis',
        $task,
        $importance,
        $length,
        $due
        );
        // executes the prepared statement with the values already set, above
        mysqli_stmt_execute($stmt);
        // close the prepared statement
        mysqli_stmt_close($stmt);
        // close db connection
        mysqli_close($conn);
    } // end if prepare
} else {
    echo "Failed to enter!";
} // end if isset
// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}
?>