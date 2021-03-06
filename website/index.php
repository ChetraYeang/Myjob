<?php
date_default_timezone_set('Asia/Bangkok');
include_once '/admin/dbconfig.php';
include "/admin/resize-class.php";

$stmt_s = $DB_con->prepare("SELECT a.id,a.prices, a.tran_time, a.tran_company,a.tran_enable,b.c_main_id,a.vichicle_type, b.c_title, (SELECT s.c_title FROM menu as s
          WHERE s.c_id=a.destinations) as destinations FROM transportation as a LEFT JOIN menu as b ON b.c_id=a.tran_company ORDER BY b.c_title");
$stmt_s->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Easy Travel - SHV</title>
<!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="css/flexslider.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="tm-gray-bg">
  	<!-- Header -->
  	<div class="tm-header">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-3 col-md-4 col-sm-3 tm-site-name-container">
  					<img src="img/logo-easy-travel-shv.png" alt="logo">
  				</div>
	  			<div class="col-lg-9 col-md-8 col-sm-9">
	  				<div class="mobile-menu-icon">
		              <i class="fa fa-bars"></i>
		            </div>
	  				<nav class="tm-nav">
						<ul><?php
$stmt_menu = $DB_con->prepare("SELECT c_id, c_title, c_is_show, c_headline, c_main_id FROM menu  WHERE c_main_id=0 AND c_is_show=1");
$stmt_menu->execute();
while ($result_menu = $stmt_menu->fetch(PDO::FETCH_ASSOC)) {
	?>
							<li><a href="#"> <?php echo $result_menu['c_title']; ?></a> </li>
								<?php
}?>
						</ul>
					</nav>
	  			</div>
  			</div>
  		</div>
  	</div>

	<!-- Banner -->
	<section class="tm-banner">
		<!-- Flexslider -->
		<div class="flexslider flexslider-banner">
		  <ul class="slides">
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title"> All    <span class="tm-yellow-text">bus and boat</span> </h1>
					<p class="tm-banner-subtitle">tickets are available here.</p>
					<!--<a href="#more" class="tm-banner-link">Learn More</a>-->
				</div>
				<img src="img/banner-1.jpg" alt="Image" />
		    </li>
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title">Find your  <span class="tm-yellow-text">transportation</span></h1>
					<p class="tm-banner-subtitle">for your vacation at SHV.</p>
					<!--<a href="#more" class="tm-banner-link">Learn More</a>	-->
				</div>
		      <img src="img/banner-2.jpg" alt="Image" />
		    </li>
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title">   <span class="tm-yellow-text">Saving and experience</span></h1>
					<p class="tm-banner-subtitle">the safe traveling with us</p>
					<!--<a href="#more" class="tm-banner-link">Learn More</a>-->
				</div>
		      <img src="img/banner-3.jpg" alt="Image" />
		    </li>
		  </ul>
		</div>
	</section>

	<!-- gray bg -->
	<section class="container tm-home-section-1" id="more">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6">
				<!-- Nav tabs -->
				<div class="tm-home-box-1">
					<ul class="nav nav-tabs tm-white-bg" role="tablist" id="hotelCarTabs">
					    <li role="presentation" class="active">
					    	<a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">BUS</a>
					    </li>
					    <li role="presentation">
					    	<a href="#car" aria-controls="car" role="tab" data-toggle="tab">BOAT</a>
					    </li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
					    <div role="tabpanel" class="tab-pane fade in active tm-white-bg" id="hotel">
					    	<div class="tm-search-box effect2">
								<form action="#" method="post" class="hotel-search-form">
									<div class="tm-form-inner">
										<div class="form-group">
							            	 <select class="form-control">
							            	 	<option value="">-- Origin -- </option>
							            	 	<option value="shangrila">Phnom Penh</option>
												<option value="chatrium">Shihanuk Ville</option>
												<option value="fourseasons">Siem Reap</option>
												<option value="hilton">Koh Kong</option>
											</select>
							          	</div>
							          	<div class="form-group margin-bottom-0">
							                <select class="form-control">
							            	 	<option value="">-- Destination -- </option>
							            	 	<option value="shangrila">Phnom Penh</option>
												<option value="chatrium">Shihanuk Ville</option>
												<option value="fourseasons">Siem Reap</option>
												<option value="hilton">Koh Kong</option>
											</select>
							            </div>
							            <div class="form-group margin-bottom-0">
							                <select class="form-control">
							            	 	<option value="">-- Numer of Pax -- </option>
							            	 	<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5p">5+</option>
											</select>
							            </div>
							          	<div class="form-group">
							                <div class='input-group date' id='datetimepicker1'>
							                    <input type='text' class="form-control" placeholder="Date" />
							                    <span class="input-group-addon">
							                        <span class="fa fa-calendar"></span>
							                    </span>
							                </div>
							            </div>
							        <!--  	<div class="form-group">
							                <div class='input-group date' id='datetimepicker2'>
							                    <input type='text' class="form-control" placeholder="Check-out Date" />
							                    <span class="input-group-addon">
							                        <span class="fa fa-calendar"></span>
							                    </span>
							                </div>
							            </div>
							          -->
									</div>
						            <div class="form-group tm-yellow-gradient-bg text-center">
						            	<button type="submit" name="submit" class="tm-yellow-btn">Check Now</button>
						            </div>
								</form>
							</div>
					    </div>
					    <div role="tabpanel" class="tab-pane fade tm-white-bg" id="car">
							<div class="tm-search-box effect2">
								<form action="#" method="post" class="hotel-search-form">
									<div class="tm-form-inner">
										<div class="form-group">
							            	 <select class="form-control">
							            	 	<option value="">-- Origin -- </option>
							            	 	<option value="shangrila">Shangri-La</option>
												<option value="chatrium">Chatrium</option>
												<option value="fourseasons">Four Seasons</option>
												<option value="hilton">Hilton</option>
											</select>
							          	</div>
							          	<div class="form-group margin-bottom-0">
							                <select class="form-control">
							            	 	<option value="">-- Destination -- </option>
							            	 	<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5p">5+</option>
											</select>
							            </div>
							            <div class="form-group margin-bottom-0">
							                <select class="form-control">
							            	 	<option value="">-- Numer of Pax -- </option>
							            	 	<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5p">5+</option>
											</select>
							            </div>
							          	<div class="form-group">
							                <div class='input-group date' id='datetimepicker1'>
							                    <input type='text' class="form-control" placeholder="Date" />
							                    <span class="input-group-addon">
							                        <span class="fa fa-calendar"></span>
							                    </span>
							                </div>
							            </div>
							        <!--  	<div class="form-group">
							                <div class='input-group date' id='datetimepicker2'>
							                    <input type='text' class="form-control" placeholder="Check-out Date" />
							                    <span class="input-group-addon">
							                        <span class="fa fa-calendar"></span>
							                    </span>
							                </div>
							            </div>
							          -->
									</div>
						            <div class="form-group tm-yellow-gradient-bg text-center">
						            	<button type="submit" name="submit" class="tm-yellow-btn">Check Now</button>
						            </div>
								</form>
							</div>
					    </div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-center">
					<img src="img/index-01.jpg" alt="image" class="img-responsive">
					<a href="#">
						<div class="tm-green-gradient-bg tm-city-price-container">
							<span>Shihanuk Ville - Koh Rong</span>
							<span>$20</span>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-right">
					<img src="img/index-02.jpg" alt="image" class="img-responsive">
					<a href="#">
						<div class="tm-red-gradient-bg tm-city-price-container">
							<span>Phnom Penh - Shihanuk Ville</span>
							<span>$5</span>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="section-margin-top">
			<div class="row">
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-6 col-md-6 col-sm-6"><h2 class="tm-section-title">Departure Schedule</h2></div>
					<div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4>BUS DEPARTURE SCHEDULE</h4>
  					<p>ALL BUS TICKETS ARE AVAILABLE HERE</p>
					  <table class="table table-condensed">
					    <thead>
					      <tr>
					        <th>Destination</th>
					        <th>Departure Time</th>
					        <th>Price</th>
					        <th>Company</th>
					        <th>Vichicle Type</th>
					        <th>Booking</th>
					      </tr>
					    </thead>
					    <tbody>
					    <?php
while ($result_s = $stmt_s->fetch(PDO::FETCH_ASSOC)) {
	?>
						      <tr>
						        <td> <?php echo $result_s['destinations'] . '- Shihanuk'; ?> </td>
						        <td> <?php echo $result_s['tran_time']; ?> </td>
						        <td> <?php echo '$ ' . $result_s['prices'] . '.00'; ?> </td>
						        <td> <?php echo $result_s['c_title']; ?> </td>
						        <td> <?php echo 'BUS | ' . $result_s['vichicle_type'] . ' Seat'; ?></td>
						        <td> <?php echo ($result_s['tran_enable'] == 1) ? 'Booking Now' : 'Full Seat'; ?></td>
						      </tr>
						      <?php
}
?>
					    </tbody>
					  </table>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<h4>BOAT DEPARTURE SCHEDULE</h4>
  					<p>ALL BOAT TICKETS ARE AVAILABLE HERE</p>
					  <table class="table table-condensed">
					    <thead>
					      <tr>
					        <th>Destination</th>
					        <th>Departure Time</th>
					        <th>Price</th>
					        <th>Company</th>
					        <th>Vichicle Type</th>
					        <th>Booking</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>Phnom Penh - Shihanuk</td>
					        <td>9:00 AM</td>
					        <td> $5.00</td>
					        <td> GiantBis</td>
					        <td> BUS | 45 Seat</td>
					        <td> Booking Now. </td>
					      </tr>

					     	 <tr>
					        <td>Phnom Penh - Shihanuk</td>
					        <td>9:00 AM</td>
					        <td> $5.00</td>
					        <td> GiantBis</td>
					        <td> BUS | 45 Seat</td>
					        <td> Booking Now. </td>
					      </tr>

					       <tr>
					        <td>Phnom Penh - Shihanuk</td>
					        <td>9:00 AM</td>
					        <td> $5.00</td>
					        <td> GiantBis</td>
					        <td> BUS | 45 Seat</td>
					        <td> Booking Now. </td>
					      </tr>
					    </tbody>
					  </table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">

					<p class="home-description">
<button type="button" class="btn btn-primary">Inquiries</button><br><br>
					Please feel free to send us your inquiries or ideas about anything you would love: destinations, time of traveling, we will get back to you with details & best offers a reasonable price!</p>
				</div>
			</div>
		</div>
	</section>

	<!-- white bg -->
	<section class="tm-white-bg section-padding-bottom">
		<div class="container">
			<div class="row">
				<div class="tm-section-header section-margin-top">
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">Popular Packages</h2></div>
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
				</div>
				<div class="col-lg-6">
					<div class="tm-home-box-3">
						<div class="tm-home-box-3-img-container">
							<img src="img/index-07.jpg" alt="image" class="img-responsive">
						</div>
						<div class="tm-home-box-3-info">
							<p class="tm-home-box-3-description">Proin gravida nibhvell velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum</p>
					        <div class="tm-home-box-2-container">
							<a href="#" class="tm-home-box-2-link"><i class="fa fa-heart tm-home-box-2-icon border-right"></i></a>
							<a href="#" class="tm-home-box-2-link"><span class="tm-home-box-2-description box-3">Travel</span></a>
							<a href="#" class="tm-home-box-2-link"><i class="fa fa-edit tm-home-box-2-icon border-left"></i></a>
						</div>
						</div>
					</div>
			     </div>
			     <div class="col-lg-6">
			        <div class="tm-home-box-3">
						<div class="tm-home-box-3-img-container">
							<img src="img/index-08.jpg" alt="image" class="img-responsive">
						</div>
						<div class="tm-home-box-3-info">
							<p class="tm-home-box-3-description">Proin gravida nibhvell velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum</p>
					        <div class="tm-home-box-2-container">
							<a href="#" class="tm-home-box-2-link"><i class="fa fa-heart tm-home-box-2-icon border-right"></i></a>
							<a href="#" class="tm-home-box-2-link"><span class="tm-home-box-2-description box-3">Travel</span></a>
							<a href="#" class="tm-home-box-2-link"><i class="fa fa-edit tm-home-box-2-icon border-left"></i></a>
						</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
				    <div class="tm-home-box-3">
						<div class="tm-home-box-3-img-container">
							<img src="img/index-09.jpg" alt="image" class="img-responsive">
						</div>
						<div class="tm-home-box-3-info">
							<p class="tm-home-box-3-description">Proin gravida nibhvell velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum</p>
					        <div class="tm-home-box-2-container">
							<a href="#" class="tm-home-box-2-link"><i class="fa fa-heart tm-home-box-2-icon border-right"></i></a>
							<a href="#" class="tm-home-box-2-link"><span class="tm-home-box-2-description box-3">Travel</span></a>
							<a href="#" class="tm-home-box-2-link"><i class="fa fa-edit tm-home-box-2-icon border-left"></i></a>
						</div>
						</div>
					</div>
			    </div>
			    <div class="col-lg-6">
			        <div class="tm-home-box-3">
						<div class="tm-home-box-3-img-container">
							<img src="img/index-10.jpg" alt="image" class="img-responsive">
						</div>
						<div class="tm-home-box-3-info">
							<p class="tm-home-box-3-description">Proin gravida nibhvell velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum</p>
					        <div class="tm-home-box-2-container">
							<a href="#" class="tm-home-box-2-link"><i class="fa fa-heart tm-home-box-2-icon border-right"></i></a>
							<a href="#" class="tm-home-box-2-link"><span class="tm-home-box-2-description box-3">Travel</span></a>
							<a href="#" class="tm-home-box-2-link"><i class="fa fa-edit tm-home-box-2-icon border-left"></i></a>
						</div>
						</div>
					</div>
			   	</div>
			</div>
		</div>
	</section>
	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2016 Easy Travel Shihanuk Ville</p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  	<script type="text/javascript" src="js/moment.js"></script>							<!-- moment.js -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<!--
	<script src="js/froogaloop.js"></script>
	<script src="js/jquery.fitvid.js"></script>
-->
   	<script type="text/javascript" src="js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
		// HTML document is loaded. DOM is ready.
		$(function() {

			$('#hotelCarTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})

        	$('.date').datetimepicker({
            	format: 'MM/DD/YYYY'
            });
            $('.date-time').datetimepicker();

			// https://css-tricks.com/snippets/jquery/smooth-scrolling/
		  	$('a[href*=#]:not([href=#])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html,body').animate({
			          scrollTop: target.offset().top
			        }, 1000);
			        return false;
			      }
			    }
		  	});
		});

		// Load Flexslider when everything is loaded.
		$(window).load(function() {
			// Vimeo API nonsense

/*
			  var player = document.getElementById('player_1');
			  $f(player).addEvent('ready', ready);

			  function addEvent(element, eventName, callback) {
			    if (element.addEventListener) {
			      element.addEventListener(eventName, callback, false)
			    } else {
			      element.attachEvent(eventName, callback, false);
			    }
			  }

			  function ready(player_id) {
			    var froogaloop = $f(player_id);
			    froogaloop.addEvent('play', function(data) {
			      $('.flexslider').flexslider("pause");
			    });
			    froogaloop.addEvent('pause', function(data) {
			      $('.flexslider').flexslider("play");
			    });
			  }
*/



			  // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
/*

			  $(".flexslider")
			    .fitVids()
			    .flexslider({
			      animation: "slide",
			      useCSS: false,
			      animationLoop: false,
			      smoothHeight: true,
			      controlNav: false,
			      before: function(slider){
			        $f(player).api('pause');
			      }
			  });
*/




//	For images only
		    $('.flexslider').flexslider({
			    controlNav: false
		    });


	  	});
	</script>
 </body>
 </html>