<?php
session_start();
    if(!isset($_SESSION['valid'])) {
        ?>
       <h1>please <a href="adminlogin.php">login</a></h1>
       <?php
    die("");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container adminevent mt-5">
    <div class="row justify-content-center">
    <h1>Manage events</h1>
    </div>
    <div class="row offset-4">
        <form action="events.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="eventName" class="col-sm-1-12 col-form-label mr-4">Event Name: </label>
                <div class="col-sm-1-12">
                    <input type="text" class="form-control" name="eventName" id="eventName" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="details" class="col-form-label col-sm-1-12 mr-4">Details</label>
                <div class="col-sm-1-12">
                    <textarea name="details" id="details" rows="10" cols="50" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="eventImage" class="col-sm-1-12 col-form-label mr-4">Event Image:</label>
                <div class="col-sm-1-12">
                <input type="file" name="eventImage" id="eventImage" accept="image/*">
                </div>
            </div>
            
            <div class="offset-sm-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" name="send" class="btn btn-primary">Send</button>
                </div>
            
        </form>
        <div class="row offset-4">
    </div>
</body>
</html>