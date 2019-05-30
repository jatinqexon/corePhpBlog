<?php    
    $extra= " Click here to read more ";
    if($_SESSION['email']){
        $email = $_SESSION['email'];
    }    
    include "config.php";
    include "header.php";

    if(isset($_POST['addComment'])){
        if(!isset($_SESSION['id'])){
            header('location:login.php');
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
        $limit = 5;
        if (isset($_GET["page"])) {
                $page  = $_GET["page"];
                
        } 
        else { 
            $page=1;
        };  
        
        $start = ($page-1) * $limit;  
        

        $sql1 = "SELECT * FROM `blogs_user`";
        //  LEFT JOIN users_new ON users_new.id = blogs_user.user_id;
        

        $res1 = mysqli_query($conn,$sql1);
        while ($result1=$res1->fetch_array())
        { 
            
                $totalPost[] = $result1;
        } 
        
            $total_records =  count($totalPost);
        
        

        $sql = "SELECT  blogs_user.title,blogs_user.content ,users_new.name AS name, blogs_user.id 
                FROM blogs_user
                LEFT JOIN users_new ON users_new.id = blogs_user.user_id
                LIMIT $start, $limit";
        
        $res = mysqli_query($conn,$sql);
        while ($result=$res->fetch_array()){
            ?>
                
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="color:blue"><?php  echo $result['title']; ?></h5>
                                <p class="card-text" ><?php if(strlen($result['content']) < 180) {echo $result['content']; ?>
                                
                                <?php

                                    $blog_id = $result['id'];

                                    $sql2 = "SELECT user_comment.user_id,user_comment.comment,users_new.name FROM user_comment
                                             LEFT JOIN users_new ON users_new.id = user_comment.user_id
                                             WHERE blog_id ='".$blog_id."' ";
                                    $res2 = mysqli_query($conn,$sql2);

                                    $count = mysqli_num_rows($res2);
                                    
                                    //while($result2=$res2->fetch_array()){
                                    //     $result3[]=$result2;
                                        
                                    // }
                                    // echo count($result3);
                                    // echo "<pre>"; print_r($result3);
                                    //     die;
                                    
                                    while($result2=$res2->fetch_array()){
                                        
                                        ?>
                                            <p style="color:deepskyblue"><?php echo $result2['name']; ?></p>
                                            <p> <?php echo $result2['comment']; ?></p>
                                        <?php
                                    }
                                ?>
                                <form action="index.php" method="post">
                                    <label for="comment">Comment:</label>
                                    <textarea  name="comment" placeholder="Message" rows="4" cols="50"></textarea>
                                        <input type="hidden" name="blogId" readonly value="<?php echo $result['id']; ?>">
                                    <button type="submit" name="addComment" class="btn btn-success">Add Comment</button>
                                </form>
                                <?php } else{ echo substr($result['content'],0,180).'<a href="post.php?id='.$result['id'].'">'.$extra.'</a>' ; } ?></p>
                                <a href="#" class="btn btn-primary" style="margin-left: 85%;"><?php echo $result['name'] ?></a>
                            </div>
                        </div>
                    </div>  
                </div>
                
            <?php
                                    
        }   
        
        
        $total_pages = ceil($total_records / $limit); 
        if($total_records>5){
            ?>   
                <div>
                    <ul class="pagination justify-content-center">
                        <?php  if($page > 1 ){  ?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php if($page>1){echo $page-1;} ?>"><</a></li>
                        <?php  }
                        for($i=1; $i<=$total_pages; $i++){
                            
                            ?>
                                <li class="<?php if($page == $i){echo 'active';} ?> page-item"><a class="page-link" href="index.php?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
                            <?php
                        }
                        ?>
                        <?php if($page < $total_pages){ ?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php if($page<$total_pages){echo $page+1;} ?>">></a></li>
                        <?php  } ?>
                    </ul>
                </div>
                
            <?php 
        }
            
    ?>

</div>
<?php include "footer.php"; ?>
   
        
