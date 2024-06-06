<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php require('inc/links.php')?>
     <title>TJ wedev-Home</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   
    <style>
          .availablity-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
          }
          @media screen and (max-width:575px){
            .availablity-form{
            margin-top: 25px;
            padding: 0 35px ;
          }
          }

    </style>
</head>
<body class="bg-light">

      <!-- header -->
       <?php require('inc/header.php');?> 


      <!-- carousel-->
    <div class="container-fluid px-lg-4 mt-4"> 
      <div class="swiper swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="images/carousel/IMG_15372.png" class="m-100 d-block" >
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_40905.png" class="m-100 d-block">
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_55677.png" class="m-100 d-block">
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_62045.png" class="m-100 d-block">
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_93127.png" class="m-100 d-block">
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_99736.png" class="m-100 d-block">
          </div>
        </div>
      </div>
    </div>

      <!-- check availity form-->
      <div class="container availablity-form" >
        <div class="row">
          <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Check Booking Availablity</h5>
            <form>
              <div class="row align-items-end">
                <div class="col-lg-3">
                  <label  class="form-label" style="font-weight: 500;">Check-in </label>
                  <input type="date" class="form-control shadow-none">                        
                </div>
                <div class="col-lg-3 md-3">
                  <label  class="form-label" style="font-weight: 500;">Check-out </label>
                  <input type="date" class="form-control shadow-none">                        
                </div>
                <div class="col-lg-3 md-3">
                  <label  class="form-label" style="font-weight: 500;">Adult</label>
                  <select class="form-select">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-lg-2 md-3">
                  <label  class="form-label" style="font-weight: 500;">Children</label>
                  <select class="form-select">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-lg-1 mb-lg-3 mt-2">
                  <button type="submit" class="btn btn-success shadow-none text-white">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
        <!-- Our Room -->
      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>
      <div class="container">
        <div class="row">
          <!-- Card 1 -->
          <div class="col-lg-4 col=md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
              <img src="images/rooms/1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5>Simple Room Name</h5>
                <h6 class="mb-4"> ₹200 per night</h6>
                <div class="featurs mb-4">
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
                <div class="facilites mb-4">
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
             
                <div class="rating mb-4">
                  <h6 class="mb-1">Rating</h6>
                  <span class="badge rounded-pill bg-light">
                   <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                 <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                 <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
           
                </div>
               </div>
            </div> 
          </div>

           <!-- Card 2 -->
        
          <div class="col-lg-4 col=md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
              <img src="images/rooms/1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5>Simple Room Name</h5>
                <h6 class="mb-4"> ₹200 per night</h6>
                <div class="featurs mb-4">
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
                <div class="facilites mb-4">
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
                
                <div class="rating mb-4">
                  <h6 class="mb-1">Rating</h6>
                  <span class="badge rounded-pill bg-light">
                   <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                 <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                 <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
           
                </div>
               </div>
            </div> 
          </div>
             <!-- Card 3 -->
          <div class="col-lg-4 col=md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
              <img src="images/rooms/1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5>Simple Room Name</h5>
                <h6 class="mb-4"> ₹200 per night</h6>
                <div class="featurs mb-4">
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
                <div class="facilites mb-4">
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
               
                <div class="rating mb-4">
                  <h6 class="mb-1">Rating</h6>
                  <span class="badge rounded-pill bg-light">
                   <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                 <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                 <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
           
                </div>
               </div>
            </div> 
          </div>

          <div class="col-lg-12 text-center mt-5">
            <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
          </div>
        </div>
      </div>

        <!-- Facilites -->

      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITES</h2>
      <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
          
          <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/facilities/IMG_43553.svg" width="80px">
            <h5 class="mt-3">Wifi</h5>
          </div>
          <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/facilities/IMG_49949.svg" width="80px">
            <h5 class="mt-3">Air Conditioner</h5>
          </div>
          <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/facilities/IMG_41622.svg" width="80px">
            <h5 class="mt-3">Television</h5>
          </div>
          <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/facilities/IMG_47816.svg" width="80px">
            <h5 class="mt-3">Spa</h5>
          </div>
          <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/facilities/IMG_96423.svg" width="80px">
            <h5 class="mt-3">Room Heater</h5>
          </div>
          <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/facilities/IMG_27079.svg" width="80px">
            <h5 class="mt-3">Geyser</h5>
          </div>
          <div class="col-lg-12 text-center mt-5">
            <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>
          </div>
        </div>
      </div>

      <!-- Testimonials -->
      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
     <div class="container" >
      <!-- Swiper -->
  <div class="swiper swiper-testimonials">
    <div class="swiper-wrapper mb-5">
      <div class="swiper-slide bg-white mb-3">
        <div class="profile d-flex align-items-center p-4">
          <img src="images/about/review (1).png" width="10px" >
          <h6 m-0 ms-2> Emily</h6>
        </div>
        <p>
        My stay at TJ Webdev Hotel was truly delightful. The staff was incredibly friendly and accommodating, making me feel right at home. The room was spacious and impeccably clean, with modern amenities that added to my comfort. I highly recommend TJ Webdev Hotel for anyone visiting the area!</p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          
        </div>
      </div>
      <!--random user 2-->
      <div class="swiper-slide bg-white mb-3 ">
        <div class="profile d-flex align-items-center p-4">
          <img src="images/about/review (1).png" width="30px" >
          <h6 m-0 ms-2>Michael</h6>
        </div>
        <p>
        I had a fantastic experience at TJ Webdev Hotel. From the moment I checked in, I was impressed by the professionalism and hospitality of the staff. The location is convenient, and the rooms are well-appointed with everything you need for a comfortable stay. I'll definitely be returning on my next trip!
        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          
        </div>
      </div>
      <!--random user 3-->
      <div class="swiper-slide bg-white mb-3 ">
        <div class="profile d-flex align-items-center p-4">
          <img src="images/about/review (1).png" width="30px" >
          <h6 m-0 ms-2> Sarah</h6>
        </div>
        <p>
        TJ Webdev Hotel exceeded my expectations in every way. The attention to detail, from the elegant decor to the top-notch service, was exceptional. The hotel's amenities, including the fitness center and on-site dining options, added to the overall experience. I couldn't have asked for a better stay.
        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          
        </div>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
    <div class="col-lg-12 text-center mt-5">
      <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More >>></a>
    </div>
      </div>

     <!--Reach Us-->

        

     <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>
     <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
          <iframe height="400"width="850"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7566.535630314681!2d73.83194883991438!3d18.516795853751553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf8f302a2f7d%3A0xae8576b1d65c2e64!2sDeccan%20Gymkhana%2C%20Pune%2C%20Maharashtra%20411004!5e0!3m2!1sen!2sin!4v1704127291832!5m2!1sen!2sin" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <h5>Address</h5>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="bg-white p-4 rounded mb-4">
            <h5>Call us</h5>
            <i class="bi bi-telephone-fill"></i>
            <a href="tel:+9175445060" class="d-inline-block mb-2 text-decoration-none text-dark">+ 9175445060</a>
            <br>
            <i class="bi bi-telephone-fill"></i>
            <a href="tel:+9056754656" class="d-inline-block  text-decoration-none text-dark">+9056754656</a>
          </div>
          <div class="bg-white p-4 rounded mb-4">
            <h5>Follow us</h5>
            <a href="#" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2 ">
                <i class="bi bi-twitter me-1"></i>
                Twitter
              </span>
            </a>
            <br>
            <a href="#" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2 ">
                <i class="bi bi-facebook"></i>
                Facebook
              </span>
            </a>
            <br>
            <a href="#" class="d-inline-block ">
              <span class="badge bg-light text-dark fs-6 p-2">
                <i class="bi bi-instagram"></i>
                Insta
              </span>
            </a>
            <br>  
          </div>
        </div>
      </div>
     </div>


     <!--Footer-->
    <?php require('inc/footer.php');?> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop:true,
        autoplay:{
          delay:3500,
          disableonInteraction:false,
        }
      });
      <!-- Initialize Swiper -->
  
    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView:3,
      loop:true,

      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints:{
        320:{
          slidesPerView:1,
        }
        

      }
    });
  
    </script>
  </body>
</html>