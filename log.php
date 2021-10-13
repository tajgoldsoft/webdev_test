<?php
	
	include_once("con_db.php");
	$login=$_POST['login_user'];
	$password=$_POST['password_user'];

		$chek=$connect->query("select * from users where login_user='".$login."' and password_user='".md5($password)."'");
		$count=mysqli_num_rows($chek);

			if ($count>0) {
				while ($getmas=mysqli_fetch_assoc($chek)) {
					$idu=$getmas['id_user'];
					$nau=$getmas['name_user'];	
				}
					//$list=$connect->query("select f.*, u.* from fav_nums f left join user u on f.`id_ufav`=u.`id_user` where f.`id_user`='".$idu."'");
					$list=$connect->query("select * from users where id_user<>'".$idu."'");
					$tau.="<table class='list'>
							<tr>
							<td>№</td>
							<td>Имя</td>
							<td>Номер</td>
							<td>Дата регис</td>
							<td>Избранние</td>
							</tr>
					";

						while ($getml=mysqli_fetch_assoc($list)) {
							$nl++;
							$fav_chek=$connect->query("select * from fav_nums where id_ufav='".$getml['id_user']."' and id_user='".$idu."'");
							$count=mysqli_num_rows($fav_chek);
							if ($count<=0) {$but_fav="<span id='s_".$getml['id_user']."'><a href='#' id='".$getml['id_user']."' onclick='add_fav(this);'>Добавить в Избранние</a></span>";}
							elseif($count>0){ $but_fav="<span id='s_".$getml['id_user']."'><a href='#' id='".$getml['id_user']."' onclick='del_fav(this);'>Удалить из Избранние</a><span>";	}
							$tau.="<tr>
									<td>".$nl."</td>
									<td>".$getml['name_user']."</td>
									<td>".$getml['number_user']."</td>
									<td>".$getml['date_reg']."</td>
									<td>".$but_fav."</td>
									</tr>";
						}
						$tau.="</table> <br><a href='#' onclick='open_list();'>Список контактов в избронных</a>";
				$res = array('res' =>"chek true",'idu' =>$idu,'nau'=>$nau, 'tau'=>$tau);
			}
			else{
				$res = array('res' =>"chek false" , );
			}
	echo json_encode($res);
?>