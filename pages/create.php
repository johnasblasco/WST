<?php
    session_start();

    if (isset($_POST['submit']) && !empty($_POST['post'])) {
        $xml = new DOMDocument();
        $xml->preserveWhiteSpace = false;
        $xml->load("../database/data.xml");

        $data = $_POST['post'];

        $id = $xml->getElementsByTagName('post')->length + 1;

        $newData = "
            <post id='$id'> $data </post>
        ";

        $xmlString = $xml->saveXML();
        $newXML = preg_replace('/<\\/posts>/', $newData . "\n</posts>", $xmlString);

        $xml = new DOMDocument();
        $xml->loadXML($newXML);
        $xml->save("../database/data.xml");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE | PHP</title>
    <?php include('../includes/icon.html');?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <style>
        
        
        .btns {
            width: 100%;
            padding: 10px;
            background-color: var(--blue);
            color: #fff;
            border: none;
            cursor: pointer;
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
    
    <!-- code -->
    <div class=" main container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">CREATE POST</h1>
                <form method="POST">
                <textarea class="form-control" rows="15" name="post" placeholder="Type your text here..."></textarea>
                <button class="btns  btn-block mt-3 " name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>




<script src="../bootstrap/js/script.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>