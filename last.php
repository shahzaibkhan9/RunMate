<?php
include_once('xloop/stepin.php');
$base = $obj->getbase($_GET['bid']);
$obj->setStatus($_SESSION['rm_user_id'], $base['bid'], '00:00:00', $base['bduration']);
//$dayrun = $obj->getFinals($_SESSION['rm_user_id'], 'running', $base['bweek'], $base['bday']);
//$dayjog = $obj->getFinals($_SESSION['rm_user_id'], 'jogging', $base['bweek'], $base['bday']);
$dayTraining = $obj->getFinals_new($_SESSION['rm_user_id'], 'jogging', $base['bweek'], $base['bday']);

// $overallrun = $obj->getOverall($_SESSION['rm_user_id'], 'running');
// $overalljog = $obj->getOverall($_SESSION['rm_user_id'], 'jogging');

$overallTraining = $obj->getOverall_new($_SESSION['rm_user_id'], 'jogging');


function calctime($a)
{
	$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $a);
	sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
	$time_seconds = $hours * 3600 + $minutes * 60 + $seconds;
	return $time_seconds;
}


//Day Calories Burn
// $dr = calctime($dayrun);
// $dayrunburn = (($_SESSION["rm_user_weight"] * 12 * 3.5) * ($dr / 60)) / 200;
// $dj = calctime($dayjog);
// $dayjogburn = (($_SESSION["rm_user_weight"] * 8 * 3.5) * ($dj / 60)) / 200;
// $daycalburn = ($dayrunburn + $dayjogburn);
$dr = calctime($dayTraining);
$daycalburn = (($_SESSION["rm_user_weight"] * 12 * 3.5) * ($dr / 60)) / 200;
//Day Calories Burn

// //Overall Calories Burn
// $overallr = calctime($overallrun);
// $overallrburn = (($_SESSION["rm_user_weight"] * 12 * 3.5) * ($overallr / 60)) / 200;
// $overallj = calctime($overalljog);
// $overalljogburn = (($_SESSION["rm_user_weight"] * 8 * 3.5) * ($overallj / 60)) / 200;
// $overallcalburn = ($overallrburn + $overalljogburn);

$overallr = calctime($overallTraining);
$overallcalburn = (($_SESSION["rm_user_weight"] * 12 * 3.5) * ($overallr / 60)) / 200;
//Overall Calories Burn

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--font-awesome-css-->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!--bootstrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--custom css-->
	<link href="css/lastpage.css" rel="stylesheet" type="text/css" />
	<!--component-css-->

	<!--default-js-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!--bootstrap-js-->
	<script src="js/bootstrap.min.js"></script>
	<!--script-->
	<title>Daily Progress</title>
</head>

<body>
	<div class="fit_main">
		<div class="main_frame">
			<div class="frame-border" src="" frameborder="0">

				<h1 class="fl-heading">Daily</h1>
				<h2 class="fl-heading2"> Progress</h2>
				<h3 class="fl-heading3"> <span>Week <?php echo $base['bweek']; ?> / Day <?php echo $base['bday']; ?></span></h3>
				`
				<div class="boxes">
					<!-- <div class="elapsed">
						<img class="run-img" src="images/run.png" alt="">
						<span class="timer2"><?php // echo date_format(date_create($dayrun), "i"); ?> min</span>
						<h1 class="heading2">Run</h1>
					</div>
					<div class="remain">
						<img class="walk-img" src="images/walking.png" alt="">
						<span class="timer2"><?php // echo date_format(date_create($dayjog), "i"); ?> min</span>
						<h1 class="heading3">Jog</h1>
					</div> -->

					<div class="elapsed">
						<img class="kcl-img" src="images/run.png" alt="">
						<span class="calories-count"><?php echo date_format(date_create($dayTraining), "i"); ?> min</span>
						<h1 class="heading2">Training</h1>
					</div>
					

					<div class="calories">
						<img class="kcl-img" src="images/kcl.png" alt="">
						<span class="calories-count"><?php echo round($daycalburn / 1000, 2); ?> Kcal</span>
						<h1 class="calories-heading">Calories Burned</h1>
					</div>
				
				</div>
				<!-- <img class="achivement" src="achivement.png" alt=""> -->
				
				<?php
				if($_GET['bid'] == 219){
				?>
<h4 class="heading-complete" style="margin-top: 135px;"><span>Congratulations!</span>Your dedication and hard work have paid off, and you should be proud of your accomplishment.</h4>					
				<button type="button" class="achivement" onclick="gohome()">
					<i class="fa fa-refresh fa-lg homeicon" aria-hidden="true"></i> Start Week 1</button>
					
					
				<?php }
				else{?>
				<button type="button" class="achivement" style="margin-top:200px;" onclick="gohome()">
					<i class="fa fa-home fa-lg homeicon" aria-hidden="true"></i> Go To Home</button>
				<?php }?>
				
				<!--<button type="button" class="achivement" onclick="gohome()">
					<i class="fa fa-home fa-lg homeicon" aria-hidden="true"></i> Go To Home</button>-->
				<h4 class="achhivement-heading">OVERALL PROGRESS</h4>
				<div class="daily-total">
					<h5 class="total"><img src="images/icon.png" alt=""> Training<span class="total-time">: <?php echo date_format(date_create($overallTraining), "i"); ?> min</span></h5>
					<!-- <h5 class="total"><img src="images/icon.png" alt=""> Jogging<span class="total-time">: <?php // echo date_format(date_create($overalljog), "i"); ?> min</span></h5> -->
				</div>
				<h5 class="total-calorie"><img src="images/icon.png" alt=""> CALORIE<span class="total-kcal">: <?php echo  round($overallcalburn / 1000, 2); ?> Kcal</span></h5>
			</div>
		</div>
	</div>

	<?php
	if($_GET['bid'] == 219){
	//$base = $obj->getbase($_GET['bid']+1);
	$actime = "00:00:00";
	$baseid = 1;
	$reset = 1;
	}
	else{
	$base = $obj->getbase($_GET['bid']+1);
	$actime = $base['bduration'];
	$baseid = $base['bid'];    
	$reset = 0;
	}
	
	?>

	<script>
		function gohome() {
			$.post('ajax/setstatus2.php', {
				bid: <?php echo $baseid; ?>,
				ts: "00:00:00",
				tl: "<?php echo $actime;?>",
				reset: <?php echo $reset;?>
			}, function(datas) {
			    //console.log(datas);
				window.location.assign('index.php');
			});

		}
	</script>
</body>

</html>