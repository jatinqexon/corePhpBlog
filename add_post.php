<?php
    session_start();
    if(!$_SESSION['email']){
        header("Location:login.php");
        exit();
    }

    include "config.php";
    include "header.php";

    $editId = "";

    if(isset($_POST['add'])){
        $editId = $_POST['updateId'];
        $title =$_POST['title'];
        $content =$_POST['content'];
       
        $user_id = $_SESSION['id'];
        
        if($title !="" && $content !="" &&  $editId == ""){

            $sql= "INSERT INTO blogs_user (user_id,title,content) VALUES ('$user_id' ,'$title' ,'$content')";

            if ($conn->query($sql) === TRUE) {
                echo "successfully submit";
                
            }
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        else if(!empty($editId)){

            $sql = "UPDATE blogs_user SET title ='".$title."' , content='".$content."'
            WHERE id='".$editId."' ";
            

            $res = mysqli_query($conn,$sql);

            if($res) {
                
                header("Location:my_post.php");
             }

        }
        else{
            return "error";
        }
        
    }


?>

<!DOCTYPE html>
<html>
    <head>  
           
    </head>
    <body>
      
        <form action="add_post.php" method="post" enctype="multipart/form-data">
            <?php
            
                if(isset($_GET['edit']) && !empty($_GET['edit'])){
                    $editId = $_GET['edit'];    

                    $sqlGet = "SELECT * FROM blogs_user WHERE id='".$editId."'";

                    $res = mysqli_query($conn,$sqlGet);
                    while($resultGet=$res->fetch_array()){
                        ?>

                            <div>
                                <label for ="title" style="margin-left:3%; color:red">Title</label>
                                <input type ="text" name="title" style=" margin-top:5%;" placeholder="Enter Title" value="<?php echo $resultGet['title']; ?>" > 
                            </div>
                            <div>
                                <label for="content" style="margin-left:1%; color:red">Content:</label>
                                <textarea name ="content" style=" margin-top:1%;" rows="5" cols="40" placeholder="Enter content">:<?php echo $resultGet['content']; ?></textarea>
                            </div>
                            <div>
                                <input type ="hidden" name="updateId" value="<?php echo $resultGet['id']; ?>">
                                <input type = "submit" style="color:red; margin-top:1%; margin-left:15%;" name = "add" value = "Add">
                            </div>
                            
                        <?php 
                    }
                }
                else{
                    ?>
                        <div>
                            <label for ="title" style="margin-left:3%; color:red">Title</label>
                            <input type ="text" name="title" style=" margin-top:5%;" placeholder="Enter Title"> 
                        </div>
                        <div>
                            <label for="content" style="margin-left:1%; color:red">Content:</label>
                            <textarea name ="content" style=" margin-top:1%; white-space:pre-wrap;" rows="5" cols="40" placeholder="Enter content"></textarea>
                        </div>
                        <div>
                            <input type ="hidden" name="updateId">
                            <input type = "submit" style="color:red; margin-top:1%; margin-left:15%;" name = "add" value = "Add">
                        </div>
                        <?php

                }
            ?>
            
           
        </form>
    </body>
</html>