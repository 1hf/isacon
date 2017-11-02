<?php
include('js/class.phpmailer.php');
include('js/class.smtp.php');

if(isset($_POST["fName"]))
{
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$mobile = $_POST["mobile"];
$stdCode = $_POST["stdCode"];
$phoneNumber = $_POST["phoneNumber"];
$hospitalName = $_POST["hospitalName"];
if($stdCode!='' && $phoneNumber==''){
?>
<script>alert('Please enter the phone number.');</script>
<?php
return false;
}
else if($stdCode=='' && $phoneNumber!=''){
?>
<script>alert('Please enter the STD code.');</script>
<?php
return false;
}
else if($mobile=='' && $stdCode=='' && $phoneNumber==''){
?>
<script>alert('Please enter the mobile number or the landline number with STD code.');</script>
<?php
return false;
}else{
    //PHPMailer Object
	$mail = new PHPMailer;
	//From email address and name
	$mail->From = "from@masimo.com";
	$mail->FromName = $_POST["fName"];

	//To address and name
	$mail->addAddress("kchandran@masimo.com", "Krishna Chandran");
	//$mail->addAddress("recepient1@example.com"); //Recipient name is optional

	//Address to which recipient will reply
	//$mail->addReplyTo("prabagar.mk@gmail.com", "Reply");

	//CC and BCC
	$mail->addCC("arun.zechariah@onehealth.solutions");
	$mail->addBCC("sanjay.mathias@onehealth.solutions");

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = "isacon2017 - New customer Registration";
	$mail->Body = "<table>
	<tr><td>You have a new customer registered through the website.<br /><u>Customer Registration Details</u></td></tr>
	<tr><td>Name: ".$fName." ".$lName."<td></tr>
	<tr><td>Phone: ".$mobile."</br>".$stdCode."-".$phoneNumber."<td></tr>
	<tr><td>Hospital: ".$hospitalName."<td></tr>
	<tr><td>&nbsp;<td></tr>
	<tr><td>Thank You!<td></tr>
	<tr><td>Admin<td></tr>
	</table>";
	$mail->AltBody = "First Name: ".$fName." Last Name: ".$lName."<br />Phone Number: ".$mobile.' / '.$stdCode.'-'.$phoneNumber."<br />Hospital: ".$hospitalName;

	if(!$mail->send()) 
	{
	?>
	<script>alert('Error sending details');</script>
	<?php
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
$fName = "";
$lName = "";
$mobile = "";
$stdCode = "";
$phoneNumber = "";
$hospitalName = "";
	?>
	<script>alert('Registration details sent successfully....');</script>
	<?php
	    echo "Message has been sent successfully";

	}
}

}

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Masimo at ISACON</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/full-slider.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/view.css" media="all">

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/view.js"></script>
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a style="cursor:pointer">
                    <img id="logoimg" src="img/Masimo_logo_black_flat_no_mark.png" width="100%" style="padding: 10px 0 20px 20px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive" style="margin-left: 10px;">
                    <ul class="navbar-nav ml-auto" style="background: black;
                        opacity: 1;
                        border-radius: 12px;">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactForm">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="head">

            <div class="row">
                <div class="col-md-12"><div class="col-md-10  text-center top-banner">
                        <h3>Visit us @ Booth #124 to learn more about how #Masimo is changing the future of Healthcare!
                            #masimoinnovates</h3>	
                    </div>

                </div>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active">
                        <img src="img/emma.jpg" alt="EMMA" class="carousel-img">
                        <div class="carousel-caption d-none d-md-block">
                            <!--<h3 style="color:red;">EMMA</h3>
                            <p>Portable Real-time Capnography</p>-->
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item">
                        <img src="img/ROOTSpHbMonitor.jpg" alt="ROOTSpHbMonitor" class="carousel-img">
                        <div class="carousel-caption d-none d-md-block">
                            <!--<h3 style="color:red;">Track Hemoglobin Changes in Real Time</h3>
                            <p>with Noninvasive and Continuous Hemoglobin (SpHb) Monitoring</p>-->
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item">
                        <img src="img/RootSedlineBrainO3.jpg" alt="RootSedlineBrain" class="carousel-img">
                        <div class="carousel-caption d-none d-md-block">
                            <!--<h3 style="color:red;">Root with SedLine Brain Function Monitoring and O3 Regional Oximetry</h3>
                            <p>A More Complete Picture Starts With More Complete Data</p>-->
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <div class="row"  id="contactForm" style="padding-top:30px;">&nbsp;</div>
            <section class="py-5">
                <div class="container">

                    <div id="form_container">

                        <h2 class="h2">Register for a personalized demo and win Miller’s Anesthesia Book</h2>	


                    </div>


                </div>


                <div class="row">
                    <div class="col-md-6" id="form_container">
                        <form id="form_56534" class="appnitro"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                            <ul >

                                <li id="li_1" >
                                    <label class="description" for="element_1">Name </label>
                                    <span>
                                        <input id="fName" name= "fName" class="element text" maxlength="255" size="8" value="" required/>
                                        <label>First</label>
                                    </span>
                                    <span>
                                        <input id="element_1_2" name= "lName" class="element text" maxlength="255" size="14" value=""/>
                                        <label>Last</label>
                                    </span> 
                                </li>		<li id="li_2" >
                                    <label class="description" for="element_2">Mobile Number </label>
                                    <div>
                                        <input id="element_2" name="mobile" class="element text medium" type="number" maxlength="255" value=""/> 
                                    </div> 
                                </li>	<li id="li_3" >
                                    <label class="description" for="element_3">Landline Number </label>
                                    <!--<div>
                                        <input id="element_3" name="phoneNumber" class="element text medium" type="number" maxlength="255" value=""/> 
                                    </div> -->
				  <span>
					<label style="padding-bottom:3px;">STD Code</label>
                                        <input style="width: 75px;" id="stdCode" name= "stdCode" class="element text" maxlength="6" size="6" value=""/>
                                        
                                    </span>
                                    <span>
					<label style="padding-bottom:3px;">Phone Number</label>
                                        <input id="phoneNumber" name= "phoneNumber" class="element text" type="number" maxlength="255" size="14" value=""/>
                                        
                                    </span>
                                </li>		<li id="li_4" >
                                    <label class="description" for="element_3">Hospital </label>
                                    <div>
                                        <input id="element_3" name="hospitalName" class="element text" type="text" maxlength="255" size="14" value=""/> 
                                    </div> 
                                </li>

                                <li class="buttons">
                                    <input type="hidden" name="form_id" value="56534" />

                                    <input class="button" id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
                                    <!--<input class="button" type="sumbit" value="submit">-->
                                </li>
                            </ul>
                        </form>

                    </div>
                    <div class="col-md-6">
                        <img src="img/millers-anesthesia.png" alt="" />
                    </div>
                    <img id="bottom" src="img/bottom.png" alt="">
                </div>
            </section>
        

        <!-- Footer -->
        <footer class="py-5 bg-dark" style="background: black;">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Masimo 2017</p>
            </div>
            <!-- /.container -->
        </footer>


        <style>
            body{font-family: Helvetica Neue,Helvetica,Arial,sans-serif;width: 90%;margin: 0px auto;background: #FFF;}
            .bg-dark {
                background: linear-gradient(to right,rgba(210,210,210,1) 0%,rgba(219,219,219,1) 15%,rgb(224, 219, 219) 58%,rgba(240,240,240,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#d2d2d2',endColorstr='#f0f0f0',GradientType=1);

            }
            .head{margin-top:105px;}
            .navbar{margin-bottom:0px;}
            .carousel-indicators li {background-color:red !important;}
            .carousel-indicators .active {
                background-color: blue !important;
            }
            .carousel-item{height:440px;text-align:center;}
            .carousel-img{width:90%; height:440px;}
            .top-banner{height: auto;
                        margin: 0 auto;
                        padding: 10px;
                        position: relative;background-color:red;color:white;}
            .button {
                background-color: red;
                border: none;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 10px;
            }
            .h2{text-align:center;background-color:#fff;text-indent: 0px;}
        </style>
    </body>

</html>
