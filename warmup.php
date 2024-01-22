<?php
include_once('xloop/stepin.php');
//$base = $obj->getbaseactivity($_GET['week'], $_GET['day'], $_GET['setactivity']);
$base = $obj->getbase($_GET['bid']);
$obj->setStatus($_SESSION['rm_user_id'], $base['bid'], '00:00:00', $base['bduration']);
$totalday = $obj->gettotaldurationofday($base['bweek'], $base['bday'], $_SESSION['rm_user_id']);
$spent = $obj->logtimespent($base['bweek'], $base['bday']);
$Timeleft = $obj->getTimeleft($_SESSION['rm_user_id'], $_GET['bid']);
$TotalActivities = $obj->getTotalActivities($base['bweek'], $base['bday']);
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
    <link href="css/warmup.css" rel="stylesheet" type="text/css" />
    <!--component-css-->

    <!--default-js-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!--bootstrap-js-->
    <script src="js/bootstrap.min.js"></script>
    <!--script-->
    <title>RunMate <?php echo strtoupper($base['bactivity']); ?></title>
</head>

<body>
    <audio autoplay id="dingAudio">
        <?php
	        echo $Timeleft === "00:00:00" ? "" : "<source src='".$base['bactivity'].".mp3' type='audio/mp3' />";
	    ?>
        <!--<source src='<?php //echo $base['bactivity']; ?>.mp3' type="audio/mp3" />-->
    </audio>
    <input type="hidden" id="bid" value="<?php echo $base['bid']; ?>" />
    <input type="hidden" id="bactivityId" value="<?php echo $base['bactivityid']; ?>" />
    <div class="fit_main">
        <div class="lock_frame" style="display:none">
            <h1 class="heading"><?php echo strtoupper($base['bactivity']); ?></h1>
            <h2 class="timer"> <span class='main_timer'><?php echo date_format(date_create($Timeleft), "i:s"); ?></span>
            </h2>
            <?php
					 echo $Timeleft === "00:00:00" ? '<h2 class="timer-complete">Completed!</h2>' : "";
			?>
            <div class="lock">
                <!-- <i class="keylock fa fa-lock" id="lock"></i> -->
                <i class="keylock fa fa-unlock-alt" id="unlock"></i>
            </div>
        </div>
        <div class="main_frame">
            <div class="frame-border">
                <div class="mp-image">
                    <h1 class="heading"><?php echo strtoupper($base['bactivity']); ?></h1>
                    <h2 class="timer"> <span
                            class='main_timer'><?php echo date_format(date_create($Timeleft), "i:s"); ?></span> </h2>
                    <?php
					 echo $Timeleft === "00:00:00" ? '<h2 class="timer-complete">Completed!</h2>' : "";
					?>

                    <input type="hidden" name="bactime" id="bactime"
                        value="<?php echo date_format(date_create($Timeleft), "i:s"); ?>" />
                    <div class="boxes">
                        <div class="elapsed">
                            <span class="timer2"><span
                                    class="elapsed_timer"><?php echo date_format(date_create($spent), "i:s"); ?></span>
                                <h1 class="heading2">ELAPSED</h1>
                        </div>
                        <div class="remain">
                            <span class="timer3"><span
                                    class='remain_timer'><?php echo date_format(date_create($totalday), "i:s"); ?></span>
                                <h1 class="heading3">REMAIN</h1>
                        </div>
                    </div>

                    <div class="workoutdisplay">
                        <?php if ($base['bactivityid'] != 0 && $base['bactivityid'] != -1) { ?>
                        <h1 class="workoutdisplay-heading">WORKOUT</h1>
                        <div class="workoutdisplay-of">
                            <span class="workoutdisplay-st"><?php echo $base['bactivityid']; ?></span>
                            OF
                            <span class="workoutdisplay-end"><?php echo $TotalActivities; ?></span>
                        </div>
                        <?php }		?>
                    </div>
                    <!--workoutdisplay-->


                    <div class="pause">
                        <div>
                            <i class=" fa fa-play left fa-rotate-180 play_audio"></i>
                        </div>
                        <div class="pausebtn">
                            <button type="button" class="pause-des" onclick="setrunning()">PAUSE</button>
                            <button type="button" class="next-des play_audio" onclick="setrunning()"
                                style="display:none">Next</button>
                            <div class="secondarybtns">
                                <button type="button" class="resume-des" onclick="setrunning()">RESUME</button>
                                <button type="button" class="end-des" onclick="end()">END</button>
                            </div>
                        </div>

                        <div>
                            <i class="fa fa-play right play_audio"></i>
                        </div>
                    </div>

                    <!--<hr class=" bg-danger border-8 border-top border-danger" id="hr">-->
                    <div class="lock">
                        <i class="keylock fa fa-lock" id="lock"></i>
                        <!-- <i class="keylock fa fa-unlock-alt" id="unlock"></i> -->
                    </div>
                </div>
            </div>
            <!--frame border-->
        </div>
    </div>

    <script>
    // 		$(".play_audio").click(function(){
    // 			//var x = document.getElementById("dingAudio");
    // 			//x.play();
    // 		});

    $("#lock").click(function() {
        setLock();
    });

    $("#unlock").click(function() {
        setUnlock();
    })

    function setLock() {
        $(".lock_frame").slideDown(1000);
    }

    function setUnlock() {
        $(".lock_frame").slideUp(1000);
    }


    var isrunning = true;
    function setrunning() {
        isrunning = isrunning ? false : true;
        isrunning ? showhide(1) : showhide(0);
    }

    function showhide(a) {
        if (a == 1) {
            $(".secondarybtns").css("display", "none");
            $(".pause-des").removeClass('pause-des-dark');
            $(".left,.right").css("display", "block");
            $(".pause-des").css("display", "block");
        } else {
            $(".pause-des").css("display", "none");
            $(".left,.right").css("display", "none");
            $(".pause-des").addClass('pause-des-dark');
            $(".secondarybtns").css("display", "flex");
        }
    }

    function shownext(auto) {
        $(".pause-des").css("display", "none");
        $(".secondarybtns").css("display", "none");
        $(".next-des").css("display", "block");
        setUnlock();
        //Automatic moving to next activity
        if (auto == 1) {

            // navigator.vibrate(300);
            if (navigator.vibrate) {
                // Duration should be in milliseconds
                navigator.vibrate(500);
            } else {
                console.warn("Vibration API not supported on this device.");
            }

            setTimeout(function() {
                //checking base activity if it is last?
                let bacid = $("#bactivityId").val();

                let url = new URL(window.location.href);
                let ac = parseInt(url.searchParams.get("bid"));
                url.searchParams.set("bid", ++ac);
                var newUrl = bacid == -1 ? 'last.php?bid=<?php echo $base['bid']; ?>' : url.href;
                window.location.assign(newUrl);
            }, 1000);
        }
        //Automatic moving to next activity


    }

    $(".right,.next-des").click(function() {
        //checking base activity if it is last?
        let bacid = $("#bactivityId").val();

        let url = new URL(window.location.href);
        let ac = parseInt(url.searchParams.get("bid"));
        url.searchParams.set("bid", ++ac);
        var newUrl = bacid == -1 ? 'last.php?bid=<?php echo $base['bid']; ?>' : url.href;
        window.location.assign(newUrl);
    });

    $(".left").click(function() {
        //checking base activity if it is first?
        let bacid = $("#bactivityId").val();
        let url = new URL(window.location.href);
        let ac = parseInt(url.searchParams.get("bid"));
        url.searchParams.set("bid", --ac);
        var newUrl = bacid == 0 ? 'index.php' : url.href;
        window.location.assign(newUrl);
    });


    //remain timer
    let remain_timer = $(".remain_timer").html();
    var rtimer = remain_timer.split(':');
    var rseconds = parseInt(rtimer[1], 10);
    var rminutes = parseInt(rtimer[0], 10);
    //remain timer


    //main activity timer
    let main_timer = $(".main_timer").html();
    if (main_timer == "00:00") {
        //setstatus();
        setrunning();
        shownext(0);
    }
    //main activity timer


    let elapsed_timer = $(".elapsed_timer").html();
    var etimer = elapsed_timer.split(':');
    var eseconds = parseInt(etimer[1], 10);
    var eminutes = parseInt(etimer[0], 10);


    //bactimer

    let ac_timer = $("#bactime").val();
    var actimer = ac_timer.split(':');
    var acseconds = parseInt(actimer[1], 10);
    var acminutes = parseInt(actimer[0], 10);

    var intr = setInterval(() => {
        if (isrunning) {
            //for remain time
            --rseconds;
            if (rseconds < 0) {
                rseconds = 59;
                --rminutes;
            }
            $('.remain_timer').html(('0' + rminutes).slice(-2) + ":" + ('0' + rseconds).slice(-2));
            //for remain time


            //for elapsed time
            ++eseconds;
            if (eseconds >= 60) {
                eseconds = 0;
                ++eminutes;
            }
            $('.elapsed_timer').html(('0' + eminutes).slice(-2) + ":" + ('0' + eseconds).slice(-2));
            //for elapsed time

            --acseconds;
            if (acseconds < 0) {
                acseconds = 59;
                --acminutes;
            }

            $('#bactime').val(('0' + acminutes).slice(-2) + ":" + ('0' + acseconds).slice(-2));

            //for main timer
            var timer = main_timer.split(':');
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) clearInterval(interval);
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            $('.main_timer').html(('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2));
            main_timer = minutes + ':' + seconds;
            //for main timer
            //console.log(main_timer);
            if (main_timer == "0:00") {
                setstatus();
                setrunning();
                shownext(1);
            }
        }
    }, 1000);



    setInterval(() => {
        setstatus();
    }, 5000);


    function setstatus() {
        mtime = $('.main_timer').html().split(/:/);
        etime = $('#bactime').val().split(/:/);
        $.post('ajax/setstatus2.php', {
            bid: $('#bid').val(),
            ts: "00:" + etime[0] + ":" + etime[1],
            tl: "00:" + mtime[0] + ":" + mtime[1],
            reset: 0
        }, function(datas) {
            console.log(datas);
        });
    }

    function end() {
        mtime = $('.main_timer').html().split(/:/);
        etime = $('#bactime').val().split(/:/);
        $.post('ajax/setstatus2.php', {
            bid: $('#bid').val(),
            ts: "00:" + etime[0] + ":" + etime[1],
            tl: "00:" + mtime[0] + ":" + mtime[1],
            reset: 0
        }, function(datas) {
            window.location.assign('index.php');
        });
    }
    </script>
</body>

</html>