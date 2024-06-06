<?php
require('admin/inc/db_config.php');
require('admin/inc/essenials.php');
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.html">TJ WEBDEV</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
            <div class="d-flex">
            <?php
            
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                 echo<<<data
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        $_SESSION[uName]
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="booking.php">Booking</a></li>
                        <li><a class="dropdown-item" href="logouts.php">Logout</a></li>
                    </ul>
                </div>
                data;
            } else {
                echo <<<data
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register
                </button>
                data;
            }
            ?>


            </div>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login_form" action="../ajax/login_register.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-square fs-3 me-3"></i>
                        User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email/Mobile</label>
                        <input type="text" name="email" required class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <input type="submit" value="login" name="login">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

  <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="register_form" name="registe_form" action="../ajax/login_register.php" method="POST">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center" >
                <i class="bi bi-person-vcard fs-3 me-2"></i>
                 User Registration</h5>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
              <div class="modal-body">
                <span class="badge rounded-pill bg-light text-dark md-3 text-wrap lh-base">
                  Note: Your details must match with your ID(Aadhaar card, Pan card, Passport, etc.)
                  that will be required during check-in.</span>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label">Name</label>
                       <input name="name" type="text" class="form-control shadow-none "requried>                        
                      </div>
                      <div class="col-md-6 p-0 mb-3">
                        <label  class="form-label">Email</label>
                       <input name="email" type="email" class="form-control shadow-none "requried>                        
                      </div>
                      <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label">Phone Number</label>
                       <input name="phonenum" type="number" class="form-control shadow-none "requried>                        
                      </div>
                      <div class="col-md-6 p-0 mb-3">
                        <label  class="form-label">Picture</label>
                       <input name="profile" type="file" accept=".jpg,.jpeg,.png,.webp" class="form-control shadow-none" placeholder="NOT required">                        
                      </div>
                      <div class="col-md-12 p-0 mb-3">
                       <label  class="form-label">Address</label>  
                       <textarea name="address" class="form-control shadow-none " requried rows="3"></textarea>                    
                      </div>
                      <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label">Pincode</label>
                       <input name="pincode" type="number" class="form-control shadow-none">                        
                      </div>
                      <div class="col-md-6 p-0 mb-3">
                        <label  class="form-label">Date of birth </label>
                       <input name="dob" type="date" class="form-control shadow-none">                        
                      </div>
                      <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label">Password </label>
                       <input name="pass" type="password" class="form-control shadow-none "requried>                        
                      </div>
                      <div class="col-md-6 p-0 mb-3">
                        <label  class="form-label">Confrim Password </label>
                        <input name="cpass" type="password" class="form-control shadow-none " required>
                       </div>
                    </div>
                  
                  </div>
                  <div class="text-center my-1">
                    <!--button type="submit" class="btn btn-dark shadow-none " -->
                    <input type="submit" value="Submit" name="submit">
                     <!-- </button> -->
                  </div>
              </div>   
        </form> 
      </div>
    </div>
  </div>

  <script>
    function alert(type,msg,position='body'){
            let bs_class=(type=='sucess')? 'alert-success':  'alert-danger';
            let element=document.createElement('div');
                element.innerHTML=` 
                   <div class="alert  ${bs_class} alert-dismissible fade show " role="alert">
                    <strong class="me-3">${msg}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>`;
                if(position=='body'){
                    document.body.append(element);
                    element.classList.add('custom-alert');
                }
                else{
                    document.getElementById(position).appendChild(element);
                }

                setTimeout(remAlert,3000);
              }
            
        function remAlert(){
                document.getElementsByClassName('alert')[0].remove();
              }
             
    //alert("innnnnn");
    document.addEventListener('DOMContentLoaded', function() {
    let register_form = document.getElementById('register-form');
    
    if (register_form) {
        register_form.addEventListener('submit', (e) => {
         e.preventDefault();

    let data=new FormData();
     
    data.append('name',register_form.elements['name'].value);
    data.append('email',register_form.elements['email'].value);
    data.append('phonenum',register_form.elements['phonenum'].value);
    data.append('address',register_form.elements['address'].value);
    data.append('pincode',register_form.elements['pincode'].value);
    data.append('dob',register_form.elements['dob'].value);
    data.append('pass',register_form.elements['pass'].value);
    data.append('cpass',register_form.elements['cpass'].value);
    data.append('register','');
    
    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();
    
    let xhr = new XMLHttpRequest();
       xhr.open("POST", "ajax/login_register.php",true);
       xhr.onload = function(){
        if (xhr.status === 200) {
           if(this.responseText=='pass_mismatch'){
            alert('error',"Password Mismatch!");
           }
           else if(this.responseText=='email_already'){
            alert('error',"Email is already registered");
           }
           else if(this.responseText=='phone_already'){
            alert('error',"Phone number is already registered");
           }
           else if(this.responseText=='mail_failed'){
            alert('error',"Cannot send confirmation email ! Server Down!");
           }
           else if(this.responseText=='ins_failed'){
            alert('error',"Registration failed! Server Down!");
           }
           else{
            alert('succes',"Registration successful");
            register_form.reset(); 
          }

         }  
     };
     xhr.send(data);
 });
    }
});
   let login_form=document.getElementById('login-form');
   login_form.addEventListener('submit',(e)=>{
    e.preventDefault();

    let data=new FormData();
     
    data.append('email_mob',login_form.elements['email_mob'].value);
    data.append('pass',login_form.elements['pass'].value);
   data.append('login','');
    
    var myModal = document.getElementById('loginModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();
    
    let xhr = new XMLHttpRequest();
       xhr.open("POST", "ajax/login_register.php",true);
       xhr.onload = function(){
        if (xhr.status === 200) {
           if(this.responseText=='inv_email_mob'){
            alert('error',"Invaild Email or Mobile number!");
           }
           else if(this.responseText=='not_verified'){
            alert('error',"Email is not verified ");
           }
           else if(this.responseText=='inactive'){
            alert('error',"Account Suspended ! Please contact Admin");
           }
           else if(this.responseText=='invalid_pass'){
            alert('error',"Incorrect Password ! ");
           }
         
           else{
             window.location=window.location.pathname;
          }

         }  
     };
     xhr.send(data);

   });
    

  </script>
  
<!-- resgister modal code -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   