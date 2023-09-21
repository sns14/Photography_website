<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // Assuming you have collected user input and stored it in variables
    $email = $_POST["email"];

    // Validate and sanitize the email (you can add more validation as needed)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save the email to a database, file, or perform any desired action
        // For demonstration purposes, we'll just print the email here
        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


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


        $conn->close();
        echo "Email saved: " . $email;
    } else {
        // Email is not valid
        http_response_code(400); // Bad Request
        echo "Invalid email format";
    }


} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>