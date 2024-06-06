<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        
       
        document.addEventListener('DOMContentLoaded', function () {
         // Your code here


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

                setTimeout(remAlert,2000);
              }
              function remAlert(){
                document.getElementsByClassName('alert')[0].remove();
              }


     });
    </script>
   