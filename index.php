<?php
session_start();
if(isset($_SESSION['anon_id'])){
    header("location: /portal/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


   <title>HounaarEAI</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="/src/pics/logo.png" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" >enter</a>

            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal first fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">What do you want to do?</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
            <button data-bs-toggle="modal" data-bs-target="#login"  class="btn btn-outline-primary">Login</button>
            <button data-bs-toggle="modal" data-bs-target="#signup"  class="btn btn-outline-danger">Signup</button>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form class="form-group login">
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required><br/>
                <input type="password" name="password" required placeholder="Enter your password" class="form-control"><br/>
                <button class="btn login-btn btn-outline-primary">Login</button>
                <div class="col error mt-3"></div>

            </form>

        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Signup</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form class="form-group signup">
                <input type="text" name="id" class="form-control" placeholder="Enter your username" required><br/>
                <input type="text" name="mail" class="form-control" required placeholder="Enter your email"><br/>
                <input type="password" name="passcode" required placeholder="Enter your password" class="form-control"><br/>
                <button class="btn signup-submit btn-outline-danger">Signup</button>
                <div class="col error mt-3"></div>


            </form>    
        </div>
        
      </div>
    </div>
  </div>
  <script type="text/javascript" src="/src/js/signup.js"></script>
  <script type="text/javascript" src="/src/js/login.js"></script>
  
</body>