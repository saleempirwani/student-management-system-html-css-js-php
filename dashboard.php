<?php
session_start();
if(isset($_SESSION['uid'])){
   
    
}
else{
    
     header('location: login.php');
}
?>
<?php
include('function.php');
mainHeader();
?>

<span class="btnLogin">  <a class="a" href="logout.php">Logout</a> </span>
 <?php 
  echo "</div>";
 ?>
 <div class="heading">Dashboard<label>User : <?php echo ucfirst($_SESSION['un']);?></label>

 </div>
 <div>
     <img src="img/img2.png"  width="100%" height="560">
 <div class="btnDashoard">
     
     <form action="showstudent.php" method="post" >
         <input type="submit" value="Show Student" name="addStd" style="float: left">
         </form>   
     
     <form action="addstudent.php" method="post" >
         <input type="submit" value="Add Student" name="showStd"style="float: right">
     </form>   
     
 </div>
 </div>
 <?php
closeTag();
 ?>