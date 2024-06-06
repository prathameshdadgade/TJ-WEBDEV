<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require('inc/links.php')?>
    <!-- <title><?php echo $settings_r['site_title']?>-Facilties</title>
    -->
    
    <style>
        .pop:hover{
            border-top-color:var(--teal)!important;
            transform:scale(1.03);
            transition: all 0.3s;
        }

    </style>
  
</head>
<body class="bg-light">

      <!-- header -->
       <?php require('inc/header.php');?> 

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR FACILITES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        Discover a range of amenities designed to make your stay comfortable and enjoyable.
       
             
        </p>
    </div>
          <div class="container">
            <div class="row">
                
            <!-- Wifi1 -->
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex algin-items-center mb-2">
                <img src="images/facilities/IMG_43553.svg" width="40px">
                   <h5 class="m-0 ms-3">Wifi</h5> 
               </div>   
                  <p>
                  Stay connected with our complimentary high-speed Wi-Fi, available throughout the entire property. Whether you’re working, streaming, or browsing, our reliable internet ensures you’re always online.
                   </p>
                </div>
                </div>
               
                
                <!-- Wifi2 -->
                <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex algin-items-center mb-2">
                <img src="images/facilities/IMG_49949.svg" width="80px">
                  <h5 class="mt-3">Air Conditioner</h5>
                </div>   
                </p>
                Enjoy a comfortable stay with individually controlled air conditioning in every room. Whether you prefer a cool escape from the heat or a warm, cozy atmosphere, our modern air conditioning system allows you to set the perfect temperature for your comfort.  </p>
                </div>
                </div>
                  
                <!-- Wifi3 -->
                <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex algin-items-center mb-2">
                <img src="images/facilities/IMG_47816.svg" width="80px">
                <h5 class="mt-3">Spa</h5> 
                </div>   
                  <p>
                  Indulge in the ultimate relaxation at our luxurious spa. Offering a range of treatments and therapies, our spa is the perfect place to unwind and rejuvenate. Enjoy massages, facials, and other wellness services in a serene and tranquil environment.
                   </p>
                </div>
                </div>
                
                
                <!-- Wifi4 -->
                <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex algin-items-center mb-2">
                <img src="images/facilities/IMG_41622.svg" width="80px">
                <h5 class="mt-3">Television</h5>
                </div>   
                  <p>
                  Enjoy your favorite shows and movies with our high-definition televisions available in every room. With a wide selection of local and international channels, as well as streaming options, you can relax and unwind with quality entertainment at your fingertips.
                   </p>
                </div>
                </div>
                <!-- Wifi5 -->
                <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex algin-items-center mb-2">
                <img src="images/facilities/IMG_96423.svg" width="80px">
                <h5 class="mt-3">Room Heater</h5>
                </div>   
                  <p>
                  Stay warm and cozy with our efficient room heaters, available in every guest room. Whether you're visiting during the colder months or just prefer a warmer environment, our heaters ensure your comfort throughout your stay.
                 </p>
                </div>
                </div>
                
                <!-- Wifi6 -->
                <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex algin-items-center mb-2">
                <img src="images/facilities/IMG_27079.svg" width="80px">
                <h5 class="mt-3">Geyser</h5> 
                </div>   
                  <p>
                  Enjoy the luxury of hot water any time of the day with our state-of-the-art geysers installed in every bathroom. Whether you prefer a warm shower in the morning or a relaxing bath at night, our reliable geysers ensure you have a steady supply of hot water whenever you need it.
                   </p>
                </div>
                </div>
                
               
                
            </div>
          </div>
     
    <!-- Footer  -->

    <?php require('inc/footer.php');?> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
   
      
  </body>
</html>