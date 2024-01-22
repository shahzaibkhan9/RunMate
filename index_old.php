<?php
include_once('xloop/stepin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>RunMate</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, viewport-fit=cover">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<meta charset utf="8">
	<!--font-awesome-css-->

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!--bootstrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--custom css-->
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<!--component-css-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<style>
		.container {
			display: flex;
			width: 90%;
			align-items: center;
		}

		.mp-description {
			width: 80px;
			margin-right: 20px;
		}
	</style>


</head>

<body>
	<div class="fit_main">
		<div class="main_frame">
			<div class="frame-border">

				<!--single page html-->
				<div class="mp-image">
					<div class="body-back">

						
						<img id="myImage" src="images/popup.png" class="img2">

						<div id="myModal" class="mymodal">

							<div class="modal-content container">
								<div class="mp-description">
									<span class="mp-week">Week <?php echo str_pad($obj->getFirstScreenData('bweek'), 2, '0', STR_PAD_LEFT); ?></span>
									<img src="images/description-img.png">

								</div>
								<p class="mp-paragraph">
									<span class="close">&times;</span>
									<span class="mp-time">Duration: 30 MINUTES</span></br>
									Brisk five-minute warmup walk. Then alternate 60 seconds of jogging and 90 seconds of
									walking for a total of 20 minutes.
								</p>
							</div>
						</div>
						<div class="section1">
							<div class="welcome_div">
								<h1>R<span>UN</span>M<span>ATE</span></h1>
								<h5>The ultimate running app from Fitlynk!</h5>
								<p>Run towards a healthier, happier you with our intuitive and user-friendly app. Get in the zone and dominate your run with our app - the ultimate running tool.
									</p>
							</div>
							<form action="warmup.php" method="get">
								<input type="hidden" id="setweek" value="0" /> <!--name="week"-->
								<input type="hidden" id="setday" value="0" /> <!--name="day"-->
								<input type="hidden" id="setactivity" value="<?php echo $obj->getFirstScreenData('bactivityid'); ?>" /> <!--name="setactivity"-->
								<input type="hidden" id="bid" value="<?php echo $obj->getFirstScreenData('bid'); ?>" name="bid" />
								<button class="button">START</button>
							</form>

							<div class="slideshow-container">
								<a class="prev" id="a" onclick="plusSlides(-1)">❮</a>

								<?php
								$a = $obj->getAllWeeks();
								foreach ($a as $row) {
									echo '
									<div class="mySlides">
									<i class="fa fa-calendar"  aria-hidden="true"></i><span class="text">Week ' . str_pad($row['week'], 2, '0', STR_PAD_LEFT) . '</span>
									</div>';
								}

								?>
								<a class="next" id="a" onclick="plusSlides(1)">❯</a>

							</div>

							<!-- <div class="dot-container">
								<span class="dot" onclick="currentSlide(1)"></span>
								<span class="dot" onclick="currentSlide(2)"></span>
								<span class="dot" onclick="currentSlide(3)"></span>
							</div> -->
							<div class="hrline"></div>
							<div class="days">
								<?php
								$currentday = $obj->getFirstScreenData('bday');
								?>

								<?php
								for ($i = 1; $i <= 3; $i++) {
									echo '
									<div class="a" onclick="changeDay(' . $i . ');">
										<li class="one ';
									echo $currentday == $i ? 'oneselected' : '';
									echo '" id="myLink' . $i . '">' . $i . '</li>Day
									</div>';
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<!--single page html-->
			</div><!--frame-border-->
		</div>
	</div>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script>
		// Get the modal
		var modal = document.getElementById("myModal");
		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementById("myImage");
		var modalImg = document.querySelector(".modal-content p");
		img.onclick = function() {
			modal.style.display = "block";
			//modalImg.innerHTML = this.alt;
		}
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}


		<?php
		$currentweek = $obj->getFirstScreenData('bweek');
		?>

		var slideIndex = <?php echo $currentweek; ?>;
		showSlides(slideIndex);
		$('#setweek').val(slideIndex);
		$('#setday').val(<?php echo $currentday; ?>);

		function plusSlides(n) {
			showSlides(slideIndex += n);
			$('#setweek').val(slideIndex);
			setBid();
		}

		function currentSlide(n) {
			showSlides(slideIndex = n);
			$('#setweek').val(slideIndex);
			setBid();
		}

		function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			if (n > slides.length) {
				slideIndex = 1
			}
			if (n < 1) {
				slideIndex = slides.length
			}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {

			}
			slides[slideIndex - 1].style.display = "block";
		}

		function changeDay(a) {
			$('#myLink1 ,#myLink2,#myLink3').removeClass('oneselected');
			$('#myLink' + a).addClass('oneselected');
			$('#setday').val(a);
			$('#setactivity').val(0);
			setBid();
		}

		function setBid() {
			$.get('ajax/getbid.php', {
				wid: $('#setweek').val(),
				did: $('#setday').val(),
				acid: $('#setactivity').val()
			}, function(data) {
				$('#bid').val(data);
			});
		}
	</script>
</body>

</html>