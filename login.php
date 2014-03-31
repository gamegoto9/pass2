<?
session_start();
$msg="";
$msguser="";
if(isset($_POST['user']) && isset($_POST['pass'])){
	include("conn.php");
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$sql = "select * from user where U_id_code = '$user'";
	$result = mysql_query("$sql")or die(mysql_error());
	
	
	$id_card="";
	$Bdate="";
	$status="";
	 while($data = mysql_fetch_object($result)){
			
			$user = "$data->U_id_code";
			$id_card = "$data->U_id";
			$Bdate = "$data->U_Bdate";
			$status = "$data->status";
		 }
		 
		 $password = substr($id_card,8,5);
		 $password .=substr($Bdate,8,2);
		 $password .=substr($Bdate,5,2);
		 
		 $yy = substr($Bdate,0,4)+543;
		 
		$password .= $yy;
		 $aa = mysql_num_rows($result);
		
		 
		if(mysql_num_rows($result) ==1){
			
			if($pass == $password){
				
				if($status == "0"){
					$msg .="ท่านยังไม่ได้รับการยืนยัน";
				}else if($status =="1"){
						
						$_SESSION['user'] = $user;
						//$msguser = $_SESSION['user'];
						
						$msg .="รอสักครู่ 3 วินาที";
						header("Refresh : 3;url = admin.php");
				}else
					{
						$_SESSION['user'] = $user;
						//$msguser = $_SESSION['user'];
						
						$msg .="ยินดีต้อนรับผู้ดูแลระบบ รอสักครู่ 3 วินาที";
						header("Refresh : 3;url = admin.php");
					}
				
				
				///$msglogout = "<a href='login.php'>ออกจากระบบ</a>";
				
				echo"$msguser <br/>";
				echo "$msglogout<br/>";
				echo "<center>$msg</center></body></html>";
				exit;
				
			}else{
				$msg = "Login หรือ Password ไม่ถูกต้อง<br/>";
				$msg .="<a href =\"login.php\">ย้อนกลับ</a>";
			
				echo"$msguser <br/>";
				echo "$msglogout<br/>";
				echo "$msg </body></html>";
				exit;
			}
		}else{
			$msg = "Login หรือ Password ไม่ถูกต้อง<br/>";
			$msg .="<a href =\"login.php\">ย้อนกลับ</a>";
			
				echo"$msguser <br/>";
				echo "$msglogout<br/>";
				echo "$msg </body></html>";
				exit;
		}
		
		
		
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
    <a class="brand" href="#"><img src="img/crru_logo.gif" width="25"> บริการอิเตอร์เน็ต white List มหาวิทยาลัยราชภัฏเชียงราย</a>
    
  </div>
</div>
<div class="row-fluid">
	<div class="offset4 span7">
<form id="form1" name="form1" method="post" action="<? $_SERVER['PHP_SELF'] ?>">
  <p>&nbsp;</p>
  <p>Username :
    <label>
      <input type="text" name="user" id="user" />
    </label>
  </p>
  <p>Password : 
    <label>
      <input type="password" name="pass" id="pass" />
    </label>
  </p>
  <p><a href="register.php">สมัครสมาชิก</a></p>
  <p>
    <input class="btn btn-large btn-primary" type="submit" name="submit" id="submit" value="ตกลง" />
  </p>
</form>
</div>
</div>
<script src="bootstap/jquery.min.js"></script>
<script src="bootstap/js/bootstrap.min.js"></script>
</body>
</html>
