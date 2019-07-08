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

if (isset($_POST['submit'])){
    
 
 $name   = $_POST['name'];  
 $fname  = $_POST['fname'];  
 $sname  = $_POST['sname'];  
 $nation = $_POST['nation'];  
 $city   = $_POST['city'];  
 $state  = $_POST['state'];  
 $dob    = $_POST['dob'];  
 $gender = $_POST['gender'];  
 $email  = $_POST['email'];  
 $add    = $_POST['add'];  
 $phone  = $_POST['phone'];  
 $batch  = $_POST['batch']; 
 $dept   = $_POST['dept'];  
 $rollno = $_POST['rollno'];  
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     echo '
     <script> alert("Please enter valid email address")
     window.open("addstudent.php", "_self");</script>
     ';
 }
 else if (strlen($phone) != 11){
     echo '
     <script> alert("Please enter valid phone number");
     window.open("addstudent.php", "_self");</script>
    </script>         
    ';
 }
 
 else if ($dept == "Select Department"){
     echo '
     <script> alert("Please select department");
     window.open("addstudent.php", "_self");
    </script>         
    ';
     exit();
 }
 
 else if ($batch == "Select Batch"){
     echo '
     <script> alert("Please select batch");
     window.open("addstudent.php", "_self");
    </script>         
    ';
     exit();
 }
 
 
 else{
   $rollno = (int) $rollno;
   $batch = (int) $batch;
 $query = "INSERT INTO `record`(`name`, `fname`, `sname`, `nation`, `city`, `state`, `dob`, `gender`, `email`, `add`, `phone`, `batch`, `dept`, `rollno`) VALUES ("
                . "'".$name."',"
                . "'".$fname."',"
                . "'".$sname."',"
                . "'".$nation."',"
                . "'".$city."',"
                . "'".$state."',"
                . "'".$dob."',"
                . "'".$gender."',"
                . "'".$email."',"
                . "'".$add."',"
                . "'".$phone."',"
                . "".$batch.","
                . "'".$dept."',"
                . "".$rollno.")";
if(mysql_query($query)){
    echo' <script> 
      
alert("Congrats! Student information added sucessfully.......");
window.open("addstudent.php", "_self");
   </script>';
}
 else {
    echo "<br>".mysql_error();
   echo' <script> 
    alert("Error");
window.open("addstudent.php", "_self");
 </script>';
    
    }
   
  }

    
}


?><?php
include('function.php');
mainHeader();
?>

<span class="btnLogin">  <a class="a" href="logout.php">Logout</a> </span>
 <?php echo"</div>"?>
 
     
 </style>
 <div class="heading">Student Registration Form<label>User : <?php echo ucfirst($_SESSION['un']);?> : <?php echo '';?></label>

     <form action="dashboard.php">   
 <input  type="submit" value="←" name="back" class="btnback">
  </form>                
 </div>
 <div >
     <img src="img/img2.png" width="100%" height="560px">
 <div class="addStd">
   
     <form action="addstudent.php" method="post" enctype="">
        <table class="addStdTable">
            <tr>
                <td>
                    <p>Name</p>
                    <input type="text" maxlength="20" minlength="3" name="name" placeholder="Enter a name" tabindex="1" required="required">  
                    
                    <p>Father Name</p>
                    <input type="text" maxlength="20" minlength="3" name="fname" placeholder="Enter a father name" tabindex="2" required="required">  
                    
                    <p>Sur Name</p>
                    <input type="text" maxlength="10" minlength="3" name="sname" placeholder="Enter a sur name" tabindex="3" required="required">  
                    
                    <p>Nationality</p>
                    <input type="text" maxlength="15" minlength="3" name="nation" placeholder="Enter a nationality" tabindex="4" required="required">  
                    
                    <p>City</p>
                    <input type="text"  maxlength="15" minlength="3"name="city" placeholder="Enter a city" tabindex="5"required="required">  
         </td>
                
                
                <td>
                    <p>State</p>
                    <input type="text" maxlength="15" minlength="3"name="state" placeholder="Enter a state" tabindex="6"required="required">  
                    
                    <p>DOB</p>
                    <input type="date" name="dob" maxlength="2000-07-22" minlength="1994-07-22"  value="2018-09-19" tabindex="7" required="required">
                    
                    <p>Gender</p>
                    <input type="radio" name="gender" value="Male" tabindex="8" checked="checked" required="required">Male 
                    <input type="radio" name="gender" value="Female" tabindex="9" required="required">Female
                    
                    <p>Email</p>
                    <input type="email" name="email" maxlength="25" minlength="6" placeholder="Enter a email address" tabindex="10"required="required">  
                  
                    <p>Street Address</p>
                    <input type="text" name="add" maxlength="50" minlength="3"placeholder="Enter a street address" tabindex="11"required="required">  
             </td>
                
              <td>
                    <p>Phone</p>
                    <input type="number" maxlength="11" minlength="11" name="phone" placeholder="Enter a phone" tabindex="13"required="required">  
                    
                    <p>Batch</p>
                    <select name="batch">
                    <option value="Select Batch">Select Batch</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                </select>
         
                    <p>Department</p>
                            <select name="dept">
                     <option value="Select Department">Select Department</option>
                 <option value="Civil Enginnering">Civil Enginnering</option>    
                 <option value="Computer Enginnering">Computer Enginnering</option>
                 <option value="Civil Enginnering">Civil Enginnering</option>
                 <option value="Software Enginnering">Software Enginnering</option>
                 <option value="Electrical Enginnering">Electrical Enginnering</option>
                 <option value="Telecom Enginnering">Telecom Enginnering</option>
                 <option value="Electonics Enginnering">Electonics Enginnering</option>
                 <option value="Computer Science">Computer Science</option>
                 </select>
                    <p>Rollno</p>
                    <input type="number" maxlength="3" minlength="2" name="rollno" placeholder="Enter a rollno" tabindex="16" required="required" >
                    
                    <br> <br>
                    <input type="submit" value="Save" name="submit"  class="addStdBtn">
         
                    <input  type="reset" value="Reset" name="reset"  class="addStdBtn">
                   
                    
                   
              </td>
                
           
                   
             
            </tr>  
            
        </table>
    
    
</form>
   </div>
 </div>

 <?php
 closeTag();
 ?>