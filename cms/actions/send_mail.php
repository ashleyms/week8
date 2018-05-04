<?php
	//If form isset
	if (isset($_POST["form_submit"])){
		//If Date or Email is left blank - do not send
		if(empty($_POST["nDate"]) || empty($_POST["strEmail"]) ){
			header("location: ../booking.php?error=true");
		}
		else{
			//Send to
	        $to = $_POST["strEmail"];
			//Subject
	        $subject = "Booking Confirmation";
			//Message
	        $message = "
		        <html>
			        <head>
			        	<title>Booking Confirmation</title>
			        </head>
			        <body>
						<img src='http://ashleyspires.ca/yoshi/assets/logo_purple.png' alt='logo' width='200px;'/>
						<h1>Thank you, " . $_POST["strName"] . "!</h1>
				        <p>Your booking on " . $_POST["nDate"] . " at " . $_POST["nTime"] . " has been scheduled. We look forward to seeing you for your " . $_POST["strService"] . " appointment!</p>
						<p>If you need to reschedule or have any questions please call us at: (888).786.5678 </p>
						<p>Regards, <br /> Yoshi Team</p>
					</body>
		        </html>
		        ";

	        // Content-type
	        $headers = "MIME-Version: 1.0" . "\r\n";
	        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			//From
	        $headers .= 'From: <booking@yoshistudio.com>' . "\r\n";
			//Send Mail
			mail($to,$subject,$message,$headers);
			//Return
	        header("location: ../booking_thankyou.php");
		}
    }
	//Error
	else{
		header("location: ../booking.php?error=true");
	}
?>
