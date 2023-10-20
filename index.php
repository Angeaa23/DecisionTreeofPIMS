<?php
include('include/config.php');
$val=mysqli_query($con,"select * from settings where id = 1");
while ($row_val=mysqli_fetch_array($val)) {
	$name = $row_val['HealthCenter'];
	$no = $row_val['ContactNo'];
	$email = $row_val['EmailAdd'];
	$hour = $row_val['OpeningHour'];
	$doctor = $row_val['Doctor'];
	$about = $row_val['About'];
	$map = $row_val['Map'];
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $name;?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="icon" type="image/x-icon" href="images/logo.png">
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<link rel="stylesheet" href="css/tooplate-style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		 <link rel="stylesheet" href="css/font-awesome.min.css">
		 <link rel="stylesheet" href="css/animate.css">
		 <link rel="stylesheet" href="css/owl.carousel.css">
		 <link rel="stylesheet" href="css/owl.theme.default.min.css">
	 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
		  
		  <style>
		  header span i {
			color: #3391E7;
			margin-right: 5px;
		  }
		  
		  .navbar-default .navbar-nav>li>a {
			  padding: 12px;
			  color: #80ffff;
			  text-decoration: none;
			  font-size: 17px;
			}
			
		.section-btn {
			background-color: #3391E7;
			color: #fff;
			padding: 20px;
		}
		
		.btn-default {
			border-color: #3391E7;
		}
		
		.slider .item-first {
			background-image: url(images/slider1.jpg);
		  }

		  .slider .item-second {
			background-image: url(images/slider2.jpg);
		  }

		  .slider .item-third {
			background-image: url(images/slider3.jpg);
		  }
			
		
		h1, h2, h3, h4, h5, h6 {
			font-weight: 600;
			line-height: inherit;
		}

		.navbar {
		  width: 100%;
		  background-color: #555;
		  overflow: auto;
		}

		.navbar a {
		  float: right;
		  padding: 12px;
		  color: white;
		  text-decoration: none;
		  font-size: 17px;
		}

		.navbar a:hover {
		  background-color: #ff00ff;
		}

		@media screen and (max-width: 500px) {
		  .navbar a {
			float: none;
			display: block;
		  }
		}
		  </style>
	
	</head>
	<body>
		<!--start-wrap-->
		
		<!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <a href="index.php" class="navbar-brand" style="padding-left:0px;"><i class="fa fa-h-square" style="color:#3391E7"></i>ealth Center</a>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i>
						 <?php echo $no;?></span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i><?php echo $hour;?></span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="https://<?php echo $email;?>/" target="_blank"><?php echo $email;?></a></span>
                    </div>

               </div>
          </div>
     </header>
	 <!-- end-HEADER -->
	 
		<section class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="header">
					
					<a class="smoothScroll" href="#appointment"><i class="fa fa-fw fa-calendar"></i> Appointment</a>
					<a class="smoothScroll" href="#contact"><i class="fa fa-fw fa-comment"></i> Contact Us</a>
					<a class="smoothScroll" href="#news"><i class="fa fa-fw fa-newspaper-o"></i> News</a>
					<a class="smoothScroll" href="#about"><i class="fa fa-fw fa-question"></i> About Us</a>
					<a class="smoothScroll" href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
				<ul class="navbar-nav">
					<li><a class="smoothScroll" href="index.php"><?php echo $name;?></a></li>
				</ul>	
			<!--end-header-->
			</div>
		</section>
		<!-- HOME -->
			 <section id="home" class="slider" data-stellar-background-ratio="0.5">
				  <div class="container">
					   <div class="row">

								 <div class="owl-carousel owl-theme">
									  <div class="item item-first">
										   <div class="caption">
												<div class="col-md-offset-1 col-md-10">
													 <h3>Let's make your life healthier</h3>
													 <h1>Healthy Living</h1>
													 <a href="#about" class="section-btn btn btn-default smoothScroll">More About Us</a>
												</div>
										   </div>
									  </div>
									
									
									 <div class="item item-third">
										   <div class="caption">
												<div class="col-md-offset-1 col-md-10">
													 <h3>Let's make your life happier</h3>
													 <h1>Your Health Benefits</h1>
													 <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Read Stories</a>
												</div>
										   </div>
									  </div>
									  
									  
									  <div class="item item-second">
										   <div class="caption">
												<div class="col-md-offset-1 col-md-10">
													 <h3>Let's create your way of living</h3>
													 <h1>New Lifestyle</h1>
													 <a href="#contact" class="section-btn btn btn-default btn-gray smoothScroll">Contact Us</a>
												</div>
										   </div>
									  </div>

									 
								 </div>
								 
								 
								 

					   </div>
				  </div>
			 </section>
					
		    <div class="clear"> </div>
		    <div class="content-grids">
		    	<div class="">
		    	<div class="section group" style="padding: 10px;">

				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img2.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Admin</h3>
						
						  <div class="button"><span><a href="admin/login.php">Click Here</a></span></div>
				     </div>
				</div>

				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img1.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Doctors</h3>
						
						  <div class="button"><span><a href="doctor/login.php">Click Here</a></span></div>
					</div>
				</div>
				
				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img3.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Duty Personnels</h3>
						
						  <div class="button"><span><a href="dutypersonnel/login.php">Click Here</a></span></div>
					</div>
				</div>
				
				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img4.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Patients Profile</h3>
						
						  <div class="button"><span><a href="patient-search/index.php">Click Here</a></span></div>
					</div>
				</div>


			</div>
		    </div>
		   </div>
		   
		   
		   <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s" style="font-size:2.5em;">Welcome to <?php echo $name;?></h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p><?php echo $about;?></p>
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="images/doctor-image.png" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3><?php echo $doctor;?></h3>
                                        <p>Facility Head</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>
	 <!-- end-ABOUT -->
	 
	 <!-- NEWS -->
     <section id="news" data-stellar-background-ratio="2.5" style="padding-top:70px;">
          <div class="container" style="padding-right:0px;">
               <div class="row" style="margin-left:0xp;">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Latest Events</h2>
                         </div>
                    </div>
					<?php
						$ret=mysqli_query($con,"select * from tblevents where status=0");
						$num=mysqli_num_rows($ret);
						if($num>0){
						while ($row=mysqli_fetch_array($ret)) {
					?>
					<div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="">
                                   <center><img src="dutypersonnel/file_upload/<?php echo $row['image'];?>" class="img-responsive" alt="" style="height : 400px;"></center>
                              </a>
                              <div class="news-info">
                                   <span><?= isset($row['date_of_event']) && strtotime($row['date_of_event']) > 0 ? date("F d, Y h:i A",strtotime($row['date_of_event'])) : "" ?></span>
                                   <h3><a href="#"><?php echo $row['event_title'];?></a></h3>
                                   <p><?php echo $row['content'];?></p>
                                   <div class="author">
                                        <div class="author-info">
                                             <h5><?php echo $row['author'];?></h5>
                                             <p>Author</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
					<?php }}else{
			echo'
			
			<div class="col-sm-4"></div>
				<div class="col-sm-4" style="background:red; border-radius : 10px;">
					<h1>No Events</h1>
				</div>
			<div class="col-sm-4"></div>
				';
		} ?>

               </div>
          </div>
     </section>
	 
	 
	 <!-- GOOGLE MAP -->
     <section>
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
          <iframe src="<?php echo $map;?>" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>       

	 <style>
	 
		input[type=text], input[type=date], select, textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  resize: vertical;
		}

		label {
		  padding: 12px 12px 12px 0;
		  display: inline-block;
		}

		input[type=submit] {
		  background-color: #04AA6D;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		  float: right;
		}

		input[type=submit]:hover {
		  background-color: #45a049;
		}

	 </style>
     <section id="appointment">
		<div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
			<div class="section-title wow fadeInUp" data-wow-delay="0.1s">
				<center><h2><i class="fa fa-fw fa-calendar"></i> Appointment</h2></center>
			</div>
		</div>
		<div class="container wow fadeInUp" data-wow-delay="0.1s">
		  <form action="action.php" method="POST">
			<div class="row">
			  <div class="col-sm-4">
				<label for="email">Email</label>
			  </div>
			  <div class="col-sm-8">
				<input type="text" name="email" placeholder="Your email.." required>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-4">
				<label for="firstname">First Name</label>
			  </div>
			  <div class="col-sm-8">
				<input type="text" name="firstname" placeholder="Your First Name.." required>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-4">
				<label for="lastname">Last Name</label>
			  </div>
			  <div class="col-sm-8">
				<input type="text" name="lastname" placeholder="Your Last name..">
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-4">
				<label for="concern">Concern</label>
			  </div>
			  <div class="col-sm-8">
				<textarea id="concern" name="concern" placeholder="Write something.." style="height:200px" required></textarea>
			  </div>
			</div>
			<div class="row"></br>
			  <input type="submit" name="Submit" id="Submit" value="Send">
			</div>
		  </form>
		</div>
     </section>           


     <section id="contact">
     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row" style="margin-left:70px;">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i><?php echo $no;?></p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#"><?php echo $email;?></a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="images/author-image.png" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Liver Cancer and Viral</br>Hepatitis</h5></a>
                                        <span>January 4, 2023		</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="images/author-image.png" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>National Deworming Month</h5></a>
                                        <span>January 19, 2023</span>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p><?php echo $hour;?></p>
                                   <p>Saturday <span>Closed</span></p>
                                   <p>Sunday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-4">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2023</p>
                              </div>
                         </div>
						 
						 <div class="text-align-center">
                              <div class="angle-up-btn" style="float:right;"> 
                                  <a href="#home" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div> 
						 
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
                              </div>
                         </div>
                         
                    </div>
                    
               </div>
          </div>
     </footer>
     </section>  
	 
	 
		   <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="#home">Home</a></li>
						<li><a href="#contact">contact</a></li>
					</ul>
		   	</div>
		   
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
		
		<!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
	</body>
</html>