<DOCTYPE html>
    <head>
        <title> Result </title>

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
        text-align:center;
        font-size: 30px;
        background: transparent;
        backdrop-filter: blur(5px);
        margin-top: 100px;
        width: 400px;
        /* justify-content: center; */
        height: 285px;
        border-radius: 8px;
        box-shadow: 2px 2px 2px 3px;
        transition-duration: 4s;
        
    }
    .cont1{
        margin-top: 100px;
        color: white;

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
    .btn:hover{
        border-color: black;
        border: 1px;
        cursor: pointer;
        transition-duration: 0.6s;
        background-color: black;
    }
    </style>

<?php

session_start();
if(!isset($_SESSION['USERNAME']))
{
    header("Location:quiz.php");
}


if($_SERVER['REQUEST_METHOD']=="POST")
{
   
$servername = "localhost";
$username = "root";
$password = "";
$database = "vit";
$conn = mysqli_connect($servername, $username, $password, $database);

$count = 0;
$correct = 0;
$wrong = 0;
$i = 0;


// echo $_POST[$i];

for($i=1;$i<=5;$i++)
{
    $sql = "SELECT ANS FROM RESULT WHERE QN ='$i' ";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    if($_POST[$i]== $row['ANS'])
    {
        $count += 1;
        $correct += 1;
    }
    else{
        $count += 0;
        $wrong += 1;
    }
    
}

}

?>
</head>
<body>
       <center><h1 style="margin-top:50px; font-size: 50px; color: white;">Results:</h1>
        <div class="container">
            <div class="cont1">
        <br>ID: <?php echo $_SESSION['USERNAME']; ?><br>
        Duration: 2 minutes<br>
        Total Questions: <?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM result")); ?><br>
        Total score: <?php echo ($correct+$wrong)*2 ; ?> <br>
        Your score: <?php echo $count*2 ; ?><br>
        <button  class="btn" onClick="fn()" id="btn2">Done</button>
      

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
</html>
<?php
session_unset();
session_destroy();

// Developed By Amar

?>
        