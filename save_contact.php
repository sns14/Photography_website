<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$email1=$_POST['email'];
// Insert data into the table
$sql = "INSERT INTO users (fname, lname, email, phonenumber, subject, message)
        VALUES ('$fname','$lname','$email', '$phonenumber', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Assuming you have collected user input and stored it in variables
$subscribe = isset($_POST['Subscription']) ? TRUE : FALSE; // Checkbox value


// Prepare and execute the SQL query
$query = "INSERT INTO subscription (email, subscribe)
VALUES ('$email', '$subscribe')
ON DUPLICATE KEY UPDATE
  subscribe = VALUES(subscribe)";

if ($conn->query($query) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// if ($stmt) {
//     mysqli_stmt_bind_param($stmt, "si", $email, $subscribe);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);

//     // Close the database connection
//     mysqli_close($connection);

//     // Redirect to a success page or do other processing
//  //   header("Location: success.php");
//     exit();
// } else {
//     // Handle SQL query preparation error
//     die("SQL query preparation failed: " . mysqli_error($connection));
// }

// Close the connection
$conn->close();
?>