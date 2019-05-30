<?php

    if($_SESSION['email']){
        $email = $_SESSION['email'];
    } 
     
    include "config.php";
    include "header.php";

    if(isset($_GET['id'])){
        $blog_id=$_GET['id'];

    }
    else{
        header("location:index.php");
    }
    if(isset($_POST['addComment'])){
        if(!isset($_SESSION['id'])){
            header('location:login.php');
            exit();
        }
        if(empty($_POST['comment'])){
            
            exit();
        }
        $comment =$_POST['comment'];
        $user_id =$_SESSION['id'];
        $blogId =$_POST['blogId'];

        $sql = "INSERT INTO user_comment (user_id,comment,blog_id) VALUES ('$user_id', '$comment' ,'$blogId')";

        if ($conn->query($sql) === TRUE) {
            echo "successfully commented";
            
        }
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }
    

?>


<div class="container">
    <?php
        $sql = "SELECT blogs_user.title,blogs_user.content , blogs_user.id 
        FROM blogs_user WHERE blogs_user.id='".$blog_id."' ";
        
        
        $res = mysqli_query($conn,$sql);

        while ($result=$res->fetch_array())
        {
        ?>
        <div class="row justify-content-center">
            <div class="col-sm-6 middle">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color:blue"><?php  echo $result['title']; ?></h5>
                        <p class="card-text" ><?php echo $result['content']; ?> </p>
                        
                        <?php

                            $blog_id = $result['id'];

                            $sql2 = "SELECT user_comment.user_id,user_comment.comment,users_new.name FROM user_comment
                                LEFT JOIN users_new ON users_new.id = user_comment.user_id
                                WHERE blog_id ='".$blog_id."' ";
                            $res2 = mysqli_query($conn,$sql2);

                            while($result2=$res2->fetch_array()){
                                
                                ?>
                                    <p style="color:deepskyblue"><?php echo $result2['name']; ?></p>
                                    <p> <?php echo $result2['comment']; ?></p>
                                <?php
                            }
                        ?>
                        <form action="#" method="post">
                            <label for="comment">Comment:</label>
                            <textarea  name="comment" placeholder="Message" rows="4" cols="50"></textarea>
                                <input type="hidden" name="blogId" readonly value="<?php echo $result['id']; ?>">
                            <button type="submit" name="addComment" class="btn btn-success">Add Comment</button>
                        </form>
                    
                        
                    </div>
                </div>
            </div>  
        </div>
            
    <?php }  ?>            
</div>
    <?php include "footer.php"; ?>
   

    
    


