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
	public function __construct($studio,$user,$start,$end)  
	{  
		$this->dbh= new PDO("mysql:host=localhost;dbname=urn", "root", "elvis");
		$this->room=$studio;
		$this->name=$user;
		$this->startTime=$start;
		$this->endTime=$end;
	}  
	public function verify()
	{
		$this->verified=false;
		$strSQL="SELECT * FROM booking_$this->room WHERE timeStart<'$this->endTime' AND timeEnd>'$this->startTime' ORDER BY timeStart ASC";
		$currentBookings=$this->dbh->query($strSQL);
		$clash=0;
		while ($currentBooking = $currentBookings->fetch(PDO::FETCH_ASSOC)){$clash++;}
		if ($clash) {echo("Your booking clashes with $clash other bookings");} else {$this->verified=true;}
	}
	public function confirm()
	{
		if ($this->verified){echo "Inserting into Database...";} else {echo "Please verify booking doesn't clash first";}
	}
}
if (isset($_POST['room'])) {
	$myBooking = new booking($_POST['room'],$_POST['user'],$_POST['startTime'],$_POST['endTime']);  
	$myBooking->verify();
	if ($_POST['stage']=="Confirm")
	{
		$myBooking->confirm();
	}
}
?>