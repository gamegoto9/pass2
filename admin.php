<?
session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['status'] == '1'){
		
		header("Refresh : 3;url = user.php");
		echo "<h3>ระบบไม่สามารถทำงานได้ เนื่องจากท่านไม่ใช่ผู้ดูแลระบบ จะกลับสู่หน้าหลักภายใน 3 วินาที </h3>";
		echo "</body></html>";
		exit;
	}
}else
{
	header("Refresh : 3;url = login.php");
	echo "<h3>ระบบไม่สามารถทำงานได้ จะกลับสู่หน้าหลักภายใน 3 วินาที </h3>";
	echo "</body></html>";
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="bootstap/css/bootstrap.min.css" rel="stylesheet">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="bootstap/css/bootstrap-responsive.min.css" rel="stylesheet">
<title>Untitled Document</title>
</head>

<body>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#"> <img src="img/crru_logo.gif" width="20">
</a>
    <ul class="nav">
      
      <li class="active"><a href="admin.php"><i class="icon-user" ></i>สมาชิกใหม่</a></li>
      <li>
   		
             <ul class="nav nav-tabs">
  				<li class="dropdown">
    					<a class="dropdown-toggle"
      					 data-toggle="dropdown"
      					 href="#"><i class="icon-file" ></i>
       					 รายงาน
        				<b class="caret"></b>
      					</a>
                        
    					<ul class="dropdown-menu">
     					  <li><a  href="detial/detail_date.php">รายงานสรุปจำนวนผู้ของใช้ประจำวัน</a></li>
                          <li><a  href="detial/detail_date_date.php?i=2">รายงานสรุปจำนวนผู้ของใช้ตามช่วงเวลาที่กำหนด</a></li>
                          <li><a  href="detial/detail_date_date.php?i=3">สถานะของผู้สมัคร</a></li>
                          <li><a  href="detial/detail_date_date.php?i=4">หน่วยงาน</a></li>
    				</ul>
                  
 				</li>
                 <li><a href="search.php"><i class="icon-search" ></i>ค้นหา</a></li>
			</ul>
    
      
      
      
      </li>
     

    </ul>
    
      <ul class="nav pull-right">
                            <li><a href="#"><i class="icon-user" ></i><? echo $_SESSION['user']; ?></a>
                            
                            
                            <li class="dropdown"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <b class="caret"></b>
                        </a>   
                        <ul class="dropdown-menu">
                            <li><a href="logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>                    
                            </li>
      </ul>
  </div>
</div>

<script src="bootstap/jquery.min.js"></script>
<script src="bootstap/js/bootstrap.min.js"></script>

<form id="form1" name="form1" method="post" action="">
	<?
	include("conn.php");
$msg="";

$sql = "select * from user where status='0'";

$result = mysql_query("$sql")  or die(mysql_error());


$type="";
$major="";

		if(mysql_num_rows($result) ==0){
			//header("Refresh : 3;url = admin.php");
			echo "<h5>ไม่มีข้อมูลสมาชิกใหม่</h5>";
			echo "</body></html>";
			exit;
		}else{

echo "<table class=table table-striped>
<tr bgcolor=#99CCCC>
		<th>ชื่อ-สกุล</th>
		<th>รหัสประจำตัวประชาชน</th>
		<th>รหัสบุคลากร</th>
		<th>ประเภท</th>
		<th>สาขาวิชา</th>
		<th>เบอร์โทร</th>
		<th>เบอร์มือถือ</th>
		<th>E-mail</th>
		<th>ดูข้อมูล</th>
		<th>ลบ</th>
</tr>
";

while($data = mysql_fetch_array($result)){
	
	$sql2 = "select * from type where T_id = ".$data["T_id"]."";
	$result2 = mysql_query("$sql2")  or die(mysql_error());
	
	$type = mysql_result($result2,0,"T_name");
	
	$sql2 = "select * from major where M_id =".$data["M_id"]."";
	$result2 = mysql_query("$sql2")  or die(mysql_error());
	
	$major = mysql_result($result2,0,"M_name");
	
	echo "<tr>
				<td>".$data["U_Tname"]."</td>
				<td>".$data["U_id"]."</td>
				<td>".$data["U_id_code"]."</td>
				<td>".$type."</td>
				<td>".$major."</td>
				<td>".$data["tel"]."</td>
				<td>".$data["tel2"]."</td>
				<td>".$data["email"]."</td>
				
				<td><a href=\"edit_user.php?id_code=".$data["U_id_code"]."\">ดูข้อมูล</a></td>
				
				<td><a href=\"delete_user.php?id_code=".$data["U_id_code"]."\">ลบ</a></td>

				</tr>";
}
echo "</table>";
		}
	
	?>

</form>

</body>
</html>
