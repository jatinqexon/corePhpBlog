<?php
    
    if(empty($_SESSION)){
        session_start();}
    
        $check = 0;

    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        $email = $_SESSION['email'];
        $admin= $_SESSION['admin'];
        $check =1;
    }    

    include "config.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/bootstrap.css">    
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <script src="assets/js/bootstrap.min.js"></script>

    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-light">
                
                <a href="index.php" class="navbar-brand">Myproject.com</a>
                <ul class="navbar-nav ml-auto">
                    <?php if($check == 0){ ?>
                    
                        <li class="nav-item">
                            <a href="signup.php" class="nav-link"> Sign Up</a>
                        </li>
                        <li class="nav-item"><a href="login.php" class="nav-link"> Login</a></li>
                
                    <?php } else if($check == 1 && $admin==0){?>
                
                        <li class="nav-item">
                            <a href="my_post.php" class="nav-link">MyPost</a>
                        </li>
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="add_post.php" class="nav-link">AddPost</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                    
                    <?php } else if($admin==1){ ?>
                        <li class="nav-item">
                            <a href="admin_home.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="my_post.php" class="nav-link">MyPost</a>
                        </li>
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="add_post.php" class="nav-link">AddPost</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                        
                    <?php } ?>

                </ul>
    
        </nav>
    