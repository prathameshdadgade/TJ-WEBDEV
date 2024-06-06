
<?php
define("hname", "localhost");
define("uname", "root");
define("pass", "");
define("db", "hbwebsite");

$con = mysqli_connect(hname, uname, pass, db);
if (!$con) {
    die("Cannot Connect to Database: " . mysqli_connect_error());
} 

if (isset($_POST['send'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Debug: Print form data
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Subject: $subject<br>";
    echo "Message: $message<br>";

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO `contact_details`(`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";

    // Debug: Print SQL query
    echo "SQL Query: $sql<br>";

    // Execute the SQL statement
    if (mysqli_query($con, $sql)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}


// Close the database connection
mysqli_close($con);
?>




  
