<?php 
session_start(); 

$xml = simplexml_load_file("../database/data.xml");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["update_post"])) {
    $new_post_content = $_GET["new_post_content"];
    $post_id = $_GET["post_id"];

    if ($xml) {
        foreach ($xml->post as $post) {
            if ($post['id'] == $post_id) {
                $post[0] = $new_post_content; // Update the post content
                break;
            }
        }
        
        $xml->asXML("../database/data.xml");

        // Redirect back to the same page to refresh the content
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error loading XML file.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE | PHP</title>
    <?php include('../includes/icon.html');?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <style>
        .btns{
            border: none;
            color: white;
            padding: 6px 12px;
            background-color: var(--blue);
            border-radius: 5px;
        }
        .btns:hover{
            background-color: var(--blue2);
        }
    </style>
</head>
<body>

    <?php include '../includes/header.php' ?>
    <?php include '../includes/sidebar.php' ?>

    <!-- pogi ko -->
    <div class=" main container">
        <h1 class="text-center">UPDATE POST</h1>  

        <?php 
        if($xml){
            echo'<div class="row row-cols-1 row-cols-sm-2 g-3">';
            foreach($xml->post as $index => $post){
                
                // =======GRID CARDS=======
                echo '<div class="col">';
                echo '    <div class="card">';
                echo '        <div class="card-body">';
                echo '            <h5 class="card-title">POST</h5>';
                echo '            <p class="card-text">' . htmlspecialchars($post) . '</p>';
                echo '           <form method="GET">';
                echo '              <textarea class="form-control" name="new_post_content">' . htmlspecialchars($post) . '</textarea>';
                echo '              <input type="hidden" name="post_id" value="' . $post['id'] . '">';
                echo '              <button type="submit" name="update_post" class="btn btn-primary mt-2">Update</button>';
                echo '          </form>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
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
