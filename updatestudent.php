<?php
session_start();
if(isset($_SESSION['uid'])){
   
    
}
else{
    
     header('location: login.php');
}
?>
<?php
mysql_connect('localhost','root','') or die(mysql_error);
mysql_select_db("sms") or die(mysql_error);
$id = 21;
?><?php

if (isset($_GET['id'])){
	
	//echo $_GET['id'];
	$id = $_GET['id'];

$readQuery = "select * from record where id = " . $id;
$result = mysql_query($readQuery);
if($data = mysql_fetch_assoc($result)){

    // echo 'data display';
}}
?>
<?php
if (isset($_POST['update'])){
    
 
 $name   = trim($_POST['name'],' ');  
 $fname  = trim($_POST['fname'],' ');   
 $sname  = trim($_POST['sname'],' ');   
 $nation = trim($_POST['nation'],' '); 
 $city   = trim($_POST['city'],' ');  
 $state  = trim($_POST['state'],' ');  
 $dob    = trim($_POST['dob'],' '); 
 $gender = trim($_POST['gender'],' ');  
 $email  = trim($_POST['email'],' '); 
 $add    = trim($_POST['add'],' '); 
 $phone  = trim($_POST['phone'],' '); 
 $batch  = trim($_POST['batch'],' '); 
 $dept   = trim($_POST['dept'],' ');  
 $rollno = trim($_POST['rollno'],' '); 
 
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     echo '
     <script> alert("Please enter valid email address");
     window.open("updatestudent.php?id='.$id.'", "_self");</script>
     ';
 }
 else if (strlen($phone) != 11){
     echo '
     <script> alert("Please enter valid phone number");
     window.open("updatestudent.php?id='.$id.'", "_self");</script>
    </script>         
    ';
     
 }
 else if ($dept == "Select Department"){
     echo '
     <script> alert("Please select department");
     window.open("updatestudent.php?id='.$id.'", "_self");
    </script>         
    ';
     exit();
 }
 
 else if ($batch == "Select Batch"){
     echo '
     <script> alert("Please select batch");
     window.open("updatestudent.php?id='.$id.'", "_self");
    </script>         
    ';
     exit();
 }
 
 else{
   
  $updateQuery = "UPDATE `record` SET"
        . "`name`= '"     .$name.  "'"  
        . ",`fname`= '"   .$fname.  "'" 
        . ",`sname`= '"   .$sname.  "'" 
        . ",`nation`= '"  .$nation.  "'" 
        . ",`city`= '"    .$city.  "'" 
        . ",`state`= '"   .$state.  "'" 
        . ",`dob`= '"     .$dob.  "'" 
        . ",`gender`= '"  .$gender.  "'" 
        . ",`email`= '"   .$email.  "'" 
        . ",`add`= '"     .$add.  "'" 
        . ",`phone`= '"    .$phone. "'"
        . ",`batch`= "    .$batch
        . ",`dept`= '"    .$dept.  "'" 
        . ",`rollno`= "   .$rollno 
        . "  WHERE id = ".  $id;
if(mysql_query($updateQuery)){
    echo' <script> 
      
alert("Congrats! Inforamtion updated successfully");
window.open("showstudent.php", "_self");
   </script>';
}
 else {
    echo "<br>".mysql_error();
   /*echo' <script> 
   // alert("Error");
window.open("updatestudent.php", "_self");
 </script>';*/
    
    }
   
  }

    
}
?>

<?php
include('function.php');
mainHeader();
?>

<span class="btnLogin">  <a class="a" href="logout.php">Logout</a> </span>
 <?php echo"</div>"?>
 
     
 </style>
 <div class="heading">Update Student Information<label>User : <?php echo ucfirst($_SESSION['un']);?></label>
     <form action="showstudent.php">   
 <input  type="submit" value="←" name="back" class="btnback">
  </form>
</div>
 <form action="showstudent.php.php">   
 <input  type="submit" value="←" name="back" class="btnback">
  </form> 
 <div >
     <img src="img/img2.png" width="100%" height="560px">
 
 <div class="addStd">
   
     <form action="" method="post">
        <table class="addStdTable">
            <tr>
                <td>
                   <p>Name</p>
                   <input type="text" maxlength="20" minlength="3" name="name" placeholder="Enter a name" tabindex="1" value=" <?php echo $data['name'];?>"required="required">  
                    
                    <p>Father Name</p>
                    <input type="text" maxlength="20" minlength="3" name="fname" placeholder="Enter a father name" tabindex="2" value=" <?php echo $data['fname'];?>"required="required">  
                    
                    <p>Sur Name</p>
                    <input type="text" maxlength="10" minlength="3" name="sname" placeholder="Enter a sur name" tabindex="3" value=" <?php echo $data['sname'];?>"required="required">  
                    
                    <p>Nationality</p>
                    <input type="text" maxlength="15" minlength="3" name="nation" placeholder="Enter a nationality" tabindex="4" value=" <?php echo $data['nation'];?>"required="required">  
                    
                    <p>City</p>
                    <input type="text" maxlength="15" minlength="3"name="city" placeholder="Enter a city" tabindex="5" value=" <?php echo $data['city'];?>" required="required">  
         </td>
                
                
                <td>
                    <p>State</p>
                    <input type="text" maxlength="15" minlength="3"name="state" placeholder="Enter a state" tabindex="6" value=" <?php echo $data['state'];?>" required="required">  
                    <?php 
                     $date = date('Y-m-d', strtotime($data['dob']));
                    ?>
                    <p>DOB</p>
                    <input type=date name="dob" maxlength="8" minlength="8" placeholder="Enter a date" tabindex="7" value="<?php echo $date;?>" required="required">
                    
                    <p>Gender</p>
                    <?php 
                    
                    
                    if( $data['gender']== "Male"){
                        echo' <input type="radio" name="gender" value="Male" tabindex="8" checked required="required">Male 
                    <input type="radio" name="gender" value="Female" tabindex="9" required="required">Female';
                   
                    }
                    else {
                        echo' <input type="radio" name="gender" value="Male" tabindex="8" required="required">Male 
                    <input type="radio" name="gender" value="Female" tabindex="9" checked required="required">Female';
                   }
                    
                    ?>
                    
                    <p>Email</p>
                    <input type="email" name="email" maxlength="25" minlength="6" placeholder="Enter a email address" tabindex="10" value=" <?php echo $data['email'];?>" required="required">  
                  
                    <p>Street Address</p>
                    <input type="text" name="add" maxlength="30" minlength="3"placeholder="Enter a street address" tabindex="11"  value=" <?php echo $data['add'];?>" required="required">  
             </td>
                
              <td>
                    <p>Phone</p>
                    <input type="number" maxlength="11" minlength="11" name="phone" placeholder="Enter a phone" tabindex="13" value="<?php echo $data['phone'];?>" required="required">  
                    
                     <p>Batch</p>
                    <select name="batch">
                    <?php
                    echo'<option  value = "Select Batch">Select Batch</option>';
                    $bh = array(2018,2017,2016,2015,2014);
                            foreach($bh as $bt){
                                    if ($bt ==  $data['batch']){

                    echo '<option  value = "'.$bt.'" selected>'.$bt.'</option>';
                                    }
                                    else{
                                    echo '<option  value = "'.$bt.'" select>'.$bt.'</option>';
                            }
                            }
                    ?>
                </select>
         
                    <p>Department</p>
                            <select name="dept">
                  <?php
                    echo'<option  value = "Select Department">Select Department</option>';
                    $s = array("Civil Enginnering","Computer Enginnering","Software Enginnering","Electrical Enginnering","Telecom Enginnering","Electonics Enginnering","Computer Science");
                            foreach($s as $sh){
                                    if ($sh ==  $data['dept']){

                    echo '<option  value = "'.$sh.'" selected>'.$sh.'</option>';
                                    }
                                    else{
                                    echo '<option  value = "'.$sh.'" select>'.$sh.'</option>';
                            }
                            }

                    ?>
                </select>
                    <p>Rollno</p>
                    <input type="number" maxlength="3" minlength="2" name="rollno" placeholder="Enter a rollno" tabindex="16" value="<?php echo $data['rollno'];?>" required="required" >
                    
                    <br> <br>
                    <input type="submit" value="Update" name="update"  class="addStdBtn">
         
    
                   
                    
                    </td>
                
            </tr>  
            
        </table>
    
    
</form>
   </div>
     </div>


 <?php
 closeTag();
 ?>