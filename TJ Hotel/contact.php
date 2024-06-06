<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   
    <?php require('inc/links.php')?>
    <!-- <title><?php echo $settings_r['site_title']?>-Contact us</title>
    -->
  
</head>
<body class="bg-light">

      <!-- header -->
       <?php require('inc/header.php');?> 

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Contact Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        For any questions or assistance, please don't hesitate to get in touch with us.
        </p>
    </div>
          <div class="container">
            <div class="row">
                
                <!-- Wifi1 -->
                <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                <iframe class="w-100 rounded mb-4 "height="320px"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7566.535630314681!2d73.83194883991438!3d18.516795853751553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf8f302a2f7d%3A0xae8576b1d65c2e64!2sDeccan%20Gymkhana%2C%20Pune%2C%20Maharashtra%20411004!5e0!3m2!1sen!2sin!4v1704127291832!5m2!1sen!2sin" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <h5>Address</h5>
                <a href="https://maps.app.goo.gl/FoDJdA9Geui9fDRV6">
                  XYZ,Deccan ,Pune
                </a>
                  <h5 class="mt-4">Call us</h5>
                  <i class="bi bi-telephone-fill"></i>
                  <a href="tel:+911232347432" class="d-inline-block mb-2 text-decoration-none text-dark">+911232347432</a>
                  <br>
                  <i class="bi bi-telephone-fill"></i>
                  <a href="tel:+911232347432" class="d-inline-block  text-decoration-none text-dark">+911232347432</a>
                  <h5 class="mt-4">Email</h5>
                  <i class="bi bi-envelope-fill"></i>
                  <a href="#"class="d-inline-block  text-decoration-none text-dark">tjhotel@gmail.com</a>
                  <h5 class="mt-4">Follow us</h5>
            <a href="#" class="d-inline-block  text-dark fs-5 me-2">
               <i class="bi bi-twitter me-1"></i>
           
            </a>
           
            <a href="#" class="d-inline-block mb-3  text-dark fs-5 me-2">
                  <i class="bi bi-facebook"></i>
            </a>
            
            <a href="#" class="d-inline-block mb-3 text-dark fs-5 ">
                <i class="bi bi-instagram"></i>
                
            </a>
                </div>
                </div>
                
                <!-- Wifi2 -->
                <div class="col-lg-6 col-md-6  px-4">
                <div class="bg-white rounded shadow p-4 ">
                <from method="POST" action="send_message.php">
                  <h5>Send a message</h5>
                  <div class="mt-3">
                    <label  class="form-label" style="font-weight: 500;">Name</label>
                    <input name="name" required type="text" class="form-control shadow-none">                        
                  </div>
                  <div class="mt-3">
                    <label  class="form-label" style="font-weight: 500;">Email</label>
                    <input name="email" required type="email" class="form-control shadow-none">                        
                  </div>
                  <div class="mt-3">
                    <label  class="form-label" style="font-weight: 500;">Subject</label>
                    <input name="subject" required type="text" class="form-control shadow-none">                        
                  </div>
                  <div class="mt-3">
                    <label  class="form-label" style="font-weight: 500;">Message</label>
                    <textarea name="message" required class="form-control shadow-none"  rows="5" style="resize: none;"></textarea>                    
                  </div>
                  <button type="submit" name="send" class="btn text-white custom-bg mt-3">
                    Send
                  </button>
                </from>
                </div>
                </div>
               
            </div>
          </div>
     
    <!-- Footer  -->

    <?php require('inc/footer.php');?> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  

    
      
  </body>
</html>