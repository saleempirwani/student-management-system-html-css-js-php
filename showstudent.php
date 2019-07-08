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
 
?>


<?php
if (isset($_GET['id'])){
	
	//echo $_GET['id'];
	$id = $_GET['id'];
	
        $q = "delete from record where id  = " .$id;
	
	if (!mysql_query($q))
		echo mysql_error();
        else{
             echo '
     <script> alert("Congrats! Student info deleted........")
     window.open("showstudent.php", "_self");</script>
     ';
        }
}

?>
<?php
include('function.php');
mainHeader();
?>
<span class="btnLogin">  <a class="a" href="logout.php">Logout</a> </span>
  <?php echo "</div>"; ?>
 
 <div class="heading">Student Information<label>User : <?php echo ucfirst($_SESSION['un']);?></label>

     <form action="dashboard.php">   
 <input  type="submit" value="←" name="back" class="btnback">
  </form>               
 </div>

 <div class="showStdBtn">
     <br>
     <form  action="showstudent.php" method="post">
         
         <input type="number" maxlength="3" minlength="2" placeholder="Rollno" name="r"> 
         
         <select name="d">
             <option value="Select Department">Select Department</option>
         <option value="Civil Enginnering">Civil Enginnering</option>    
         <option value="Computer ">Computer Enginnering</option>
         <option value="Software Enginnering">Software Enginnering</option>
         <option value="Electrical Enginnering">Electrical Enginnering</option>
         <option value="Telecom Enginnering">Telecom Enginnering</option>
         <option value="Electonics Enginnering">Electronics Enginnering</option>
         <option value="Computer Science">Computer Science</option>
         </select>
         
         <select name="b">
             <option value="Select Batch">Select Batch</option>
             <option value="2018">2018</option>
             <option value="2017">2017</option>
             <option value="2016">2016</option>
             <option value="2015">2015</option>
             <option value="2014">2014</option>
         </select>
         <input type="submit" value="Search" name="submit"  >
         <input type="submit" value="Search All" name="submit"  >
    
     </form>
     
     <br>
 </div>
 <div >
     <img src="img/img2.png" width="100%" height="auto">         
<?php 
$result = false;
$table = '
<div class="showStdTable">
    
     <table width="100%"  cellpadding="2px" border = "0">
      <tr>
                    
                    <th>S.no</th>
                    <th>Rollno</th>
                    <th>Batch</th>
                    <th>Department</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Sur Name</th>
                    <th>Nationality</th>
                    <th>City</th>
                    <th>State</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Street Address</th>
                    <th>Phone</th>
                    <th></th>
                    <th></th>
              </tr>
              
 ';
if(isset($_POST['submit'])){
    
    if($_POST['submit'] == "Search All"){
     
$readQuery = "select * from record ORDER BY id desc;";

if(! $result = mysql_query($readQuery)){
    echo mysql_error();
    exit();
}}


if($_POST['submit'] == "Search"){
    
    $r =  $_POST['r'];
    $d =  $_POST['d'];
    $b =  $_POST['b'];
    
    if($r == ""){
        echo '
     <script> alert("Please enter rollno");
     window.open("showstudent.php", "_self");</script>
     ';
 }
    
    else if($d == "Select Department"){
        echo '
     <script> alert("Please select department");
     window.open("showstudent.php", "_self");</script>
     ';
 }
    else if($b == "Select Batch"){
        echo '
     <script> alert("Please select batch")
     window.open("showstudent.php", "_self");</script>
     ';
    }
    else{
        $r = (int) $r;
        $b = (int) $b;
        
        //echo gettype($r)."".gettype($b)."".gettype($d); 
        echo $readQuery = "select * from record where rollno = " .$r. " AND batch = " .$b. " AND dept = '" .$d. "'";  

if(! $result = mysql_query($readQuery)){
    echo mysql_error();
    exit();
}}

    } 
$count = mysql_num_rows($result);
if($count >0){
    $i = 1;
    echo $table; 

 while($data = mysql_fetch_assoc($result)){ 
     echo '        <tr>
                   <td>'.$i.'</td>
                   <td>'.$data["rollno"].'</td>
                   <td>'.$data["batch"].'</td>
                   <td>'.$data["dept"].'</td> 
                   <td>'.$data["name"].'</td>
                   <td>'.$data["fname"].'</td>
                   <td>'.$data["sname"].'</td>
                   <td>'.$data["nation"].'</td>
                   <td>'.$data["city"].'</td>
                   <td>'.$data["state"].'</td>
                   <td>'.$data["dob"].'</td>
                   <td>'.$data["gender"].'</td>
                   <td>'.$data["email"].'</td>
                   <td>'.$data["add"].'</td>
                   <td>'.$data["phone"].'</td>
                 <form > 
              <td><a href="showstudent.php?id='. $data['id'] .'"> Delete </a></td>
            <td> <a href="updatestudent.php?id='. $data['id'] .'"> Update </a></td>
              </form> 
           </tr>  
';
    $i++;
}
echo ' </table></div>';
}
else{
             echo '
     <script> alert("Sorry! No result found.........")
     window.open("showstudent.php", "_self");</script>
     ';
        }
//echo $count;
}

 ?>
<?php
 closeTag();
 ?>