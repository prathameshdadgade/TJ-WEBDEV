<?php
    require('inc/essenials.php');
    adminLogin();
    //session_regenerate_id(true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Settings</title>
    <?php require('inc/links.php')?>
</head>
<body class="bg-white">
  
    <?php require('inc/header.php');?>

     <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
               <h3 class="mb-4">SETTINGS</h3> 
               <!-- genaral setting -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex algin-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i> 
                                Edit
                                </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                        <p class="card-text" id="site_about"></p>    
                    </div>
                </div>
                  <!-- genaral setting modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title ">General Settings</h5>
                                </div>
                                <div class="modal-body">
                                <div class=" mb-3">
                                    <label  class="form-label">Site Title</label>
                                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>                        
                                </div>
                                    <div class=" mb-3">
                                        <label  class="form-label">About Us</label>  
                                        <textarea name="site_about" id="site_about_inp class="form-control shadow-none rows= "6" required></textarea>                    
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value=general_data.site_title,site_about.value=general_data.site_about" class="btn text-secondary shadow-none " data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit"  class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                  </div>
                            </div>  
                        </form>
                        
                    </div>
                </div>

                <!-- shutdown setting modal -->

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex algin-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Settings</h5>
                            <div class="form-check form-switch">
                                <form>
                                <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                </form>
                              </div>
                        </div>
                        <p class="card-text" >No customers will allowed to book ,when shutdown mode is turned on.</p>    
                    </div>
                </div>

                     <!-- Contact setting modal -->
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <div class="d-flex algin-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contact Settings</h5>
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i> 
                                Edit
                                </button>
                            </div>
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                    </div>
                                    <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                    </div>
                                   <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Mobile Number</h6>
                                    <p class="card-text mb-1" >
                                    <i class="bi bi-telephone-fill"></i>
                                    <span id="pn1"></span>
                                    </p>
                                    <p class="card-text" >
                                    <i class="bi bi-telephone-fill"></i>
                                    <span id="pn2"></span>
                                    </p>
                                    </div>
                                    <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text" id="email"></p>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Link</h6>
                                    
                                    <p class="card-text" >    
                                    <i class="bi bi-facebook"></i>
                                    <span id="fb"></span>
                                    </p>
                                    </div>
                                    <p class="card-text" >    
                                    <i class="bi bi-instagram"></i>
                                    <span id="insta"></span>
                                    </p>
                                    <p class="card-text mb-1" >
                                    <i class="bi bi-twitter me-1"></i>
                                    <span id="tw"></span>
                                    </p>
                                    </div>
                                    <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Iframe</h6>
                                    <iframe id="iFrame" class="border p-2 w-100"></iframe>
                                    </div>

                                    </div>
                                </div>
                            </div>   
                        </div>
                   </div>
                        <!-- contact deatils modal -->
                   <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="contacts_s_form" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title ">Contacts Settings</h5>
                                </div>
                             <div class="modal-body">
                                <div class="container-fluid p-0">
                                    <div class="row">
                                      <div class="col-md-6">
                                      <div class=" mb-3">
                                        <label  class="form-label">Address</label>
                                        <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>                        
                                      </div>
                                      <div class=" mb-3">
                                        <label  class="form-label">Google Map Link</label>
                                        <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>                        
                                      </div>
                                        <div class=" mb-3">
                                            <label  class="form-label">Phone Numbers (with country code)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"> <i class="bi bi-telephone-fill"></i>
                                                    </span>
                                                    <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-none" placeholder="Mobile Number" required>
                                                </div>  
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"> <i class="bi bi-telephone-fill"></i>
                                                    </span>
                                                    <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none" placeholder="Mobile Number">
                                                </div>                        
                                        </div>
                                            <div class=" mb-3">
                                                <label  class="form-label">Email</label>
                                                <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>                        
                                            </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class=" mb-3">
                                            <label  class="form-label">Social Links</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-facebook"></i>
                                                    </span>
                                                    <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" placeholder="Facebook" required>
                                                </div>  
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"> <i class="bi bi-instagram"></i>
                                                    </span>
                                                    <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" placeholder="Mobile Number">
                                                </div>  
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"> <i class="bi bi-twitter me-1" ></i>
                                                    </span>
                                                    <input type="text" name="tw" id="tw_inp" class="form-control shadow-none" placeholder="Mobile Number">
                                                </div>                        
                                        </div>
                                                <div class=" mb-3">
                                                        <label  class="form-label">iFrame Src</label>
                                                        <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" >                        
                                                </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      
                                    </div>
                                </div>
                                  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none " data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit"  class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                     
                                      <!-- <input type="submit" value="SUBMIT" name="submit">-->
                                </div> 
                            </div>  
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
     </div>

   <?php require('inc/scripts.php')?>
   
  <!-- script link -->
   <script src="scripts/settings.js"></script>


</body>
</html>