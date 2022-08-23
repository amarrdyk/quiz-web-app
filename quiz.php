<!DOCTYPE html>
<html>
    <head>
        <title>QUIZ</title>
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
        margin-top: 50px;
    }
    .btn{
        background-color: transparent;
        margin-top: 20px;
        margin-left: 20px;
        margin-right:20px;
        border-radius: 30px;
        width: 20%;
        height : 50px;
        font-size: 17px;
        font-weight: bolder;
        color:white;
        
    }
    #btn2{
        width: 100px;
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
    #fg{
        color: white;
        text-decoration: none;
        font-style: italic;
        
    }
    #fg:hover{
        text-decoration: underline;
        color: skyblue;
    }
    #error{
        color:black;
        font-size: 20px;
        font-weight: bolder;
    }
    
     </style>

<?php

session_start();


if(isset($_POST['us']))
{
$servername = "localhost";
$username = "root";
$password = "";
$database = "vit";

$error =" ";

$conn = mysqli_connect($servername, $username, $password, $database);
$name = $_POST['us'];
$pwd = $_POST['pwd'];
$sql = "SELECT * FROM ACCOUNTS WHERE USERNAME = '$name' AND PASSWORD = '$pwd' ";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

if(($name != null) && ($pwd != null))
{
 if(mysqli_num_rows($res)==1)
{
    $_SESSION['USERNAME'] = strtoupper("$name");    // session variable that store name
    $_SESSION['loggedin_time'] = time(); // session variable that store current time
    header("Location: questions.php");
}
 else 
{
    $error = "Username or Password does not match!";
}
}
else{
    $error = "All the fields are required!";
}

// else if(isset($pwd) && isset($name))
// {
//     if(!mysqli_num_rows($res)==1)
//     {
//         $error = "Username or Password does not match !";
//     }
// }

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
            
        <input type = "text" name="us" id ="us" class="box" placeholder="Username"><br>
       <br><input type ="password" name="pwd" id = "pwd" class="box" placeholder="Password"><br><br> 
       <input type="submit" value ="Login" class="btn"></form><button  class="btn" onClick="fn()" id="btn2">Sign Up</button>
       <br><br><a href="forgot.php" id="fg">Forgotten password? </a>
       <br><h2><span id="error"><?php if(isset($_POST['us'])){echo "*".$error;} ?> </span>
       </div>
  </div>
    </center>

    <script>
        function fn()
      {
          window.location.href = "signup.php";
      }
    </script>
</body>

<!-- Developed By Amar -->
</html>

