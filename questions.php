
<!DOCTYPE html>
<html>
    <head>
        <title>Questions</title>
        <meta charset="utf-8">
        <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer">
        <style>

    body{
        background-color: burlywood;
        
    }
    .h{
        font-size: 25px;
        color: black;
        text-align: left; 
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
     
     $error = " ";
     if(isset($_SESSION['USERNAME'])){
        if(time() - $_SESSION['loggedin_time'] > 120)
        {
            session_unset();
            session_destroy();
            header("Location:quiz.php");
        }
     }
     else{
        header("Location:quiz.php");
     }
      
     ?>
    

    </head>


<body>
    <center>
      
      <h3 id="h1" class="h">> Quiz (10 marks) </h3> <h3 id="h2" class="h">> Duration: 2 minutes </h3> 
      <h3 id="h1" class="h">> ID: <?php echo $_SESSION['USERNAME'] ?></h3>
      <hr style="margin-left: 50px; margin-right: 50px;" >
      <br><br>
      <form name="myform" action="result.php" method="POST">
      <div class="quiz  ">
      <div class ="qn1" style="text-align:left; font-size: 30px; font-weight: bolder;">
          Question1:<br>
          <p style="font-size:25px;">Brass gets discoloured in air because of the presence of which of the following gases in air?*</P>
          <input type="radio" name="1" value="Oxygen" required> Oxygen <br>
          <input type="radio" name="1" value="Hydrogen Sulphide"> Hydrogen Sulphide <br>
          <input type="radio" name="1" value="Carbon dioxide"> Carbon dioxide <br>
          <input type="radio" name="1" value="Nitrogen"> Nitrogen <br>
        </div>
     <div class ="qn2" style="text-align:left; font-size: 30px; font-weight: bolder;">   
          <br>Question2:<br>
          <p style="font-size:25px;">Which of the following is a non metal that remains liquid at room temperature?*</P>
          <input type="radio" name="2" value="Phosphorus" required> Phosphorus <br>
          <input type="radio" name="2" value="Bromine"> Bromine <br>
          <input type="radio" name="2" value="Chlorine"> Chlorine <br>
          <input type="radio" name="2" value="Helium"> Helium <br>
   </div>

   <div class ="qn3" style="text-align:left; font-size: 30px; font-weight: bolder;">
          <br>Question3:<br>
          <p style="font-size:25px;">Chlorophyll is a naturally occurring chelate compound in which central metal*<is></is></P>
          <input type="radio" name="3" value="Copper" required> Copper <br>
          <input type="radio" name="3" value="Magnesium"> Magnesium <br>
          <input type="radio" name="3" value="Iron"> Iron <br>
          <input type="radio" name="3" value="Calcium"> Calcium <br>
        </div>

    <div class ="qn4" style="text-align:left; font-size: 30px; font-weight: bolder;">
          <br>Question4:<br>
          <p style="font-size:25px;">Which of the following is used in pencils?*</P>
          <input type="radio" name="4" value="Graphite" required> Graphite <br>
          <input type="radio" name="4" value="Silicon"> Silicon <br>
          <input type="radio" name="4" value="Charcoal"> Charcoal <br>
          <input type="radio" name="4" value="Phosphorus"> Phosphorus <br>
        </div>

    <div class ="qn5" style="text-align:left; font-size: 30px; font-weight: bolder;">
          <br>Question5:<br>
          <p style="font-size:25px;">Which of the following metals forms an amalgam with other metals?*</P>
          <input type="radio" name="5" value="Tin" required> Tin <br>
          <input type="radio" name="5" value="Mercury"> Mercury <br>
          <input type="radio" name="5" value="Lead"> Lead <br>
          <input type="radio" name="5" value="Zinc"> Zinc <br>
        </div>
    
</div>

<input type="submit" name="sbmt" class="btn" > <input type="reset" value ="Clear" class="btn"></form><br>



</body>

<!-- Developed By Amar -->
</html>

