<?php
    require('inc/db_config.php');
    require('inc/essenials.php');
    
     session_start();
    if(isset($_SESSION['admin_name']) && $_SESSION['admin_pass'] == true){
       redirect('dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php require('inc/links.php'); ?>
    <style>
      div.login-form{
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 400px;
      }
    </style>
</head>
<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST" > <!-- Corrected the form action -->
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                     <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">                        
                </div>
                <div class="mb-4">
                     <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">                        
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button> 
            </div>
        </form>
    </div>

    <?php
       
  // Check login credentials
if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);

    // Fetch password from the database
    $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=?";
    $stmt = $con->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $frm_data['admin_name']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row['admin_pass'];

            // Verify the password
            if ($frm_data['admin_pass'] === $stored_password) {
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminId'] = $row['sr_no'];
                redirect('dashboard.php');
            } else {
                alert('error', 'Login failed - Invalid Password!');
            }
        } else {
            alert('error', 'Login failed - Invalid Admin Name!');
        }

        $stmt->close();
    } else {
        die("Prepare failed: " . $con->error);
    }
}
    ?>
    <?php require('inc/scripts.php'); ?>
</body>
</html>
