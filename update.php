<?php
//@mysql_connect("localhost", "root", "root") or die(mysql_error());
include("conn.php");
$major = $_GET['major'];
$dd = $_GET['major2'];

$db = $_GET['de'];
//$tbs = mysql_list_tables($db);
$sql = "select * from major where D_id = $db";
$result = mysql_query("$sql")or die(mysql_error());
//คำสั่งจาวาสคริปต์สำหรับลบ Option เดิม โดยเรียกฟังก์ชัน removeOption() ซึ่งสร้างไว้ที่เพจ index.php
$js = "removeOption();";

if(mysql_num_rows($result)==0) {		//ถ้าฐานข้อมูลนั้นไม่มีตารางอยู่เลย
	$js .= "
		var opt = new Option('', '');
		document.getElementById('major').options[0] = opt;
	";
}
else {
	$i = 0;
	while($data = mysql_fetch_object($result)){
		//คำสั่งจาวาสคริปตสำหรับสร้างและเพิ่ม Option ใหม่จนครบทุกตัว
		$js .= "
		
			
			var opt = new Option('$data->M_name', '$data->M_id');
			document.getElementById('major').options[$i] = opt;
			
			
		";
		$i++;
	}
	
	if(isset($dd)){
	$js.="
		document.getElementById('major').value='$dd';
			";
	}
	
}

header("Content-Type:text/javascript; charset=tis-620");

echo $js;

?>
