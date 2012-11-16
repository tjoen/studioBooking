<?php
// REMOVE BLOCK ON RELEASE!!
error_reporting(-1); 
ini_set('display_errors', '1');
?>
<?php
class booking  
{  
	private $dbh;
	public $room;
	public $name;
	public $startTime;
	public $endTime;
	public $verified;
	public function __construct($studio,$user,$start,$end,$verified=false)  
	{  
		$this->dbh= new PDO("mysql:host=localhost;dbname=urn", "root", "elvis");
		$this->room=$studio;
		$this->name=$user;
		$this->startTime=$start;
		$this->endTime=$end;
		$this->verified=$verified;
	}  
	public function verify()
	{
		$this->verified=false;
		$strSQL="SELECT * FROM booking_$this->room WHERE timeStart<'$this->endTime' AND timeEnd>'$this->startTime' ORDER BY timeStart ASC";
		$currentBookings=$this->dbh->query($strSQL);
		$clash=0;
		while ($currentBooking = $currentBookings->fetch(PDO::FETCH_ASSOC)){$clash++;}
		echo $clash;
		if (!$clash) {
			$this->verified=true;
			$_SESSION['booking']=array($this->room,$this->name,$this->startTime,$this->endTime,$this->verified);
		}
	}
	public function confirm()
	{
		if ($this->verified){
			echo "done"; 
			session_destroy();
		} else {
			echo "Please verify booking doesn't clash first";
		}
	}
}
session_start();
if (empty($_SESSION['booking'])) {
	$myBooking = new booking($_POST['room'],$_POST['user'],$_POST['startTime'],$_POST['endTime']);  
	$myBooking->verify();	
} else {
	$myBooking = new booking($_SESSION['booking'][0],$_SESSION['booking'][1],$_SESSION['booking'][2],$_SESSION['booking'][3],$_SESSION['booking'][4]);  
	$myBooking->confirm();
}
?>
