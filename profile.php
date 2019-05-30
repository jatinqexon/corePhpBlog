<?php
    session_start();
    if(!$_SESSION['email']){
        
        echo "please login first";
        header("Location:login.php");
        exit();
    }
    include "header.php";
    include "config.php";
   

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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h2 style="text-align:center">User Profile Card</h2>
<div class="card">
    <img src ="images/<?php echo $result['image'] ?>" style="width:100%">
    <h1><?php echo $result['name'] ?></h1>
    
    <p><?php echo $result['profession'] ?><p>
    <p><?php  echo $result['email'] ?><p>
    <div style="margin: 24px 0;">
        <a href="#"><i class="fa fa-dribbble"></i></a> 
        <a href="#"><i class="fa fa-twitter"></i></a>  
        <a href="#"><i class="fa fa-linkedin"></i></a>  
        <a href="#"><i class="fa fa-facebook"></i></a> 
    </div>
    <p style="color: white;"><a href="edit_profile.php">Edit Profile</a></p>
</div> 
 
       
<?php include "footer.php";  ?>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>