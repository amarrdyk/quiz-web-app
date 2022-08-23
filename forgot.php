<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
        <meta charset="utf-8">
        <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer">
        <style>

    body{
        background-image: url('qbg.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;   
        /* justify-content: center;
        font-family:"lucida grande",tahoma,verdana,arial,sans-serif;   */
    }
     
    .container
    {   
        background: transparent;
        backdrop-filter: blur(5px);
        margin-top: 100px;
        width: 400px;
        /* justify-content: center; */
        height: 400px;
        border-radius: 8px;
        box-shadow: 2px 2px 2px 3px;
        transition-duration: 4s;
        
        
    }
 

    .box{
        border: none;
        width: 80%;
        /* border-bottom: 2px solid white; */
        padding: 10px;
        font-size: 20px;
        font-weight: lighter;
        background: transparent;
        
        outline: none;
        color: white;
    }
 
 
    .box:hover{
         border-bottom: 2px solid black;
    }

    .box::placeholder{
        color: rgb(93, 129, 113);
        font-style: italic;
    }

    #us{
        margin-top: 25px;
    }
    .btn{
        background-color: transparent;
        margin-top: 20px;
        margin-left: 20px;
        margin-right:20px;
        border-radius: 30px;
        width: auto;
        height : 50px;
        font-size: 17px;
        font-weight: bolder;
        color:white;
        
    }
    #btn2{
        width: 50px;
    }
    

    .btn:hover{
        border-color: black;
        border: 1px;
        cursor: pointer;
        transition-duration: 0.6s;
        background-color: black;
    }
    #h{
        font-size: 50px;
        color: white;
    }
    #error{
        color:black;
        font-size: 20.0px;
        font-weight: bolder;
    }
    
     </style>

<?php

if(isset($_POST['us']))
{
$servername = "localhost";
$username = "root";
$password = "";
$database = "vit";

$error = " ";

$conn = mysqli_connect($servername, $username, $password, $database);
$name = $_POST['us'];
$npwd = $_POST['npwd'];
$cpwd = $_POST['cpwd']; 
$sql = "SELECT * FROM ACCOUNTS WHERE USERNAME = '$name' ";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
$num = mysqli_num_rows($res);
$valid = " ";

if(($name != null) && ($npwd != null) && ($cpwd != null) )
{
    if($num==1)
    {
        if($npwd==$cpwd)
        {
                mysqli_query($conn,"UPDATE ACCOUNTS SET PASSWORD = '$npwd' WHERE USERNAME = '$name' ");
                header("Location: quiz.php");
        }
        else{
            $error = "Password mismatch!";
        }
    }
    else{
        $error = "Username doesn't exists!";
    }
}
else 
{
    $error = "All the fields are required!";
}



}

?>
    </head>


<body>
    
    <center>
        
        <!-- <h1 style="margin-top:100px;"><i>QUIZ</i><h1> -->
        <!-- <hr style="margin-left: 250px;margin-right: 250px"> -->
    <!-- <div class = "write" id="write" >
        <h1> Ready, Set, Test!</h1>
    </div> -->

      <h1 id="h">Its Quiz Time! </h1>
      
      <div class= "container">

        <div class="container1">
        <form action="" method="POST">
            
        <input type = "text" name="us" id ="us" class="box" placeholder="Username*"><br>
       <br><input type ="password" name="npwd" id = "npwd" class="box" placeholder="New Password*"><br><br>
       <input type ="password" name="cpwd" id = "cpwd" class="box" placeholder="Confirm Password*"><br><br>  
       <input type="submit" value ="Reset Password" class="btn"></form><button  class="btn" onClick="fn()" id="btn2"><<</button>
       
       <br><h2><span id="error"><?php if(isset($_POST['us'])){echo "*".$error;} ?> </span>
       </div>
  </div>
    </center>

    <script>
        function fn()
      {
          window.location.href = "quiz.php";
      }
    </script>
</body>

<!-- Developed By Amar -->
</html>

