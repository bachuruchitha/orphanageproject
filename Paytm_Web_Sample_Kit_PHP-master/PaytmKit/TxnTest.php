
<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<link href="../../scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../scripts/style.css" rel="stylesheet"/>
</head>
<body>
<div class="container rounded donation" style="margin-top:100px" >
        <div class="row ml-4 mb-3" style="color:black">
            <h1>Please fill your details below</h1>
        </div>
		<div class="row">
		<div class="col-6">
		
	<form method="post" action="pgRedirect.php">
	<div class="form-group ml-4" style="color:#534f4f;font-size:large;">
	<label for="uname">Enter Your Name:</label>
	<input type="text" name="uname" class="form-control col-form-label-lg" id="uname" placeholder="Your name here" required/>
				</div>
				<div class="form-group ml-4" style="color:#534f4f;font-size:large;">
	<label for="email">Enter Your Email:</label>
	<input type="email" name="email" class="form-control col-form-label-lg" id="email" placeholder="Your mailId" />
				</div>
				<div class="form-group ml-4" style="color:#534f4f;font-size:large;">
	<label for="mobile">Enter Your Mobile no.:</label>
	<input type="text" name="mobile" class="form-control col-form-label-lg" id="mobile" pattern="[0-9]{10}"  oninvalid="setCustomValidity('Please enter valid format')" maxlength="10" placeholder="Your mobile number" required/>
				</div>
				<div class="form-group ml-4" style="color:#534f4f;font-size:large;">
	<label for="TXN_AMOUNT">Amount in INR:</label>
	<input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="100" class="pt-3 form-control pb-3 donateamt"  required>
				</div>
				<input id="ORDER_ID" type="hidden" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off" class=""
						value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly="readonly">
					
				<input id="CUST_ID" type="hidden" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001" readonly="readonly">
				
				
					<input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Trust" readonly="readonly">
				
					<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly="readonly">
				<div class="form-group ml-4">
					
					<input value="DONATE" type="submit"	onclick="" class="btn btn-success donatesubmit">
</div>
			
	</form>
	</div>
	<div class="col-6">
	</div>
</body>
</html>