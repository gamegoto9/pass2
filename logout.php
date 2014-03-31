<?
session_start();
include("conn.php");
$date = date("Y-m-d");
$time = date("H:i:s");
if(isset($_SESSION['user'])){
	
	
	if($_SESSION['status'] == '1'){

		$sql = "update detail set e_date = '$date',e_time = '$time',status = '0' where U_id_code = '".$_SESSION['user']."' and status = '1'";
		$result = mysql_query("$sql")or die (mysql_error());
	}
	
	unset($_SESSION['user']);
	
	
	
	header("Refresh : 3;url = login.php");
	echo "<h3>ท่านได้ออกจากระบบแล้ว จะกลับสู่หน้าหลักภายใน 3 วินาที </h3>";
	echo $_SESSION['user'];
	
}
else{
	header("Refresh : 3;url = login.php");
	echo "<h3>ระบบไม่สามารถทำงานได้ จะกลับสู่หน้าหลักภายใน 3 วินาที </h3>";

	exit;
}
?>
