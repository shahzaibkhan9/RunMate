<?php
require_once('xl_config.php');
class xloop
{
	function xcon()
	{
	   global $host;
	   global $user;
	   global $pass;
	   global $dbname;
		//$con = mysqli_connect("localhost", "root", "", "fitlynk") or die("Error in connection!");
		$con = mysqli_connect($host, $user, $pass, $dbname) or die("Error in connection!");
		return $con;
	}

function getUserData($uid)
	{
		$qu = "
				SELECT a.userid,c.username,concat(c.first_name,' ',c.last_name) as 'full_name',c.gender,c.birthday,a.start_date,a.bid,a.time_spent,a.time_left,b.height, b.weight, 
				(ifnull(DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),c.birthday)), '%Y'),0)*1) as 'age'
				FROM `Rm_Users` as a 
				join `ffc_user_fitness_profile` as b
				on 
				a.userid = b.user_id
				join `Wo_Users` as c on 
				a.userid = c.user_id 
				where a.userid = $uid;
				";
		$q = mysqli_query($this->xcon(), $qu) or die("Error in query! getUserData");
		if(mysqli_num_rows($q) <= 0){
			$qr = "INSERT INTO `Rm_Users`(`userid`,`start_date`, `bid`, `time_spent`, `time_left`) VALUES ($uid,CURRENT_DATE(),1,'00:00:00','00:05:00');";
			$q = mysqli_query($this->xcon(), $qr) or die("Error in query! Registering User in Rm_Users");
			$q = mysqli_query($this->xcon(), $qu) or die("Error in query! getUserData");
			// $this->getUserData($uid);
		}
		
		return $q;
		
	}

	function addnewuserlog($uid)
	{
		$q = mysqli_query($this->xcon(), "SELECT * FROM `Rm_User_Log` where uid = $uid;") or die("error while checking exisiting user");
		if (mysqli_num_rows($q) == 0) {
			$q = mysqli_query($this->xcon(), "SELECT * FROM `Rm_Base`;") or die("error while reading base");
			foreach ($q as $r) {
				$bid = $r['bid'];
				$btime = $r['bduration'];
				$qu = "insert into `Rm_User_Log`(uid,bid,time_spent,time_left,btime) values($uid,$bid,'00:00:00','$btime','$btime');";
				mysqli_query($this->xcon(), $qu) or die("error adding entries");
			}
		}
	}

	function getFirstScreenData($key)
	{
		$query = "SELECT a.bid,a.bactivity,a.bweek,a.bday,a.bactivityid
					FROM Rm_Base AS a
					JOIN Rm_Users AS b
					ON a.bid = b.bid
					JOIN Wo_Users AS c 
					ON b.userid = c.user_id
					WHERE b.userid = " . $_SESSION["rm_user_id"] . ";";
		$q = mysqli_query($this->xcon(), $query) or die("Error in query! getFirstScreenData");
		$result = mysqli_fetch_array($q);
		return $result[$key];
	}


	function getAllWeeks()
	{
		$query = "SELECT distinct(bweek) as 'week' from Rm_Base;";
		$q = mysqli_query($this->xcon(), $query) or die("Error in query! getAllWeek");
		return $q;
	}


	function setStatus($uid, $bid, $ts, $tl)
	{
		$query = "update Rm_Users set start_date=now(), bid=$bid, time_spent='$ts', time_left='$tl' where userid = $uid;";
		mysqli_query($this->xcon(), $query) or die("Error in query! setStatus");
	}

	function getbaseactivity($bweek, $bday, $bacid)
	{
		$query = "select * from Rm_Base where bweek = $bweek and bday = $bday and bactivityid = $bacid;";
		$q = mysqli_query($this->xcon(), $query) or die("Error in query! getbaseactivity");
		$q = mysqli_fetch_array($q);
		return $q;
	}
	function getbase($bid)
	{
		$query = "select * from Rm_Base where bid = $bid;";
		$q = mysqli_query($this->xcon(), $query) or die("Error in query! getbaseactivity");
		$q = mysqli_fetch_array($q);
		return $q;
	}


	// function getbaseactivityduration($bid)
	// {
	// 	$query = "SELECT * FROM Rm_Base where bid = $bid;";
	// 	$q = mysqli_query($this->xcon(), $query) or die("Error in query! getbaseactivityduration");
	// 	$q = mysqli_fetch_array($q);
	// 	return $q;
	// }

	function gettotaldurationofday($bweek, $bday, $user)
	{
		//$query = "SELECT SEC_TO_TIME(SUM( TIME_TO_SEC( `bduration` ) ) ) as 'dayduration' FROM Rm_Base where bweek = $bweek and bday = $bday;";
		$query = "SELECT SEC_TO_TIME(SUM( TIME_TO_SEC( `time_left` ) ) ) as 'dayduration' 
		FROM Rm_User_Log where 
		bid in (select bid from Rm_Base where bweek=$bweek and bday = $bday) 
		and uid = $user;";
		$q = mysqli_query($this->xcon(), $query) or die("Error in query! gettotaldurationofday");
		$q = mysqli_fetch_array($q);
		return $q['dayduration'];
	}


	function logtimespent($bweek, $bday)
	{
		$query = "select 
			SEC_TO_TIME( SUM( TIME_TO_SEC( `time_spent` ) ) ) as 'spent'
			from Rm_User_Log where bid in (SELECT bid FROM `Rm_Base` where bweek = $bweek and bday = $bday)";
		$q = mysqli_query($this->xcon(), $query) or die("Error in query! logtimespent");
		$q = mysqli_fetch_array($q);
		return $q['spent'];
	}


	function addlog($uid, $bid, $time)
	{
		$query = "UPDATE `Rm_User_Log` SET `time_left`='$time',`time_spent` = TIMEDIFF(`btime`,`time_left`)  WHERE uid = $uid and bid = $bid;";
		mysqli_query($this->xcon(), $query) or die("error in query! log issue");
	}

	function getTimeleft($uid, $bid)
	{
		$query = "select time_left from `Rm_User_Log` where uid = $uid and bid = $bid;";
		$q = mysqli_query($this->xcon(), $query) or die("error in query! log issue");
		$q = mysqli_fetch_array($q);
		return $q['time_left'];
	}


	function getTotalActivities($bweek, $bday)
	{
		$query = "select max(bactivityid) as 'totalactivities' from Rm_Base where bweek = $bweek and bday = $bday;";
		$q = mysqli_query($this->xcon(), $query) or die("error in query! log issue");
		$q = mysqli_fetch_array($q);
		return $q['totalactivities'];
	}

	//this method was written to give separate running and walking data
	function getFinals($uid, $key, $bweek, $bday)
	{
		$query = "select SEC_TO_TIME(SUM(TIME_TO_SEC(time_spent))) as 'spent' from Rm_User_Log where uid=$uid and bid in 
		(SELECT bid from Rm_Base where bweek = $bweek and bday = $bday and bactivity = '$key');
		";
		$q = mysqli_query($this->xcon(), $query) or die("error in query! log issue");
		$q = mysqli_fetch_array($q);
		return $q['spent'];
	}
	//this method was written to give separate running and walking data

	//this method was written to give training time at all
	function getFinals_new($uid, $key, $bweek, $bday)
	{
		$query = "select SEC_TO_TIME(SUM(TIME_TO_SEC(time_spent))) as 'spent' from Rm_User_Log where uid=$uid and bid in 
		(SELECT bid from Rm_Base where bweek = $bweek and bday = $bday and bactivity in ('Running','WALKING'));
		";
		$q = mysqli_query($this->xcon(), $query) or die("error in query! log issue");
		$q = mysqli_fetch_array($q);
		return $q['spent'];
	}

	function getOverall($uid, $key)
	{
		$query = "select SEC_TO_TIME(SUM(TIME_TO_SEC(time_spent))) as 'spent' from Rm_User_Log where uid=$uid and bid in 
		(SELECT bid from Rm_Base where bactivity = '$key');
		";
		$q = mysqli_query($this->xcon(), $query) or die("error in query! log issue");
		$q = mysqli_fetch_array($q);
		return $q['spent'];
	}

	//this method was written to give overall training time at all
	function getOverall_new($uid, $key)
	{
		$query = "select SEC_TO_TIME(SUM(TIME_TO_SEC(time_spent))) as 'spent' from Rm_User_Log where uid=$uid and bid in 
		(SELECT bid from Rm_Base where bactivity in ('Running','WALKING'));
		";
		$q = mysqli_query($this->xcon(), $query) or die("error in query! log issue");
		$q = mysqli_fetch_array($q);
		return $q['spent'];
	}
	
	
	function resetall($uid)
	{
		$query = "delete FROM `Rm_User_Log` where uid = $uid;";
		mysqli_query($this->xcon(), $query) or die("error in query! reset issue");
	}

}	//end of xloop class