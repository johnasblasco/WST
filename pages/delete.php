<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    $xml = simplexml_load_file("../database/data.xml");

    if(isset($_POST['delete_post'])){
        $post_id = $_POST['post_id'];
        $new_xml = new SimpleXMLElement("<posts></posts>");
        foreach($xml->post as $post){
            if((string)$post->attributes()->id !== $post_id){
                $new_post = $new_xml->addChild('post', (string)$post);
                $new_post->addAttribute('id', (string)$post->attributes()->id);
            }
        }
        // Save changes to XML file
        file_put_contents("../database/data.xml", $new_xml->asXML());
        // Debug output to see if XML was updated
        // Alert message
        echo "<script>alert('DELETED SUCCESSFULLY!')</script>";
        echo "<script>window.location.href='delete.php'</script>";
        // Redirect to the same page
        exit();
       
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE | PHP</title>
    <?php include('../includes/icon.html');?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
</head>
<body>


    <?php include '../includes/header.php' ?>
    <?php include '../includes/sidebar.php' ?>

    <!-- pogi ko -->
    <div class="main container">
      <h1 class="text-center">DELETE POST</h1>  

      <?php 
        $xml = simplexml_load_file("../database/data.xml");
                
        if($xml){
            echo'<div class="row row-cols-1 row-cols-sm-2 g-3">';
            foreach($xml->post as $post){
            // =======GRID CARDS======
                
                echo' <div class="col">';
                echo'   <div class="card">';
                echo' <div class="card-body"> ';
                echo'   <h5 class="card-title">POST</h5>';
                echo'   <p class="card-text">' . $post . ' </p> ';
                // Form for delete
                echo '<form method="POST">';
                echo '<input type="hidden" name="post_id" value="' . $post['id'] . '">';
                echo '<button type="submit" name="delete_post" class="btn btn-danger mt-2">Delete</button>';
                echo '</form>';
                echo '</div>';
                echo'</div>';
                echo'</div>';
            // =========GRID CARDS=======
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
