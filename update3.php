<?php
//@mysql_connect("localhost", "root", "root") or die(mysql_error());
include("conn.php");
$type = $_GET['data'];
$db = $_GET['search'];

$msg ="";


if($db == "type"){
	$sql = "select * from type";
	$result = mysql_query("$sql")or die(mysql_error());
	
}elseif($db == "D_id"){
	
	$sql = "select D_id,D_name from department";
	$result = mysql_query("$sql")or die(mysql_error());

}
//คำสั่งจาวาสคริปต์สำหรับลบ Option เดิม โดยเรียกฟังก์ชัน removeOption() ซึ่งสร้างไว้ที่เพจ index.php
$js = "removeOption();";

if(mysql_num_rows($result)==0) {		//ถ้าฐานข้อมูลนั้นไม่มีตารางอยู่เลย
	$js .= $msg;
}
else {
	$i = 0;
	while($data = mysql_fetch_array($result)){
		//คำสั่งจาวาสคริปตสำหรับสร้างและเพิ่ม Option ใหม่จนครบทุกตัว
		$js .= "
		
			
			var opt = new Option('".$data['1']."', '".$data['0']."');
			document.getElementById('data').options[$i] = opt;
			
			
		";
		$i++;
	}
}

header("Content-Type:text/javascript; charset=tis-620");

echo $js;

?>
