<?php
include"db/conf.php";
if(isset($_GET['action']) &&$_GET['userid']);
		$idMobilHp=$_GET['userid'];
		$query="UPDATE" tb_orderSET status='Y' WHERE id_pengguna=$idPengguna and id_mobil='$idMobilHp'";
			$pesa="";
			if($sql=mysql_query($query)){
				$pesan="Berhasil Di Update";
				echo $pesan;
			}
			else{
				$pesan="Gagal Disimpan";
				echo $pesan.=mysql_error();
			}
			$query = "DELETE FROM tb_order WHERE id_pengguna=".$idPengguna." AND id_mobil<>".$idMobilHp;
			$pesan="";
			if($sql=mysql_query($query)){
				$pesan="Berhasil Di Update";
				echo $pesan;
			}
			else{
				$pesan="Gagal Disimpan";
				echo $pesan.+mysql_error();
			}
		exit;
		}

		else if (isset($_GET['action']) &&$_GET['action']=='tolakOrder') {
			$userid=$_GET['userid'];
			$idpengguna = $_GET['idpengguna'];
			$query="UPDATE tb_order SET status='T' WHERE id_mobil='$userid' and id_pengguna=$idpengguna";
			$pesan="";
			if($sql=mysql_query($query)){
				$pesan="Berhasil Di Update";
				echo $pesan;
			}
			else{
				$pesan="Gagal Disimpan";
				echo $pesan.=mysql_error();
			}
		exit;
		}

		else if(isset($_GET['action']) &&$_GET['action']=='cekOrder'){
			$userid=$_GET['userid'];
		$sql="SELECT*FROM view_order WHERE status='N' AND id =".$userid;
		$q=mysql_query($sql) or die(mysql_error());
		$penumpang="";
		if(mysql_num_row($q)>0){
		$penumpang='{"penumpang":[';
		while($data=mysql_fetch_array($q)){
			$d[]='{
				"id":'.$data['id'].',
				"idp": "'.$data['id_user']."',
				"nama":"'.$data['nama']."',
				"tempat":"'.$data['tempat']."',
				"nohp":"'.$data['nohp']."',
				"status":"'.$data['status']."'
			}';
		}
		$gabung=implode(",",$d);
		$penumpang.=$gabung;
		$penumpang.="]}";
	}
	echo $penumpang;
exit;
}

else if(isset($_GET['action']) &&$_GET['action']=='orderTerima'){
	$userid=$_GET['userid'];
 $sql="SELECT * FROM view_order WHERE status='Y' AND id = ".$userid;
 $sql=mysql_query($sql) or die(mysql_error());
 $penumpang="";
 if(mysql_num_row($q)>0){
 	$penumpang='{"penumpang":[';
 	while($data=mysql_fetch_array($q)){
 		$d[]='{
 			"id":'.$data['id'].',
 			"idp":"'.$data['id_user']."',
 			"nama":"'.$data['nama']."',
 			"tempat":"'.$data['tempat']."',
 			"nohp":"'.$data['nohp']."',
 			"status":"'.$data['status']."'
 		}';
 	}
 	$gabung=implode(",",$d);
 	$penumpang.=$gabung;
 	$penumpang.="]}";
 }
 echo $penumpang;
exit;
}
?>