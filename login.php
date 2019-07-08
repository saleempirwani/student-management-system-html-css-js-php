<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db("sms");

if(isset($_POST['submit'])){
    
    $username = $_POST['name'];
    $pwd = $_POST['password'];
    
    $query = 'SELECT * FROM admin WHERE username = "' . $username . '"AND password = "' . $pwd . '"';
    $rec= mysql_query($query);
    
    if($rs = mysql_fetch_assoc($rec)){
        
            if($username == $rs['username'] && $pwd == $rs['password']){
        
        $_SESSION['uid'] = $rs['id'];
        $_SESSION['un'] = $username;
        header('location: dashboard.php');
    }
    
    else {
        
        echo' <script> alert("Username or Password is incorrect");
            window.open("login.php", "_self");
        </script>';
            }
    }
    else {
        
        echo' <script> alert("Username or Password is incorrect");
            window.open("login.php", "_self");
        </script>';
            }
    
}

?>
    
<?php
include('function.php');
mainHeader();
?>
<span class="btnLogin">  <a class="a" href="index.php">Home</a> </span>
<?php echo '</div>';?>
<div class="heading">Admin Login</div>
 
<div style="border: 2px solid">
    <img src="img/img2.png"  width="100%" height="560">
<div class="loginform">
    <h2>Login</h2>
    <form action="login.php" method="post">
    
    <p>Username</p>
    <input type="text" placeholder="Enter your username" name="name" tabindex="1" required="required">    
  
    <p>Password</p>
    <input type="password" placeholder="Enter your password" name="password" tabindex="2" required="required">    
  <br><br>
    <input type="submit" value="Login"  name="submit" tabindex="3">
    
</form>
   </div>
</div>
 <?php
 closeTag();
 ?>