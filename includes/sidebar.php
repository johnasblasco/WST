<!-- =============== Navigation ================ -->
<div>
    <div class="navigation">
        <ul>
            <li>
                <a href="dashboard.php">
                    <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <span class="title">Howdy, <?php echo ucfirst( $_SESSION['username']); ?> </span>
                </a>
            </li>

            <li>
                <a href="dashboard.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="create.php">
                    <span class="icon">
                        <ion-icon name="create-outline"></ion-icon>
                    </span>
                    <span class="title">CREATE</span>
                </a>
            </li>

            <li>
                <a href="read.php">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">READ</span>
                </a>
            </li>

            <li>
                <a href="update.php">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">UPDATE</span>
                </a>
            </li>

            <li>
                <a href="delete.php">
                    <span class="icon">
                        <ion-icon name="trash-outline"></ion-icon>
                    </span>
                    <span class="title">DELETE</span>
                </a>
            </li>

            <!-- hr -->
            <hr style="background-color: white; height:2px ">
            <!-- /hr -->
            <li>
                <a href="admin.php">
                    <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <span class="title">ADMIN   </span>
                </a>
            </li>
            <li>
                <a href="../index.php">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>