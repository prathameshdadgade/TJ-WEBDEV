<?php
require('../inc/db_config.php');
require('../inc/essenials.php');
adminLogin();

if (isset($_POST['add_room'])) {
    $features = filteration(json_decode($_POST['features']));
    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "INSERT INTO `rooms` (`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $values1 = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'], $frm_data['desc']];

    if (insert($q1, $values1, 'siiiiiss')) {
        $flag = 1;
    }

    $q2 = "SELECT LAST_INSERT_ID() as room_id";
    $result = select($q2, [], '');

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $room_id = $row['room_id'];

        $q3 = "INSERT INTO `room_features` (`room_id`, `features_id`) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $q3);

        if ($stmt) {
            foreach ($features as $f) {
                mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            $flag = 0;
            die('Query cannot be prepared - insert');
        }

        if ($flag) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}

// Corrected function name
function insert($query, $values, $types) {
    global $con; // Assuming $con is your database connection

    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, $types, ...$values);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            mysqli_stmt_close($stmt);
            return false;
        }
    } else {
        die('Query cannot be prepared - insert');
    }
}

// Corrected function name
function select($query, $values, $types) {
    global $con; // Assuming $con is your database connection

    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        if ($types) {
            mysqli_stmt_bind_param($stmt, $types, ...$values);
        }

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);

        return $result;
    } else {
        die('Query cannot be prepared - select');
    }
}

if (isset($_POST['get_all_rooms'])) {
    $res = select("SELECT * FROM `rooms` WHERE `removed`=?", [0], 'i');
    $i = 1;
    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {
        $status = ($row['status'] == 1) ? "<button onclick='toggle_status({$row['id']}, 0)' class='btn btn-dark btn-sm shadow-none'>active</button>" : "<button onclick='toggle_status({$row['id']}, 1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";

        $data .= "
            <tr class='align-middle'>
                <td>{$i}</td>
                <td>{$row['name']}</td>
                <td>{$row['area']}</td>
                <td>
                    <span class='badge rounded-pill bg-light text-dark'>Adult: {$row['adult']}</span><br>
                    <span class='badge rounded-pill bg-light text-dark'>Children: {$row['children']}</span><br>
                </td>
                <td>{$row['price']}</td>
                <td>{$row['quantity']}</td>
                <td>{$status}</td>
                <td>
                    <button type='button' onclick='edit_details({$row['id']})' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                        <i class='bi bi-pencil-square'></i>
                    </button>
                    <button type='button' onclick=\"room_images({$row['id']}, '{$row['name']}')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                        <i class='bi bi-images'></i>
                    </button>
                    <button type='button' onclick='remove_room({$row['id']})' class='btn btn-danger shadow-none btn-sm'>
                        <i class='bi bi-trash'></i>
                    </button>
                </td>
            </tr>
        ";
        $i++;
    }

    // Check if there are rows to display before echoing the table
    if (!empty($data)) {
        echo $data;
    } else {
        echo "<tr><td colspan='8'>No records found</td></tr>";
    }
}

if(isset($_POST['get_room']))
{
    $frm_data = filteration($_POST);
    $res1 = select("SELECT * FROM `rooms` WHERE `id`=?", [$frm_data['get_room']], 'i');
    $res2 = select("SELECT * FROM `room_features` WHERE `room_id`=?", [$frm_data['get_room']], 'i');
    $roomdata = mysqli_fetch_assoc($res1);
    $features = [];

    if(mysqli_num_rows($res2) > 0) {
        while ($row = mysqli_fetch_assoc($res2)) {
            array_push($features, $row['features_id']);
        }
    }

    $data = ["roomdata" => $roomdata, "features" => $features];
    $data = json_encode($data);
    echo $data;
}

if(isset($_POST['edit_room'])){
    $features = filteration(json_decode($_POST['features']));
    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "UPDATE `rooms` SET `name`=?, `area`=?, `price`=?, `quantity`=?, `adult`=?, `children`=?, `description`=? WHERE `id`=?";
    $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'], $frm_data['desc'], $frm_data['room_id']];

    if (update($q1, $values, 'siiiiisi')) {
        $flag = 1;
    }

    $del_features = delete("DELETE FROM `room_features` WHERE `room_id`=?", [$frm_data['room_id']], 'i');

    if ($del_features !== false) {
        $flag = 0;
    }

    $q3 = "INSERT INTO `room_features` (`room_id`, `features_id`) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($con, $q3)) {
        foreach ($features as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        $flag = 1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('Query cannot be prepared - insert');
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}

function update($query, $values, $types) {
    global $con; // Assuming $con is your database connection

    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, $types, ...$values);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            mysqli_stmt_close($stmt);
            return false;
        }
    } else {
        die('Query cannot be prepared - update');
    }
}

function delete($query, $params = array(), $types = '') {
    global $con; // Assuming $con is your database connection

    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        if (!empty($params) && !empty($types)) {
            $bind_params = array_merge([$stmt, $types], $params);
            call_user_func_array('mysqli_stmt_bind_param', $bind_params);
        }

        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);

        mysqli_stmt_close($stmt);

        return $affected_rows;
    } else {
        return false;
    }
}

if (isset($_POST['toggle_status'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `rooms` SET `status`=? WHERE `id`=?";
    $v = [$frm_data['value'], $frm_data['toggle_status']];
    
    if (update($q, $v, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}

if(isset($_POST['add_image'])){
    $frm_data = filteration($_POST);
    $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER); // Assuming ROOMS_FOLDER is your destination folder
    if($img_r == 'inv_ing'){
        echo $img_r;
    } else if($img_r == 'inv size'){
        echo $img_r;
    } else if($img_r == 'upd_failed'){
        echo $img_r;
    } else {
        $q = "INSERT INTO `room_images`(`room_id`, `image`) VALUES (?, ?)";
        $values = [$frm_data['room_id'], $img_r];
        $res = insert($q, $values, 'is');
        echo $res;
    }
}

function uploadImage($file, $folder)
{
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp']; // Add more if needed
    $maxSize = 2 * 1024 * 1024; // 2MB

    $filename = $file['name'];
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Check if the file has a valid extension
    if (!in_array($extension, $allowedExtensions)) {
        return 'inv_img'; // Invalid image format
    }

    // Check if the file size is within the limit
    if ($file['size'] > $maxSize) {
        return 'inv_size'; // Image size exceeds the limit
    }

    // Generate a unique filename to prevent overwriting existing files
    $uniqueFilename = uniqid() . '.' . $extension;

    // Move the uploaded file to the destination folder
    $destination = $folder . $uniqueFilename;
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        // Image uploaded successfully
        return $uniqueFilename;
    } else {
        return 'upd_failed'; // Image upload failed
    }
}

if (isset($_POST['get_room_images'])) {
    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `room_images` WHERE `room_id`=?", [$frm_data['get_room_images']], 'i');
    $path = ROOMS_IMG_PATH; // Assuming ROOMS_IMG_PATH is your image path

    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['thumb'] == 1) {
            $thumb_btn = "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded fs-5'></i> ";
        } else {
            $thumb_btn = "<button onclick='thumb_image($row[sr_no], $row[room_id])' class='btn btn-secondary  shadow-none'>
                <i class='bi bi-check-lg'></i>
                </button>";
        }
        echo <<<data
            <tr class='align-middle'>
                <td><img src='$path$row[image]' class='img-fluid'></td>
                <td>$thumb_btn </td>
                <td>
                    <button onclick='rem_image($row[sr_no], $row[room_id])' class='btn btn-warning  shadow-none'>
                        <i class='bi bi-trash'></i>
                    </button>
                </td>
            </tr>
          data;
    }
}

if(isset($_POST['rem_image'])){
    $frm_data = filteration($_POST);
    $values = [$frm_data['image_id'], $frm_data['room_id']];
    $pre_q = "SELECT * FROM `room_images` WHERE `sr_no`=? AND `room_id`=?";
    $res = select($pre_q, $values, 'ii');
    $img = mysqli_fetch_assoc($res);

    if ($img) {
        if (deleteImage($img['image'], ROOMS_FOLDER)) {
            $q = "DELETE FROM `room_images` WHERE `sr_no`=? AND `room_id`=?";
            $res = delete($q, $values, 'ii');
            echo $res;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}


function deleteImage($imageName, $folderPath) {
    // Construct the full path to the image
    $filePath = $folderPath . '/' . $imageName;

    // Check if the file exists before attempting to delete
    if (file_exists($filePath)) {
        // Attempt to delete the file
        if (unlink($filePath)) {
            // File deletion successful
            return true;
        } else {
            // Error deleting the file
            echo "Error deleting image file.";
            return false;
        }
    } else {
        // File does not exist
        echo "Image file not found.";
        return false;
    }
}

if(isset($_POST['thumb_image'])){
    $frm_data = filteration($_POST);
    $pre_q = "UPDATE `room_images` SET `thumb`=? WHERE `room_id`=?";
    $pre_v = [0, $frm_data['room_id']];
    $pre_res = update($pre_q, $pre_v, 'ii');

    $q = "UPDATE `room_images` SET `thumb`=? WHERE `sr_no`=? AND `room_id`=?";
    $v = [1, $frm_data['image_id'], $frm_data['room_id']];
    $res = update($q, $v, 'iii');
    echo $res;
}

if(isset($_POST['remove_room'])){
    $frm_data = filteration($_POST);

    // Delete room images
    $res1 = select("SELECT * FROM `room_images` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
    while ($row = mysqli_fetch_assoc($res1)) {
        deleteImage($row['image'], ROOMS_FOLDER);
    }
    
    // Delete records from room_images
    $res2 = delete("DELETE FROM `room_images` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
    
    // Delete records from room_features
    $res3 = delete("DELETE FROM `room_features` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
    
    // Update 'removed' flag in rooms
    $res4 = update("UPDATE `rooms` SET `removed`=? WHERE `id`=?", [1, $frm_data['room_id']], 'ii');

    if($res2 !== false || $res3 !== false || $res4 !== false) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}



?>
