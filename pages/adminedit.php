<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>READ | PHP</title>
    <?php include('../includes/icon.html');?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <style>

        h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="hidden"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: var(--blue);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        input[type="submit"]:hover {    
            background-color: var(--blue2);
        }

        button {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            background-color: var(--black2);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {       
            background-color: #cf0606;
        }
        a #bck{
            width: 97%;
            margin-left: 1.5%;
        }
    </style>
</head>
<body>

    <?php include '../includes/header.php' ?>
    <?php include '../includes/sidebar.php' ?>
    <div class="main container">
    
    <?php
    ob_start(); // Start output buffering
    $userid = $_POST['original_id'] ?? $_GET['id'] ?? '';
    $xml = simplexml_load_file('../database/users.xml');
    
    if ($xml) {
        $userFound = false;
        foreach ($xml->user as $user) {
            if ($user->id == $userid) {
                $userFound = true;
                $fname = htmlspecialchars($user->fname);
                $lname = htmlspecialchars($user->lname);
                $email = htmlspecialchars($user->email);
                $phone = htmlspecialchars($user->phone);
                break;
            }
        }
        
        if ($userFound) {
            ?>
            <h2>Edit user</h2>
            <form action="adminedit.php" method="post">
                <input type="hidden" name="original_id" value="<?php echo $userid; ?>">
                <label for="fname">Admin Firstname:</label>
                <input type="text" name="fname" value="<?php echo $fname; ?>" required><br><br>
                <label for="lname">Admin Lastname:</label>
                <input type="text" name="lname" value="<?php echo $lname; ?>" required><br><br>
                <label for="email">Admin Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required><br><br>
                <label for="phone">Admin Number:</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>" required><br><br>
                <input type="submit" value="Update" onclick="window.location.href='admin.php'">
            </form>
            <a href="admin.php"><button id='bck'>Back to Home</button></a>
            <?php
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error loading XML file.";
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        foreach ($xml->user as $user) {
            if ($user->id == $userid) {
                $user->fname = $fname;
                $user->lname = $lname;
                $user->email = $email;
                $user->phone = $phone;
                break;
            }
        }

        $xml->asXML("../database/users.xml");
        echo"<script>window.location.href='admin.php'</script>";
    }
    ob_end_flush();
    ?>

    </div>

    <script src="../bootstrap/js/script.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
