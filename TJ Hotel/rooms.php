<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   
    <?php require('inc/links.php')?>

   <title>
        TJ WEBDEV-Rooms
    </title> 
   
  
</head>
<body class="bg-light">

      <!-- header -->
       <?php require('inc/header.php');?> 

                <div class="my-5 px-4">
                    <h2 class="fw-bold h-font text-center">OURS ROOMS</h2>
                    <div class="h-line bg-dark"></div>
                
                </div>
        <div class="container">
            <div class="row">
                 <div class="col-lg-3 col-mg-12 mb-lg-0 mb-4 px-0">
                <!-- Search rooms -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                        <div class="container-fluid flex-lg-column align-items-stretch">
                            <h4 class="mt-2">FILTERS</h4>
                            <button class="navbar-toggler shadow-none " type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                          <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <!-- Filters 1 -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px">CHECK AVAILABLITY</h5>
                                <label  class="form-label" >Check-in </label>
                                <input type="date" class="form-control shadow-none mb-3">                        
                                <label  class="form-label" >Check-out </label>
                                <input type="date" class="form-control shadow-none">                        
            
                            </div>
                            <!-- Filters 2 -->
                        
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px">FACILITES</h5>
                                <div class="mb-2">
                                <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">  
                                <label  class="form-check-label" for="f1">Facility one </label>                      
                                </div>
                                <div class="mb-2">
                                <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">  
                                <label  class="form-check-label" for="f2">Facility two </label>                      
                                </div>
                                <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">  
                                <label  class="form-check-label" for="f3">Facility three </label>                      
                                </div>
                            </div>
                                <!-- guest -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px">Guest</h5>
                                <div class="d-flex" >
                                    <div class="me-3">
                                        <label  class="form-label" >Adults </label>
                                        <input type="number" class="form-control shadow-none">                        
                                
                                    </div>
                                    <div >
                                        <label  class="form-label" >Children </label>
                                        <input type="number" class="form-control shadow-none">                        
                                
                                    </div>
                                </div>

                            </div>

                          </div>
                        </div>      
                    </nav>
                </div> 

                   
            <div class="col-lg-9 col-md-12 px-4">

            <?php
// Assuming you have a valid database connection
// Make sure to replace $con with your actual database connection object

$query = "SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?";
$stmt = mysqli_prepare($con, $query);

if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ii', $status, $removed);

    // Set parameters
    $status = 1;
    $removed = 0;

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get result set
    $room_res = mysqli_stmt_get_result($stmt);

while ($room_data = mysqli_fetch_assoc($room_res)) {
    // Get features of the room
    $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id=rfea.features_id WHERE rfea.room_id='$room_data[id]'");

    $features_data = "";
    while ($fea_row = mysqli_fetch_assoc($fea_q)) {
        $features_data .= " <span class='badge rounded-pill bg-light text-dark text-wrap'>
                        $fea_row[name]
                    </span>";
    }

    $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
    $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` WHERE `room_id`='" . $room_data['id'] . "' AND `thumb`='1'");

    if (mysqli_num_rows($thumb_q) > 0) {
        $thumb_res = mysqli_fetch_assoc($thumb_q);
        $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
    }

    // Print room card
    echo <<<data
    <div class="card mb-4 border-0 shadow">
        <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                <img src="$room_thumb" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
                <h5 class="mb-3">$room_data[name]</h5>
                <div class="featurs mb-3">
                    <h6 class="mb-1">Features</h6>
                    $features_data
                </div>
                <div class="guests">
                    <h6 class="mb-1">Guests</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                        $room_data[adult] Adults
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                        $room_data[children] Children
                    </span>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <h6 class="mb-4"> ₹$room_data[price] per night</h6>
                <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
            </div>
        </div>
    </div>
data;
}

// Close the database connection if needed
mysqli_close($con);
}else {
    // Handle error (e.g., log or display an error message)
    die("Error in prepared statement: " . mysqli_error($con));
}

?>



              <!-- Room 1 -->

                <!-- <div class="card mb-4 border-0 shadow" >
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded" >
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                           <h5 class="mb-3">Simple Room Name</h5> 
                           <div class="featurs mb-3">
                                 <h6 class="mb-1">featurs</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Balcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 sofa
                                </span>    
                            </div>
                           <div class="facilites mb-3">
                                <h6 class="mb-1">Facilites</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Room heater
                                </span>  
                            </div>
                              
                            <div class="guests ">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        5 Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        4 childern 
                                    </span>
                            </div>
                       </div>
                       
                        <div class="col-md-2 text-center">
                          <h6 class="mb-4"> ₹200 per night</h6>
                          <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                          <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
           
                        </div>
                    </div>
                </div> -->
            
                <!-- room2
             -->
                <!-- <div class="card mb-4 border-0 shadow" >
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded" >
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                           <h5 class="mb-3">Simple Room Name</h5> 
                           <div class="featurs mb-3">
                                 <h6 class="mb-1">featurs</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Balcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 sofa
                                </span>    
                            </div>
                           <div class="facilites mb-3">
                                <h6 class="mb-1">Facilites</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Room heater
                                </span>  
                            </div>
                              
                            <div class="guests ">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        5 Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        4 childern 
                                    </span>
                            </div>
                       </div>
                       
                        <div class="col-md-2 text-center">
                          <h6 class="mb-4"> ₹200 per night</h6>
                          <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                          <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
           
                        </div>
                    </div>
                </div> -->

                <!-- room3 -->

                <!-- <div class="card mb-4 border-0 shadow" >
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded" >
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                           <h5 class="mb-3">Simple Room Name</h5> 
                           <div class="featurs mb-3">
                                 <h6 class="mb-1">featurs</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Balcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 sofa
                                </span>    
                            </div>
                           <div class="facilites mb-3">
                                <h6 class="mb-1">Facilites</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Room heater
                                </span>  
                            </div>
                              
                            <div class="guests ">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        5 Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        4 childern 
                                    </span>
                            </div>
                       </div>
                       
                        <div class="col-md-2 text-center">
                          <h6 class="mb-4"> ₹200 per night</h6>
                          <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                          <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
           
                        </div>
                    </div>
                </div> -->

    

            </div>
      
            </div>
        </div>
     
    <!-- Footer  -->

    <?php require('inc/footer.php');?> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
   
      
  </body>
</html>
                    