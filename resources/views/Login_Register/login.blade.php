<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <!-- Section: Design Block -->
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('PlantNest_USER/img/bg-img/24.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->
  
    <div class=" mx-3 mx-md-4 shadow-3-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          
          ">
      <div class="card-body py-6 px-md-3">
  
        <div class="row d-flex justify-content-center">
          <div class="col-lg-7">
            <img src="PlantNest_USER/img/logplant-removebg-preview.png" alt="" style="margin-bottom:20px;">
            <h2 class="fw-bold mb-4">Login</h2>
            <form action="{{URL:: to ('/loginadminpost')}}" method="POST" id="form">
              @Csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  </div>
                </div>
              </div>
  
              <!-- Email input -->
              <center>
              <div class="form-outline mb-3 ">
              <div class="col-md-6 mb-3 justify-content-center">
                <input type="text" class="form-control" id="first_name form3Example3" name="emailinput" value="" placeholder="Email address *" required>
              </div>
              </div>
              </center>
                
              <!-- Password input -->
              <center>
              <div class="form-outline mb-3 ">
              <div class="col-md-6 mb-4 justify-content-center">
                <input type="text" class="form-control" id="first_name form3Example3" name="passwordinput" value="" placeholder="Password *" required>
              </div>
              </div>
              </center>
              
              <div class="form-outline mb-1" style="margin-left:70px; margin-top:-20px">
              <div class="col-md-6 mb-2 justify-content-center">
              <a href="/register" class="ml-5" >Forget Password</a>
                
              </div>
              </div>
              
  
             
              <!-- Submit button -->
              <button type="submit" class="btn btn mb-3 form-control form-outline mb-3 " style="background-color:#70c645; color:white; width:250px">
                Sign in
              </button>
              @if(session('errormessage'))
              <div class="alert alert-info" role="alert">
                  <strong>{{(session('errormessage'))}}</strong>
              </div>
              @endif
              
  
              <!-- Register buttons -->
              <div class="text-center">
                <p>or register up with? <a href="/register">Register Here</a></p>

                
                </div>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>
  
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>
  
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>
  
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  </html>