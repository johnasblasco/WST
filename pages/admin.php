<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | PHP</title>
    <?php include('../includes/icon.html');?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <style>
        img{
            width:30px;
            height:30px;
        }
        #pic{
            width:65px;
            height:55px;
        }
        *{
            margin: 0;
            paddding: 0;
            box-sizing: border-box;
        }
        #container{
            display:grid;
            grid-template-columns: 1fr auto auto;
            margin-bottom: 10px;
        }
        #search-input, #search-button{
            height: 40px;
        }
        #search-button{
            background-color: var(--blue2);
            color: white;
            font-weight: bold;
        }
        #btn{
            font-size: large;
            padding: 10px;
            margin-bottom: 10px;
            border:none;
            color: white;
            background-color: limegreen;
        }
        tr:nth-child(even) {
                background-color: #f2f2f2;
            }

        table{
            
            border: none;   
            text-align: center;
        } 
        th,td{
            border: none;
        }
        table{
            width: 100%;   
            
        }
        th{
            
            background-color: lightgray;
        }
        #hid{
            display: flex;  
            justify-content: center;
        }
        #ed{
            margin-right:4px;
        }
        
    </style>
</head>
<body>


    <?php include '../includes/header.php' ?>
    <?php include '../includes/sidebar.php' ?>
    
    <div class="main container">
        <div id="container">
          
            <input type="text" id="search-input" placeholder="Search by id Code" />
            <button id="search-button" onclick="searchID()">Search</button>
        </div>
            <table cellspacing="5" cellpadding="5" border="1" id="user-table">
                <tr>
                    <th>Profile Picture</th>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                <?php
                $xml = simplexml_load_file('../database/users.xml');

                // <user>
                //     <profile_picture>assets/icon.png</profile_picture>
                //     <id>2</id>
                //     <fname>John</fname>
                //     <lname>Doe</lname>
                //     <email>johndoe@example.com</email>
                //     <username>johndoe</username>
                //     <password>password</password>
                //     <phone>1234567890</phone>
                // </user>
                
                if ($xml) {
                    foreach ($xml->user as $user) {
                        echo "<tr>";
                        echo "<td><img id='pic' src='../assets/" . $user->profile . "'></td>";
                        echo "<td>" . $user->id . "</td>";
                        echo "<td>" . $user->fname . " " .  $user->lname .  "</td>";
                        echo "<td>" . $user->email . "</td>";
                        echo "<td>" . $user->phone . "</td>";
                        echo "<td id = 'hid'>";
                        echo "<a href='adminedit.php?id=" . $user->id . "'><button id='ed'><img src ='../assets/update.png'></button></a>";
                        echo "<form action='admindelete.php' method='post' onsubmit='return confirm(`Are you sure you want to delete this record?`);'>";
                        echo "<input type='hidden'  name='id' value='" . $user->id . "'>";
                        echo "<button type='submit' id='del'><img src ='../assets/delete.png'></button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                    }
                } else {
                    echo "Error loading XML file.";
                }
            ?>
            </table>
        </div>

    <script>
        function searchID() {
            var searchTerm = document.getElementById('search-input').value;
            window.location.href = 'adminedit.php?id=' + searchTerm;
        }
    </script>
<script src="../bootstrap/js/script.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>