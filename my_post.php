<?php
    $total_records=0;
    include "config.php";
    include "header.php";

    if($_SESSION['email']){
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];
    }   
    else{
        header("Location:login.php");
    } 

    

    if(isset($_GET['delete'])){
       $deleteId  = $_GET["delete"];

       $sql = "DELETE FROM blogs_user WHERE id='". $deleteId."'";
       
       $res = mysqli_query($conn,$sql);
       if($res) {
           
        header("Location:my_post.php");
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
        

        $sql = "SELECT * FROM `blogs_user` WHERE user_id = '".$id."'";
    
        
        //  LEFT JOIN users_new ON users_new.id = blogs_user.user_id;
        

        $res = mysqli_query($conn,$sql);
        if($res->num_rows > 0){
            while ($result=$res->fetch_array())
            {  
                $totalPost[] = $result;
            } 
            $total_records =  count($totalPost);
        }
        if($total_records != ""){
        
            $sql = "SELECT  users_new.name AS name,blogs_user.id,title,content
            FROM blogs_user
            LEFT JOIN users_new ON users_new.id = blogs_user.user_id
            WHERE blogs_user.user_id = '".$id."'
            LIMIT $start, $limit";
            
            
            $res = mysqli_query($conn,$sql);
            while ($result=$res->fetch_array()){
                ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:blue"><?php  echo $result['title'] ?></h5>
                                    <p class="card-text" ><?php echo nl2br($result['content']); ?></p>
                                    <a href="add_post.php?edit=<?php  echo $result['id'] ?>" class="btn btn-primary" style="margin-left: 65%;">EDIT</a>
                                    <a href="my_post.php?delete=<?php  echo $result['id'] ?>" class="btn btn-danger">DELETE</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                <?php
            }   
        }
        else{
            ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="color:blue"><?php  echo "No post" ?></h5>
                            </div>
                        </div>
                    </div>  
                </div>
            <?php
        }
        
        if($total_records != ""){
            $total_pages = ceil($total_records / $limit); 
            if($total_records>5){
                ?>   
                    <div>
                        <ul class="pagination justify-content-center">
                            <?php  if($page > 1 ){  ?>
                            <li class="page-item"><a class="page-link" href="my_post.php?page=<?php if($page>1){echo $page-1;} ?>"><</a></li>
                            <?php  }
                            for($i=1; $i<=$total_pages; $i++){
                                
                                ?>
                                    <li class="<?php if($page == $i){echo 'active';} ?> page-item"><a class="page-link" href="my_post.php?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
                                <?php
                            }
                            ?>
                            <?php if($page < $total_pages){ ?>
                            <li class="page-item"><a class="page-link" href="my_post.php?page=<?php if($page<$total_pages){echo $page+1;} ?>">></a></li>
                            <?php  } ?>
                        </ul>
                    </div>

                <?php 
            }
        }
            
    ?>

</div>
        
<?php include "footer.php"; ?>
   


