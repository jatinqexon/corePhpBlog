<?php
    session_start();
    if(!$_SESSION['email']){
        
        echo "please login first";
        header("Location:login.php");
        exit();
    }

    include "config.php";
    include "header.php";

    $email = $_SESSION['email'];
    // echo $email;
    // die;
    $sql = "SELECT * FROM users_new WHERE email ='$email'";
    
    $res = mysqli_query($conn,$sql);
    if ($result=$res->fetch_array())
    { 
       
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $profession = $_POST["profession"];
        
        
        $about = $_POST["about"];
        $image=$_FILES["uploadImg"]["name"];

        if($image == ""){
            $sql = "UPDATE users_new SET name = '".$name."' , email = '".$email."' , gender = '".$gender."' ,
            profession = '".$profession."' ,  about = '".$about."' 
            WHERE id = '".$id."'";
        }

        else{

            $target_dir = "images/" ;
            $target_file = $target_dir . basename($_FILES["uploadImg"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["uploadImg"]["tmp_name"]);

            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } 
            else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                exit();
            } 
            else {
                if (move_uploaded_file($_FILES["uploadImg"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["uploadImg"]["name"]). " has been uploaded.";
                } 
                else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            $sqld = "SELECT image FROM users_new WHERE id = '".$id."'" ;



            unlink("images/");

            $sql = "UPDATE users_new SET name = '".$name."' , email = '".$email."' , gender = '".$gender."' ,
                    profession = '".$profession."' ,  about = '".$about."' ,image = '".$image."' 
                    WHERE id = '".$id."'";

            

        }
                

        if ($conn->query($sql) === TRUE) {
            // echo "successfully update";
            header("Location:profile.php");
            
        }
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>

    <form action ="profile.php"  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div>
                <label for="name"> Name:</label>
                <input class="form-control" type ="text" name ="name" value="<?php echo $result['name'] ?>" >
            </div>
            <div>
                <input class="form-control" type ="hidden" name ="id" value="<?php echo $result['id'] ?>" >
            </div>
            <div>
                <label for="email"> Email:</label> 
                <input class="form-control" type ="text" name ="email" readonly value="<?php  echo $result['email'] ?>" >
            </div>
            <div>
                <label for="profession"> Profession:</label> <?php $select = $result['profession'];  ?>
                <select name="profession">
                    <option value="Select" <?php if ($select =="Select"){?>  selected <?php } ?>>Select</option>
                    <option value="programmer" <?php if ($select =="programmer"){?>  selected <?php } ?>>programmer</option>
                    <option value="business" <?php if ($select =="business"){?>  selected <?php } ?>>business</option>
                    <option value="backend" <?php if ($select =="backend"){?>  selected <?php } ?>>backend</option>
                    <option value="frontend" <?php if ($select =="frontend"){?>  selected <?php } ?>>frontend</option>
                </select>
            </div>
            <div>
                <label for="gender"> Gender:</label> <?php $check = $result['gender'];  ?>
                <input class="form-control" type = "radio" name = "gender" value ="Male" <?php if ($check =="male"){?>  checked <?php } ?> >male
                <input class="form-control" type = "radio" name = "gender" value ="Female" <?php if ($check =="female"){?>  checked <?php } ?> >female
                <input class="form-control" type = "radio" name = "gender" value = "Other" <?php if ($check =="other"){?>  checked <?php } ?> >other
            </div>
            <div>
                <label for="about"> About:</label>
                <input class="form-control" type ="text" name ="about" value="<?php echo $result['about'] ?>" >
            </div>
            <div class="" style="margin-top: 2%; margin-bottom: 2%">
                <img src ="images/<?php echo $result['image'] ?>" id="imgLogo" style="width: 100px; height:100px;border:1px solid "></div>
                <input class="form-control" type ="file" name ="uploadImg" id="uploadImg">
            </div>
           
            
        </div>  
        <div>
            <input type = "submit" style="color:red; margin-top:2%" name = "update" value = "Update">
        </div>
    </form>

  <?php include "footer.php";  ?>

  <style>
    form {
    background-color: antiquewhite;
    margin: 0 auto;
    margin-top: 4%;
    font-family: Raleway;
    padding: 1%;
    width: 25%;
    min-width: 30%;
  }
</style