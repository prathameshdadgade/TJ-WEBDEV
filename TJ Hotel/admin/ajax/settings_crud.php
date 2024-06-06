<?php
    
require('../inc/db_config.php');
require('../inc/essenials.php');
adminLogin();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "INSERT INTO user_cred (`name`, `email`) VALUES (?, ?)";
    $values = [$name, $email];

    if (insert($query, $values, 'ss')) {
        echo "Success";
    } else {
        echo "Failed";
    }
}

if (isset($_POST['upd_general'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `sr_no`=?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], 1];

    // Assuming you have a function named 'update' for executing update queries
    $res = update($q, $values, 'ssi');

    if ($res !== false) {
        echo $res; // Successful update, echo the result
    } else {
        echo json_encode(['error' => 'Update failed']);
    }
}

if (isset($_POST['upd_shutdown'])) {
    $frm_data = ($_POST['upd_shutdown'] == 0) ? 1 : 0;
    $q = "UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
    $values = [$frm_data, 1];

    // Assuming you have a function named 'update' for executing update queries
    $res = update($q, $values, 'ii');

    if ($res !== false) {
        echo $res; // Successful update, echo the result
    } else {
        echo json_encode(['error' => 'Update failed']);
    }
}

if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $values = [1];

    // Assuming you have a function named 'select' for executing queries
    $res = select($q, $values, 'i');

    if ($res) {
        // Fetch the associative array from the result
        $data = mysqli_fetch_assoc($res);

        if ($data) {
            // Encode the data as JSON and echo it
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'No contact details found']);
        }
    } else {
        // Handle the case where the query execution fails
        echo json_encode(['error' => 'Query execution failed']);
    }
}

if (isset($_POST['upd_contacts'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `contact_details` SET `address`=?,`gmap`=?,`pn1`=?,`pn2`=?,`email`=?,`fb`=?,`insta`=?,`tw`=?,`iframe`=? WHERE `sr_no`=?";
    $values = [
        $frm_data['address'],
        $frm_data['gmap'],
        $frm_data['pn1'],
        $frm_data['pn2'],
        $frm_data['email'],
        $frm_data['fb'],
        $frm_data['insta'],
        $frm_data['tw'],
        $frm_data['iframe'],
        1
    ];

    // Assuming you have a function named 'update' for executing update queries
    $res = update($q, $values, 'sssssssssi');

    if ($res !== false) {
        echo $res; // Successful update, echo the result
    } else {
        echo json_encode(['error' => 'Update failed']);
    }
}

function update($query, $params, $types) {
    global $con; // Assuming $con is your database connection

    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        return false; // Return false on prepare failure
    }

    // Bind parameters
    mysqli_stmt_bind_param($stmt, $types, ...$params);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if ($result === false) {
        return false; // Return false on execution failure
    }

    // Return the number of affected rows
    return mysqli_stmt_affected_rows($stmt);
}

?>
