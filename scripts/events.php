<?php include('header.php');?>
<?php
if(isset($_POST['submit'])){
    require_once 'dbconnect.php';
    $eventName=$_POST['eventName'];
    $details=$_POST['details'];
    $files=$_FILES['eventImage'];
    $filename=$files['name'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg');
    if(in_array($filecheck,$fileextstored)){
        $destination='eventimgs/'.$filename;
        move_uploaded_file($filetmp,$destination);
        $result="insert into event(eventName,image,details) values ('$eventName','$destination','$details')";
    } 
    mysqli_query($conn,$result); 
    
}
?>
<?php
if(isset($_POST['send'])){
    require_once 'dbconnect.php';
    $eventName=$_POST['eventName'];
    $details=$_POST['details'];
    $emaillist=mysqli_query($conn,"select email from member");
    
require '../PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bachuruchitha9@gmail.com';                 // SMTP username
$mail->Password = 'Ruchitha@#4758';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
if(mysqli_num_rows($emaillist)>0){    
$mail->setFrom('bachuruchitha9@gmail.com', 'Good Shepherd Orphanage');
foreach($emaillist as $row){
$mail->addAddress($row['email']);     // Add a recipient
}
$mail->addReplyTo('bachuruchitha9@gmail.com', 'Information');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'subject';
$mail->Body    = '<div class="container">
<div class="row justify-content-center">
<h2><b>Details: '.$details.
    '</b></h2><h3>Looking forward for your presence</h3>
</div>
</div>';
$mail->AltBody = 'message';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
    }
}
?>


<div class="container eventspage" style="margin-top:100px;">
<div class="row justify-content-center">
              <h1 class="text-center mt-3"><b><i>UPCOMING EVENTS</i></b></h1>
              </div>
           <?php
           require_once 'dbconnect.php';
           $display=mysqli_query($conn,"select * from event");
                 while($res=mysqli_fetch_array($display)){
           ?>          
                    <div class="row justify-content-center mt-4 mb-3"><?php echo "<h2>".$res['eventName']."</h2>";?></div>
                    <div class="row justify-content-center">
                    <div class="col-6 shadow-box">
                    <img src="<?php echo $res['image'];?>" height="auto" width="100%" class="img-fluid">
                    </div>
                    <div class="col-6 mt-5"><?php echo $res['details'];?><br><br>
                    <a href="volunteer.php " target="_blank" class="btn btn-primary">Volunteer<i class="ti-angle-right ml-3"></i></a>
                    </div>
            
                </div>
                <br>
                <?php  
                } 
           ?>

</div>
</body>
<?php include 'footer.php'?>