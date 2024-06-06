<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essenials.php');


if (isset($_POST['submit'])) {
    $data = filteration($_POST);

    // Match password and confirm password
    if ($data['pass'] != $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // Assuming $con is your database connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $uExistQuery = "SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1";
    $stmt = $con->prepare($uExistQuery);
    $stmt->bind_param("ss", $data['email'], $data['phonenum']);
    $stmt->execute();
    $u_exist = $stmt->get_result();

    if ($u_exist->num_rows != 0) {
        $u_exist_fetch = $u_exist->fetch_assoc();
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }

    $enc_pass = $data['pass'];

    $insert_query = "INSERT INTO user_cred (`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `password`, `cpass`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $insert_stmt = $con->prepare($insert_query);
    $insert_stmt->bind_param("ssssssss", $data['name'], $data['email'], $data['address'], $data['phonenum'], $data['pincode'], $data['dob'], $enc_pass, $data['cpass']);

    if ($insert_stmt->execute()) {
        echo "Success";
    } else {
        echo "Failed";
    }

    $insert_stmt->close();
    $stmt->close();

    $con->close();
}



if (isset($_POST['login'])) {
   

    // Get the submitted email and password (You might want to sanitize these inputs)
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Prepare the SQL query to fetch user data based on email and password
    $sql = "SELECT * FROM `user_cred` WHERE `email`= '$email' AND `password`='$password'";
    
    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if query executed successfully
    if ($result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the user data
            $row = mysqli_fetch_assoc($result);

            // Start the session
            session_start();

            // Store user data in session variables
            $_SESSION['login'] = true;
            $_SESSION['uId'] = $row['id'];
            $_SESSION['uName'] = $row['name'];

            // Redirect to index.php
            header("Location: /index.php");
            exit(); // Ensure script execution stops after redirection
        } else {
            // No matching user found
            echo "Incorrect email or password.";
        }
    } else {
        // Query execution failed
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}


          
?>
