 <div id="banner-area">
	<img src="images/banner/banner1.jpg" alt="" />
	<div class="parallax-overlay"></div>
	<!-- Subpage title start -->
	<div class="banner-title-content">
		<div class="text-center"> 
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="#"><? echo $LANG['home']; ?></a></li>
					<li class="breadcrumb-item text-white" aria-current="page">
						
					<?php echo $LANG['contact'];
					 ?>
					
					</li>
				</ol>
			</nav>
		</div>
	</div><!-- Subpage title end -->
</div><!-- Banner area end -->
<!-- Main container start -->
<section id="main-container">
	<div class="container">
		<!-- Map start here -->
 		<!--/ Map end here -->

		<div class="gap-40"></div>

		<div class="row">
			<div class="col-md-7">      <?php
						if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }
						
						if(empty($statusMsg)){ ?>
        <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
    <?php } ?>
  
    
    <?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit']))
	{
	
	if(md5(strtoupper($_POST["captcha"]))==$_SESSION["captcha_text"])
	{
    // Get the submitted form data
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
	}
		else
		{
		echo '<script>alert("დამცავი კოდი არასწორია");</script>';
} 
    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'cactusjournalism@gmail.com';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
			if(!function_exists("sendEmail"))
				exit("NO - sendEmail");
            // Send email
            if(sendEmail($email, $toEmail, $emailSubject, $htmlContent)){
                $statusMsg = 'თქვენი წერილი წარმატებით გაიგზავნა. გმადლობთ!';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'დაფიქსირდა შეცდომა.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please, fill the fields.';
        $msgClass = 'errordiv';
    }
	echo '<script>alert("'.$statusMsg.'");</script>';
}



?>
				  <form id="contact-form" action="<?HTTP_HOST?>index.php?do=contact" method="post" role="form">
				 
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label><span style="font-size:16px; "><?=$LANG['name']?></span></label>
								<input class="form-control" name="name" id="name" placeholder="" type="text" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label><span style="font-size:16px; "><?=$LANG['email']?></span></pan></label>
								<input class="form-control" name="email" id="email" placeholder="" type="email" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label><span style="font-size:16px; "><?=$LANG['subject']?></span> </label>
								<input class="form-control" name="subject" id="subject" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label><span style="font-size:16px; "> <?=$LANG['message']?> </span></label>
						<textarea class="form-control" name="message" id="message" placeholder="" rows="10" required></textarea>
					</div>
					<div class="text-right"><br>
						 <span style="height:20px; padding-bottom:10px;"> <?=$LANG['captcha']?> </span>
       <img src="<?=HTTP_HOST?>captcha.php"> <input type="text" name="captcha" style="text-transform:uppercase; background-color:#FFDDDE; border:1px solid #ACACAC;"/> <br>


<style>
 .contact 
 {
border:1px solid #767575; 
height:40px; 
width:606px; 
top:20px; 
position:relative; 
border-radius:3px;
}


 .contact:hover
 {
border:1px solid #3ec1d5; 
height:40px; 
width:606px; 
top:20px; 
position:relative; 
border-radius:3px;
}


 
 </style>
						
						<br>
						<button class="btn btn-primary solid blank" type="submit" name="submit"><span style="font-size: 16px;"> <?=$LANG['sendmail']?> </span> </button>
						
						
					</div>
				</form>
			</div>
			<div class="col-md-5">
				<div class="contact-info">
					 <p> </p>
					<br>
 					<p><i class="fa fa-envelope-o info"></i><span style="font-size:16px; "> cactusjournalism@gmail.com </span></p>
					<p><i class="fa fa-globe info"></i> <span style="font-size:16px; "> www.cactus-journalism.ge </span></p>
				</div>
			</div>
		</div>
	</div>
	<!--/ container end -->
</section>
<!--/ Main container end -->

	 