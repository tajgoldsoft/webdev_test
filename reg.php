<?php
	include_once("con_db.php");
	$name=$_POST['name_user'];
	$date=date('Y-m-d');
	$number=$_POST['number_user'];
	$login=$_POST['login_user'];
	$password=$_POST['password_user'];

		$chek=$connect->query("select * from users where number_user='".$number."' or login_user='".$login."'");
		$count=mysqli_num_rows($chek);

			if ($count>0) {
				$res = array('res' =>'chek false' , );
			}
			else {

				$insert=$connect->query("insert into users(date_reg,name_user,number_user,login_user,password_user) values('".$date."','".$name."','".$number."','".$login."','".md5($password)."')");

				if ($insert) {
					$res = array('res' =>'insert true' , );
				}
				else{
					$res = array('res' =>'insert false' , );
				}
			}

	echo json_encode($res);
?>