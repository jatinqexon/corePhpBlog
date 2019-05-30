<?php

    if(require_once "vendor/autoload.php"){
        echo "succes";
    }

    include 'config.php';
    include "header.php";
    $mail = new PHPMailer(true);
    
    if(!empty($_SESSION['email']))
    {
        header("Location:index.php");
        exit();
    }


    

    if(isset($_POST["submit"]))
    {
        // echo " <pre>" ; print_r($_POST);print_r($_FILES);die;
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $profession = $_POST["profession"];
        $about = $_POST["about"];
        $password = md5($_POST["password"]);

        $target_dir = "images/" ;
        $image=$_FILES["uploadImg"]["name"];
        $target_file = $target_dir . basename($_FILES["uploadImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["uploadImg"]["tmp_name"]);

        // print_r($_POST);die;
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

        $sql = "INSERT INTO users_new (name,gender,email,password,profession,about,image) VALUES 
            ('$name' ,'$gender' ,'$email' ,'$password' ,'$profession' ,'$about' ,'$image')";
        

        if ($conn->query($sql) === TRUE) {

            $mail = new PHPMailer;

            //Enable SMTP debugging. 
            $mail->SMTPDebug = 3;                               
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();            
            //Set SMTP host name                          
            $mail->Host = "smtp.gmail.com";
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;                          
            //Provide username and password     
            $mail->Username = "jatin7garg@gmail.com";                 
            $mail->Password =  "7988804341" ;                        
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";                           
            //Set TCP port to connect to 
            $mail->Port = 587;                                   

            $mail->From = "jatin7garg@gmail.com";
            $mail->FromName = "7988804341";

            // $mail->addAddress($email, "Recepient Name");
            $mail->to($email,$name);

            $mail->isHTML(true);

            $mail->Subject = "Subject Text";
            $mail->Body = "<i>Mail body in HTML</i>";
            // $mail->AltBody = "This is the plain text version of the email content";

            if(!$mail->send()) 
            {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } 
            else 
            {
                // echo "Message has been sent successfully";
            }
            header("location:login.php");
            
        }
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>


<form action = "signup.php" class="modal-content" method="post" enctype="multipart/form-data">
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        
        <label for="name"><b>Name</b></label>
        <input type = "text" placeholder="Enter Name" name = "name" required>
    
    
        <label for="email"><b>Email</b></label>
        <input type = "text" placeholder="Enter email" name = "email" required>
    
    
    
        <label for="password"><b>password</b></label>
        <input type = "password" name = "password" required>
    
    
        <label for="profession"><b>Profession</b></label>
        <select name="profession" style="margin-left:2%;">
            <option value="0">Select</option>
            <option value="1">programmer</option>
            <option value="2">business</option>
            <option value="3">backend</option>
            <option value="4">frontend</option>
        </select>
        <div>
            <label for="gender"><b>Gender</b></label>
            <input type = "radio" name = "gender" style="margin-left:5%;" value ="male" checked >Male
            <input type = "radio" name = "gender" value ="female" >Female
            <input type = "radio" name = "gender" value ="other" >Other
        </div>
        <div>
            <label for="about"><b>About</b></label>
            <textarea name ="about" style="margin-left:6%;"></textarea>
        </div>
        
        <input type ="file" name ="uploadImg" id="uploadImg">

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        <div class="clearfix">
            <button type="submit" name ="submit" class="signupbtn">Sign Up</button>
        </div>   
        <!-- <input type = "submit" style="color:red; margin-top:5%; margin-left:27%" name ="submit"> -->
    
    </div>
</form>
<?php include "footer.php"; ?>
   

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>