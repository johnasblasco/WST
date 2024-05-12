<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>READ | PHP</title>
    <?php include('../includes/icon.html');?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
</head>
<body>


    <?php include '../includes/header.php' ?>
    <?php include '../includes/sidebar.php' ?>

    <!-- pogi ko -->
    <div class=" main container">
      <h1 class="text-center">READ POST</h1>  

      <?php 
        $xml = simplexml_load_file("../database/data.xml");
        
        if($xml){
            echo'<div class="row row-cols-1 row-cols-sm-2 g-3">';
            foreach($xml->post as $post){
            //   =======GRID CARDS=======
                
                   echo' <div class="col">';
                    echo'   <div class="card">';
                     echo' <div class="card-body"> ';
                         echo' <h5 class="card-title">POST</h5>';
                           echo' <p class="card-text">' . $post . ' </p> ';
                        echo '</div>';
                    echo'</div>';
                echo'</div>';
            //   =========GRID CARDS=======
            }
            echo "</div>";
        }

        ?>


    </div>
    

<script src="../bootstrap/js/script.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>