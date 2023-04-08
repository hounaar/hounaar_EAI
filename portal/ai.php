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
    <div class="container mt-5">
    <form action="ai.php" method="GET" class="form-group">
            <input type="text" name="q" placeholder="TYPE COMMAND" class="form-control" required><br/>
            <div class="col btns">
                <a href=""><button class="btn btn-outline-danger apply">Apply</button></a>
                <a class="btn btn-outline-warning" href="/src/php/logout.php?q=<?php echo $SESSION['anon_id'];?>">Logout</a>
            </div>
        </form>
    </div>

<?php



include_once "/home/hounaar/Documents/projects/src/php/connection.php";

if(isset($_GET['q'])){

    $q = mysqli_real_escape_string($connection,$_GET['q']);
    $query = $connection->query("SELECT * FROM ai WHERE question = '{$q}'");
    if($query->num_rows>0){
        while($row=$query->fetch_assoc()){
            echo '

     <div class="container mt-5 mb-5" style="color:gray" data-aos="fade-up">
        
    
        <div class="row">
            <div class="col snippets">
        
                    '.$row['ai_answer'].'

            </div>
        </div>


        <div class="row">
            <h4>You can check the links for further info</h4><br/>
            <div class="col">
            <a href="'. $row['ai_link']. '">'. $row['ai_title']. '</a><br/>
            </div>
        </div>


        
    </div>
            
            
            ';
        }
    } else {
        $search_id = '';
        $key = '';
    
    
        $url = 'https://www.googleapis.com/customsearch/v1?key=' . $key . '&cx=' . $search_id . '&q=' . urlencode($q);
    
        // Send the request using cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
    
        // Parse the JSON response
        $results = json_decode($response, true);
    

        echo '<br/><br/>';
        foreach ($results['items'] as $result) {
            echo '
            <div class="container" style="color:gray;" data-aos="fade-up">
                '.$result['snippet'].'
            </div>
        ';
        
        }
        echo '<br/><br/>';
        echo '
            <div class="container" style="color:gray" data-aos="fade-up">
                You can check the links below for more informarion<br/>
                </div>';
         foreach($results['items'] as $result){
            
            echo '
            <div class="container" style="color:gray" data-aos="fade-up">
                <a href="'. $result['link']. '">'. $result['title']. '</a><br/>
            </div>';
         }
    }
}
   


?>

    



  

</body>
</html>

