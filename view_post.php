<?php
    $total_records=0;
    include 'config.php';
    include "header.php";

    if($_SESSION['admin'] == 0) {
        header("location:login.php");
        exit();
    }

    
    if(isset($_GET['delete'])){
        $deleteId  = $_GET["delete"];
        if(isset($_GET['view'])){
            $userId = $_GET["view"];
        }
        
        $sql = "DELETE FROM blogs_user WHERE id='". $deleteId."'";
        
        $res = mysqli_query($conn,$sql);
        if($res) {
            
         header("Location:view_post.php?view=$userId");
        }
         
    }

?>

<div class="container">
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>    
            </tr>
        </thead>
        <tbody>
            <?php 

                // for pagination
                if(isset($_GET['view'])){
                    $userId = $_GET["view"];
                } 

                $sql1 = "SELECT * FROM `blogs_user`
                WHERE user_id='".$userId."'";

                $res1 = mysqli_query($conn,$sql1);

                if($res1->num_rows > 0){
                    while ($result=$res1->fetch_array())
                    {                   
                        $totalPost[] = $result;
                    } 
                     $total_records =  count($totalPost);
                    
                }
                if($total_records != ""){
                    if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        
                    } 
                    else { 
                        $page=1;
                        
                    };  
                    $limit = 10;
                    $srNo=($page-1)*$limit;
                    $start = ($page-1) * $limit; 

                    // For datashow
                    $sql = "SELECT id,title,content FROM blogs_user
                    WHERE user_id='".$userId."'
                    LIMIT $start, $limit";

                    $res = mysqli_query($conn,$sql);
                    if ($res->num_rows > 0){
                        while($row = mysqli_fetch_assoc($res)){
                        $srNo = $srNo+1;
                            ?>
                                <tr>
                                    <td> <?php echo $srNo ?> </td>
                                    <td> <?php echo $row['title'] ?> </td>
                                    <td> <?php echo substr($row['content'],0,50) ?> </td>
                                    <td> <a href="view_post.php?delete=<?php  echo $row['id'].'&view='.$userId; ?>" class="btn btn-danger">DELETE</a> </td>
                                </tr>
                            <?php
                        }
                    }   
                }
                else{
                    ?>
                        <tr>
                            <td style="color:blue;"> <?php echo "No Data In Table" ?> </td>
                        </tr>
                    <?php
                }
            ?>

        <tbody>
    </table>

    <?php
            
        //pagination code
        if($total_records != ""){
            $total_pages = ceil($total_records / $limit); 
            if($total_records>10){
                ?>   
                    <div>
                        <ul class="pagination justify-content-center">
                            <?php  if($page > 1 ){  ?>
                            <li class="page-item"><a class="page-link" href="view_post.php?page=<?php if($page>1){echo ($page-1).'&view='.$userId;} ?>"><</a></li>
                            <?php  }
                            for($i=1; $i<=$total_pages; $i++){
                                
                                ?>
                                    <li class="<?php if($page == $i){echo 'active';} ?> page-item"><a class="page-link" href="view_post.php?page=<?php echo $i.'&view='.$userId ?>"><?php echo $i; ?></a></li>
                                <?php
                            }
                            ?>
                            <?php if($page < $total_pages){ ?>
                            <li class="page-item"><a class="page-link" href="view_post.php?page=<?php if($page<$total_pages){echo ($page+1).'&view='.$userId;} ?>">></a></li>
                            <?php  } ?>
                        </ul>
                    </div>
                    
                <?php 
            }
        }
        

    ?>

</div>
<?php include "footer.php"; ?>