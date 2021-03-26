<?php include('header.php');?>
<?php
if(isset($_POST['submit'])){
    require_once 'dbconnect.php';
    $name=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $sql="select email from member where email='$email'";
    $check=mysqli_query($conn,$sql);
    if(mysqli_num_rows($check)>0){
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-top:100px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>sorry!</strong>email id exists
        </div>';
    }
    else{
    $result="insert into member(name,email,mobile) values ('$name','$email','$mobile')";
    if(mysqli_query($conn,$result)){
        
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-top:100px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Thank you</strong> You are now a member
        </div>';
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

$mail->setFrom('bachuruchitha9@gmail.com', 'Good Shepherd Orphanage');
$mail->addAddress($_POST['email']);     // Add a recipient
              // Name is optional
$mail->addReplyTo('bachuruchitha9@gmail.com', 'Information');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'subject';
$mail->Body    = '<div class="container">
    <div class="row justify-content-center">
    <h2><b>Dear '.$name.
        '</b></h2><h3>Thankyou for registering as a member</h3>
        <i>we wil notify you whenever there are events</i> 
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
    else{
        echo "error";
    }
}


mysqli_close($conn);
   }
?>



    <div class="container rounded shadow" style="background-color:#a7c5eb;margin-top:100px" >
        <div class="row justify-content-center p-4" style="color:black">
            <h1>Member Registration</h1>

        </div>
        <div class="row offset-4">   
            <form action="member.php" method="POST">
            <div class="form-group ml-4" style="color:#534f4f;font-size:large;">
                    <label for="username">Enter Your Name:</label>
                    <input type="text" name="username" class="form-control col-form-label-lg" id="username" placeholder="Your name here" required/>
                </div>
                <div class="form-group ml-4" style="color:#534f4f;font-size:large;">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control col-form-label-lg" id="email" placeholder="Your Email" required />
                </div>
                <div class="form-group ml-4" style="color:#534f4f;font-size:large;">
                    <label for="mobile">Mobile-No:</label>
                    <input type="text" name="mobile" class="form-control col-form-label-lg" id="mobile" pattern="[0-9]{10}"  oninvalid="setCustomValidity('Please enter valid format')" maxlength="10" placeholder="Your Mobile Number" />
                </div>
                <div class="form-group ml-4" style="color:#534f4f;font-size:large;">
                    <button type="submit" name="submit" class="btn btn-primary m-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <br>


<?php include('footer.php');?>