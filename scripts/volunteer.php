<?php include('header.php');?>
<?php
if(isset($_POST['submit'])){
    require_once 'dbconnect.php';
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $service=$_POST['service'];
    $eventname=$_POST['eventname'];
    $sql="select email from volunteer where email='$email'";
    $check=mysqli_query($conn,$sql);
    if(mysqli_num_rows($check)>0){
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-top:100px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>sorry!</strong>already registered as volunteer
        </div>';
    }
    else{
    $result="insert into volunteer(name,email,mobile,address,service,eventname) values ('$name','$email','$mobile','$address','$service','$eventname')";
    if(mysqli_query($conn,$result)){
        
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-top:100px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Thank you</strong> You are now a volunteer we will contact you whenever we require help from you
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
        '</b></h2><h3>Thankyou for registering as a volunteer</h3>
        <i>we wil notify you whenever we require help from you</i>
    </div>
</div>';
$mail->AltBody = 'message';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<b>Message has been sent</b>';
}
    }
    else{
        echo "error";
    }
}


mysqli_close($conn);
   }
?>


<section class="volunteer volunteer-bg" style="margin-top:100px;">
<div class="container volunteer volunteer-bg">
    <div class="row">
        <h2 class="mt-3 mb-5" ><i>To become a Volunteer, please provide us with few of your basic details</i></h2>
        <div class="col-md-4"><img src="imgs/orplogo.png" alt="logo" width="350px" height="500px"></div>
        <div class="col-md-8">
        
            <form action="volunteer.php" method="POST">
            <div class="form-group ml-4" style="color:#534f4f;font-size:large;">
                    <label for="name">Enter Your Name:</label>
                    <input type="text" name="name" class="form-control col-form-label-lg" id="name" placeholder="Your name here" required/>
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
                    <label for="address">address:</label>
                    <div class="col-sm-1-12">
                    <textarea name="address" id="address" rows="10" cols="50" ></textarea>
                    </div>
                </div>

                <div class="form-group ml-4" style="color:#534f4f;font-size:large;">
                    <label for="service">Please select service you want to volunteer for:</label>
                    <select id="Seva" name="service" class="form-control form-label-lg" required="">
			       <option value="">Choose Service</option>
			    <option value="Educate childern" id="val_sel">Educate childern</option>
			    <option value="caring for the children" id="val_sel">caring for the children</option>
		        <option value="Creating and implementing fun" id="val_sel">helping children develop physical skills.</option>
			    <option value="events" id="val_sel">events</option>
                <option value="others" id="val_sel">others</option>
                </select>
                </div>
                <div class="form-group ml-4" style="color:#534f4f;font-size:large;">
                    <label for="eventname">Event name(if selected service is event):</label>
                    <input type="text" name="eventname" class="form-control col-form-label-lg" id="eventname" placeholder="Mention interested event" />
                </div>
                <div class="form-group ml-4" style="color:#534f4f;font-size:large;">
                    <button type="submit" name="submit" class="btn btn-primary m-2">Submit</button>
                </div>
               
            </form>
        
        </div>
    </div>
</div>
</section>
<?php include('footer.php');?>