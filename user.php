<?
session_start();
if(isset($_SESSION['user'])){
	//echo $_SESSION['user'];
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
<title>บริการอิเตอร์เน็ต white List มหาวิทยาลัยราชภัฏเชียงราย</title>
</head>



<body>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#"> <img src="img/crru_logo.gif" width="20">
</a>
    <ul class="nav">
      
      <li ><a href="#">บริการอิเตอร์เน็ต white List มหาวิทยาลัยราชภัฏเชียงราย</a></li>
      
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
	<center>
    	<h4><font color="#FF0000">สามารถใช้งานบริการอินเตอร์เน็ต White List มหาวิทยาลัยราชภัฏเชียงรายได้</font></h4>
    </center>
</form>
</body>
</html>
