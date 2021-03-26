<?php
session_start();
?>
<?php
if(isset($_POST['submit'])){
    $_SESSION['user']=$_POST['user'];
    $_SESSION['pass']=$_POST['pass'];
    	
			if(($_SESSION['user'] =='admin')&&($_SESSION['pass']=='admin')){
                echo 'success';
                $_SESSION['valid'] = true;
                header('location:adminevent.php');
            }
		else{
			echo "<h1>login failed</h1>";
			header('location:adminlogin.php');
		}
    }

?>