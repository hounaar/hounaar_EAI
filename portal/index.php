<?php
session_start();
if(!isset($_SESSION['anon_id'])){
    header("location: /");
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
    <link rel="stylesheet" href="/src/css/style.css">
    <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <title>HounaarEAI</title>
</head>

<body>

    <div class="container" id="container1">
        <div class="row">
            <img src="/src/pics/logo.png" class="img-fluid" alt="">
        </div>
        <form action="ai.php" method="GET" class="form-group">
            <input type="text" name="q" placeholder="TYPE COMMAND" class="form-control" required><br/>
            <div class="col btns">
                <a href=""><button class="btn btn-outline-danger apply">Apply</button></a>
                <a class="btn btn-outline-warning" href="/src/php/logout.php?q=<?php echo $SESSION['anon_id'];?>">Logout</a>
            </div>
        </form>
    </div>



  

</body>
</html>
