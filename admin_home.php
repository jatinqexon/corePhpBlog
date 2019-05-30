<?php
    $srNo=0;
    include 'config.php';
    include "header.php";

    if($_SESSION['admin'] == 0) {
        header("location:login.php");
        exit();
    }

    if(isset($_GET['delete'])){
        $deleteId  = $_GET["delete"];
 
        $sqlUser = "DELETE FROM users_new WHERE id='". $deleteId."'";
        
        $sqlBlogs = "DELETE FROM blogs_user WHERE user_id='". $deleteId."'";

        $sqlComment = "DELETE FROM user_comment WHERE user_id='". $deleteId."'";
       
        $res1 = mysqli_query($conn,$sqlUser);
        $res2 = mysqli_query($conn,$sqlBlogs);
        $res3 = mysqli_query($conn,$sqlComment);
        
        if($res1) {
            if($res2){
                if($res3){
                    header("Location:admin_home.php");
                }
            }
        }
         
    }
?>

<div class="container">
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Image</th>
                <th>View</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $limit = 10;
                if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        
                } 
                else { 
                    $page=1;
                };  
                
                $start = ($page-1) * $limit; 

                // for pagination
                $sql1 = "SELECT id,name,image FROM users_new";

                $res1 = mysqli_query($conn,$sql1);
                
                while ($result=$res1->fetch_array())
                {                   
                    $totalPost[] = $result;
                } 
        
                $total_records =  count($totalPost);

                // For datashow
                $sql = "SELECT id,name,image FROM users_new
                WHERE email NOT IN ('".$_SESSION['email']."')
                LIMIT $start, $limit";

                $res = mysqli_query($conn,$sql);
                if ($res->num_rows > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $srNo++;
                        ?>
                            <tr>
                                <td> <?php echo $srNo ?> </td>
                                <td> <?php echo $row['name'] ?> </td>
                                <td> <?php if($row['image'] == ""){ echo "No Profile"; } else{ ?> <img src ="images/<?php echo $row['image']?>" style="max-width:14%; max-height:10%;"><?php } ?></td>
                                <td> <a href="view_post.php?view=<?php  echo $row['id'] ?>" class="btn btn-primary">VIEW</a> </td>
                                <td> <a href="admin_home.php?delete=<?php  echo $row['id'] ?>" class="btn btn-danger">DELETE</a> </td>
                            </tr>
                        <?php
                    }
                }   
            ?>

        <tbody>
    </table>

    <?php
            
        //pagination code
        $total_pages = ceil($total_records / $limit); 
        if($total_records>10){
            ?>   
                <div>
                    <ul class="pagination justify-content-center">
                        <?php  if($page > 1 ){  ?>
                        <li class="page-item"><a class="page-link" href="admin_home.php?page=<?php if($page>1){echo $page-1;} ?>"><</a></li>
                        <?php  }
                        for($i=1; $i<=$total_pages; $i++){
                            
                            ?>
                                <li class="<?php if($page == $i){echo 'active';} ?> page-item"><a class="page-link" href="admin_home.php?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
                            <?php
                        }
                        ?>
                        <?php if($page < $total_pages){ ?>
                        <li class="page-item"><a class="page-link" href="admin_home.php?page=<?php if($page<$total_pages){echo $page+1;} ?>">></a></li>
                        <?php  } ?>
                    </ul>
                </div>
                
            <?php 
        }
        

    ?>

</div>
<?php include "footer.php"; ?>
