<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require('inc/links.php')?>
    <title>TJ WEBDEV-Rooms Details </title>
   
    
   <?php
     if(!isset($_GET['id'])){
        redirect('rooms.php');
     }
     $data=filteration($_GET);
     $room_res=select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');
     if(mysqli_num_rows($room_res)==0){
        redirect('rooms.php');
     }
     $room_data=mysqli_fetch_assoc($room_res);
    ?>
  
</head>
<body class="bg-light">

      <!-- header -->
       <?php require('inc/header.php');?> 

               
        <div class="container">
            <div class="row">

               <div class="col-12 my-5 px-4">
                    <h2 class="fw-bold "><?php echo $room_data['name']?></h2>
                    <div style="font-size: 14px;">
                   <a href="index.php">HOME</a> 
                   <a href="rooms.php">ROOMS</a> 
                 
                  </div>
                </div>
                 <div class="col-lg-3 col-mg-12 mb-lg-0 mb-4 px-0">
                   
            <div class="col-12 mt-4 px-4">
                <div class ="mb-4">
                    <h5>Description</h5>
                    <p>
                        <?php echo $room_data['desc'] ?>
                    </p>
                </div>
                <div>
                    <h5>Reviews & Ratings</h5>
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <img src="images/features/star.svg" width="30px">
                            <h6 class="m-0 ms-2">Random user1</h6>
                        </div>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum fuga, est eveniet cupiditate illum optio et voluptatum id quis eum ab velit ducimus exercitationem itaque iusto molestias obcaecati minima tempora?

                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-waring"></i>
                            <i class="bi bi-star-fill text-waring"></i>
                            <i class="bi bi-star-fill text-waring"></i>
                            <i class="bi bi-star-fill text-waring"></i>
                            <i class="bi bi-star-fill text-waring"></i>
                       
                       
                        </div>
                    </div>
                </div>

              
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
    
    
      
  </body>
</html>
                    