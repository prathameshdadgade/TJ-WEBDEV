<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <?php require('inc/links.php')?>
    <title>TJ WEBDEV-About</title>
   
    <style>
        .box{
            border-top-color: var(--teal)!important;
        }
    </style>
  
</head>
<body class="bg-light">

      <!-- header -->
       <?php require('inc/header.php');?> 

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">About Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        we pride ourselves on providing exceptional service and top-notch amenities to ensure a memorable stay for our guests
         <br>From elegantly appointed rooms to world-class dining options and state-of-the-art facilities, every aspect of your experience is carefully curated to exceed your expectations.
             
        </p>
    </div>
         <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2 ">
                    <h3 class="m,b-3"> John Smith</h3>
                    <p>
                    John Smith, our dedicated manager, is the heartbeat of our hotel. With years of experience in hospitality and a passion for ensuring every guest has a memorable stay, John leads our team with warmth and professionalism. From ensuring your check-in is seamless to making sure every detail of your stay is perfect, John is committed to exceeding your expectations. Feel free to reach out to him directly with any questions or special requests. Your comfort and satisfaction are his top priorities.
                    </p>
                </div>
                <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 orber-1">
                    <img src="images/about/about.jpg" class="w-100">

                </div>
            </div>
         </div>
         
         <div class="container mt-5">
            <div class="row">
                 <!-- div room 1-->
                <div class="col-lg-3 col-md-6 mb-4 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/customers.svg"width="70px">
                        <h4 class="mt-3"> 300+ CUSTOMERS</h4>
                    </div>
                </div>
                        <!-- div room 2-->
                    <div class="col-lg-3 col-md-6 mb-4 px-4"> 
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/hotel.svg"width="70px">
                        <h4 class="mt-3"> 100+ ROOMS</h4>
                    </div>
                    </div>
                     <!-- div room 3-->
                    <div class="col-lg-3 col-md-6 mb-4 px-4"> 
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/rating.svg"width="70px">
                            <h4 class="mt-3"> 150+ REVIEVS</h4>
                        </div>
                    </div>
                      <!-- div room 4-->
                 <div class="col-lg-3 col-md-6 mb-4 px-4"> 
                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                        <img src="images/about/staff.svg"width="70px">
                        <h4 class="mt-3"> 200+ STAFFS</h4>
                    </div>
                 </div>
                 
            </div>
         </div>

         <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAMS</h3>
         <div class="container px-4">
            <div class="swiper mySwiper">
               <div class="swiper-wrapper mb-5">
                  <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/Hotel-Staff1.webp" class="w-100">
                    <h5 class="mt-2"></h5>
                  </div>
                  <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/HOTEL-STAFF-ILLUSTRATION.png" class="w-100">
                    <h5 class="mt-2"></h5>
                  </div>
                  <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/HOTEL-STAFF-ILLUSTRATION1.webp" class="w-100">
                    <h5 class="mt-2"></h5>
                  </div>
                  <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/images.jpeg" class="w-100">
                    <h5 class="mt-2"></h5>
                  </div>

                  <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="images/about/hotel-staff-set-maids-cleaning-260nw-1012520026.png" class="w-100">
                    <h5 class="mt-2"></h5>
                  </div>
                 </div>
                <div class="swiper-pagination"></div>
            </div>   
         </div>
    <!-- Footer  -->

    <?php require('inc/footer.php');?> 
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
   

    <script>
        // var swiper = new Swiper(".mySwiper",{
        // sildesPerView:4,
        // spaceBetween:40,
        // pagination: {
        // el: ".swiper-pagination",
        //  },
        //  breakpoints:{
        //     320:{
        //         sildesPerView:1,
       
        //     }
        //  }
        // });
        var swiper = new Swiper(".mySwiper", {
                slidesPerView: 4,
                spaceBetween: 40,
                pagination: {
                    el: ".swiper-pagination",
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                    }
                },
                // Add the autoplay configuration
                autoplay: {
                    delay:4000, // Time in milliseconds, change as needed
                    disableOnInteraction: false, // Set to false to keep autoplaying even when user interacts with the slider
                },
            });


       

    </script>
      
  </body>
</html>