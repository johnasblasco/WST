<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $name = $_POST["id"];

    $xml = simplexml_load_file("../database/users.xml");

    if ($xml === false) {
        die('Error: Cannot load XML file');
    }

    $userFound = false;

  
    foreach ($xml->user as $user) {
        if ($user->id == $name) { 
            $dom = dom_import_simplexml($user);
            $dom->parentNode->removeChild($dom);
            $userFound = true;
            break;
        }
    }

    if (!$userFound) {
        die('Error: User not found');
    }
    $xml->asXML("../database/users.xml");
    echo"<script>alert('DELETED SUCCESSFULLY')</script>";
    header('Location: admin.php');
} else {
    echo"<script>alert('DELETE UNSUCCESSFULLY')</script>";
    header('Location: admin.php');
    exit();
  
}
?>