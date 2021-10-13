<?php
	
	include_once("con_db.php");
	$idu=$_POST['idu'];
	$afi=$_POST['afi'];
	$type=$_POST['type'];
	if ($type=='a_f') {
		$insert_fav=$connect->query("INSERT INTO `fav_nums`( `id_user`, `id_ufav`, `date`)  VALUES('".$idu."','".$afi."','".date('Y-m-d')."')");
		if ($insert_fav) {
			$res = array('addfav' =>'true' , );
		}
		else{
			$res = array('addfav' =>'false' , );
		}
	}
	elseif($type=='d_f'){
		$insert_fav=$connect->query("delete from fav_nums where id_ufav='".$afi."'");
		if ($insert_fav) {
			$res = array('delfav' =>'true' , );
		}
		else{
			$res = array('delfav' =>'false' , );
		}
	}
	elseif($type=='o_l'){
		$list=$connect->query("select f.*, u.* from fav_nums f left join users u on f.`id_ufav`=u.`id_user` where f.`id_user`='".$idu."'");
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
							elseif($count>0){ $but_fav="<span id='s_".$getml['id_user']."'><a href='#' id='".$getml['id_user']."' onclick='del_fav(this);'>Удалить из Избранние</a></span>";	}
							$tau.="<tr>
									<td>".$nl."</td>
									<td>".$getml['name_user']."</td>
									<td>".$getml['number_user']."</td>
									<td>".$getml['date_reg']."</td>
									<td>".$but_fav."</td>
									</tr>";
						}
						$tau.="</table><br><a href='#' onclick='home();'><<<< << < Список контактов</a>";
				$res = array('tau'=>$tau);
	}
			
			
	echo json_encode($res);
?>