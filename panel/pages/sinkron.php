<?php
ini_set('max_execution_time',0);
include "../../config/ipserver.php";

$PCSEVER = $host_name;

include "../../config/server.php";
$serverid = $log['XKodeSekolah'];
$folder = $log['XFolderPusat'];

include "../../config/server_pusat.php";

$sql = mysql_query("select * from server_sekolah where XServerId='$serverid'");
$st = mysql_fetch_array($sql);


$sinch = mysql_query("select * from cbt_sinc where XServerId='$serverid'");

if($sinch == true) {
	$sts = $st['XStatusSinc'];

	if($sts == "2") {$kata ="disabled";}
	else {$kata = "enabled";}

	$sinch1 = mysql_num_rows($sinch);
	$now = date("Y-m-d H:i:s");
	if($sinch1 == 0) {
		$sinch2 = mysql_query("insert into cbt_sinc (XServerId, XData1, XData2, XData3, XData4, XData5, XData6, XData7, XData8, XData9, XData10, XData11, XData12, XTanggal) 
				values ('$serverid','0','0','0','0','0','0','0','0','0','0','0','0','$now')");
			
	}
	$sinc = mysql_fetch_array($sinch);
	$data1 = $sinc['XData1'];
	$data2 = $sinc['XData2'];
	$data3 = $sinc['XData3'];
	$data4 = $sinc['XData4'];
	$data5 = $sinc['XData5'];
	$data6 = $sinc['XData6'];
	$data7 = $sinc['XData7'];
	$data8 = $sinc['XData8'];
	$data9 = $sinc['XData9'];
	$data10 = $sinc['XData10'];
	$data11 = $sinc['XData11'];
	$data12	= $sinc['XData12'];
}
else {
	$data1 = 0;		$data2 = 0;
	$data3 = 0;		$data4 = 0;
	$data5 = 0;		$data6 = 0;
	$data7 = 0;		$data8 = 0;
	$data9 = 0;		$data10 = 0;
	$data11 = 0;	$data12 = 0;	
}
?>
<style>
.an ul {	list-style-type: none;	margin: 0;	padding: 0;	overflow: hidden; }
.an li {	float: left;	width:50%; list-style:none; }
</style>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
    	<?php include "../../config/server_pusat.php";
		$sync = mysql_query("select * from cbt_sinc where XServerId='$serverid'");
		if ($sync == TRUE){
		$syn0 = mysql_fetch_array($sync);
		$syn1=$syn0['XData1'];
		$syn2=$syn0['XData2'];
		$syn3=$syn0['XData3'];
		$syn4=$syn0['XData4'];
		$syn5=$syn0['XData5'];
		$syn6=$syn0['XData6'];
		$syn7=$syn0['XData7'];
		$syn8=$syn0['XData8'];
		$syn9=$syn0['XData9'];
		}else{
		$syn1=0;
		$syn2=0;
		$syn3=0;
		$syn4=0;
		$syn5=0;
		$syn6=0;
		$syn7=0;
		$syn8=0;
		$syn9=0;
		}
	?>
		<div class="card-body">
			<a href="#" data-toggle="modal" data-target="#myInfoz" class="btn btn-primary">Refresh</a>
			<?php 	
				if ($syn9==0 and $syn8==0 and $syn7==0 and $syn6==0 and $syn5==0 and $syn4==0 and $syn3==0 and $syn2==0 and $syn1==0){
					echo "<button id='custId' data-toggle='modal' data-id='' data-target='#myTam' class='btn btn-danger'>START SYNC</button>";
				} else {?>
					<input name="upload" type="submit" value="SYNC SELESAI" <?= $kata; ?> class="btn btn-danger">

			<?php }?>
		<br>
		<br><h4>Sync progress status</h4>

		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 1 : Data Siswa</li><li style="text-align:right; display:none" id="statusdata">Selesai</li></ul></div>
		<br>
		<div id="progress" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="information1" style="width"></div>


		<hr style="width:75%; text-align:left; margin-left:0px; padding:0px">
		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 2 : Data Kelas</li><li style="text-align:right; display:none" id="statusdata2">Selesai</li></ul></div>
		<br>
		<div id="progress2" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="information2" style="width"></div>

		<hr style="width:75%; text-align:left; margin-left:0px; padding:0px">
		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 3 : Paket Soal</li><li style="text-align:right; display:none" id="statusdata3">Selesai</li></ul></div>
		<br>
		<div id="progress3" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="information3" style="width"></div>

		<hr style="width:75%; text-align:left; margin-left:0px; padding:0px">
		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 4 : Data Soal</li><li style="text-align:right; display:none" id="statusdata4">Selesai</li></ul></div>
		<br>
		<div id="progress4" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="information4" style="width"></div>

		<hr style="width:75%; text-align:left; margin-left:0px">
		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 5 : Data Mapel</li><li style="text-align:right; display:none" id="statusdata5">Selesai</li></ul></div>
		<br>
		<div id="progress5" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="information5" style="width"></div>


		<hr style="width:75%; text-align:left; margin-left:0px">
		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 6 : Data Gambar</li><li style="text-align:right; display:none" id="statusdataG">Selesai</li></ul></div>
		<br>
		<div id="progressG" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="informationG" style="width"></div>


		<hr style="width:75%; text-align:left; margin-left:0px">
		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 7 : Data Audio</li><li style="text-align:right; display:none" id="statusdataA">Selesai</li></ul></div>
		<br>
		<div id="progressA" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="informationA" style="width"></div>



		<hr style="width:75%; text-align:left; margin-left:0px">
		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 8 : Data Video</li><li style="text-align:right; display:none" id="statusdataV">Selesai</li></ul></div>
		<br>
		<div id="progressV" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="informationV" style="width"></div>

		<hr style="width:75%; text-align:left; margin-left:0px">
		<div style="margin-top:10px;width:77%;"><ul class="an"><li style="margin-left:-40px;">DATA 9 : Data PDF</li><li style="text-align:right; display:none" id="statusdataP">Selesai</li></ul></div>
		<br>
		<div id="progressP" style="width:75%; border:1px solid #ccc; padding:5px; margin-top:10px; height:33px"></div>
		<div id="informationP" style="width"></div>
		<hr style="width:75%; text-align:left; margin-left:0px">

		<?php

		if($_REQUEST['modul'] == 'sinkronsatu') {
			if(isset($_REQUEST['data_siswa'])) {
				if($data1==0) {

					include "../../config/server.php";
					$sql = mysql_query("truncate table cbt_siswa");
					$i = 1;

					include "../../config/server_pusat.php";
					$sqlcek = mysql_query("select * from cbt_siswa where XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
					$baris = mysql_num_rows($sqlcek);

					if(mysql_query("select * from cbt_zona LIMIT 1") == true) {

						while($r= mysql_fetch_array($sqlcek)) {
							include "../../config/server.php";

							$sql = mysql_query("insert into cbt_siswa 
								(XNomerUjian,XNIK,XKodeJurusan,XNamaSiswa,XKodeKelas,XKodeLevel,XJenisKelamin,XPassword,XFoto,XAgama,XSetId,XSesi,XRuang,XKodeSekolah,XPilihan,XNamaKelas) values 			
								('$r[XNomerUjian]','$r[XNIK]','$r[XKodeJurusan]','$r[XNamaSiswa]','$r[XKodeKelas]',			
								'$r[XKodeLevel]','$r[XJenisKelamin]','$r[XPassword]','$r[XFoto]',
								'$r[XAgama]','$r[XSetId]','$r[XSesi]','$r[XRuang]','$r[XKodeSekolah]','$r[XPilihan]','$r[XNamaKelas]')");

							$percent = intval($i/$baris * 100)."%";

							echo '<script language="javascript">
							document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
						    document.getElementById("information1").innerHTML="  Download Berkas Daftar Siswa <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> ... '.$percent.'  Completed.";			
							</script>';

							echo str_repeat(' ', 1024*64);
							flush();
							$i++;
						}
					} else {
						while($r = mysql_fetch_array($sqlcek)) {
							include "../../config/server.php";
							$sql = mysql_query("insert into cbt_siswa 
								(XNomerUjian,XNIK,XKodeJurusan,XNamaSiswa,XKodeKelas,XKodeLevel,XJenisKelamin,XPassword,XFoto,XAgama,XSetId,XSesi,XRuang,XKodeSekolah,XPilihan) values 			
								('$r[XNomerUjian]','$r[XNIK]','$r[XKodeJurusan]','$r[XNamaSiswa]','$r[XKodeKelas]',			
								'$r[XKodeLevel]','$r[XJenisKelamin]','$r[XPassword]','$r[XFoto]',
								'$r[XAgama]','$r[XSetId]','$r[XSesi]','$r[XRuang]','$r[XKodeSekolah]','$r[XPilihan]')");
							$percent = intval($i/$baris * 100)."%";
							echo '<script language="javascript">
								document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
							    document.getElementById("information1").innerHTML="  Download Berkas Daftar Siswa <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> ... '.$percent.'  Completed.";			
								</script>';
							echo str_repeat(' ',1024*64);
							flush();
							$i++;
						}
					}
					include "../../config/server_pusat.php";
					$now1=date("Y-m-d H:i:s");
					if($sinch == true) {
						$sin1 = mysql_query("update cbt_sinc set XData1='1', XTanggal='$now1' where XServerId='$serverid'");
						$sina = mysql_query("update server_sekolah SET XStatusSinc='1' where XServerId='$serverid'");
					}
				}
			}

			if(isset($_REQUEST['data_kelas'])) {
				if($data2 == 0) {
					include "../../config/server.php";
					$sql = mysql_query("truncate table cbt_kelas");
					$i = 1;

					include "../../config/server_pusat.php";
					$sqlcek = mysql_query("select * from cbt_kelas where XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
					$baris = mysql_num_rows($sqlcek);

					while($r=mysql_fetch_array($sqlcek)) {
						include "../../config/server.php";

						$sql = mysql_query("insert into cbt_kelas 
							(XKodeLevel,XNamaKelas,XKodeJurusan,XKodeKelas,XStatusKelas,XKodeSekolah) values 			
							('$r[XKodeLevel]','$r[XNamaKelas]','$r[XKodeJurusan]','$r[XKodeKelas]','$r[XStatusKelas]','$r[XKodeSekolah]')");
						$percent = intval($i/$baris * 100)."%";
						echo '<script language="javascript">
						document.getElementById("progress2").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
					    document.getElementById("information2").innerHTML="  Download Berkas Kelas <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> ... '.$percent.'  Completed.";			
						</script>';
						echo str_repeat(' ',1024*64);
						flush();
						$i++;
					}
					include "../../config/server_pusat.php";
					$now2 = date("Y-m-d H:i:s");

					if($sinch == true) {
						$sin2 = mysql_query("update cbt_sinc set XData2='1', XTanggal='$now2' where XServerId='$serverid'");
						$sinb = mysql_query("update server_sekolah set XStatusSinc='1' where XServerId='$serverid'");
					}
				}
			}

			if(isset($_REQUEST['paket_soal'])) {
				if($data3==0) {
					include "../../config/server.php";
					$sql = mysql_query("truncate table cbt_paketsoal");
					$i = 1;

					include "../../config/server_pusat.php";
					$sqlcek = mysql_query("select * from cbt_paketsoal where XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
					$baris = mysql_num_rows($sqlcek);

					if(mysql_query("select * from cbt_sinc LIMIT 1") == true) {
						while($r=mysql_fetch_array($sqlcek)) {
							include "../../config/server.php";
							$sql = mysql_query("insert into cbt_paketsoal 
							(XKodeKelas,XLevel,XKodeJurusan,XKodeMapel,XKodeLevel,
							XSesi,XJenisSoal,XPilGanda,XEsai,XPersenPil,
							XPersenEsai,XKodeSoal,XJumPilihan,XJumSoal,JumUjian,
							XAcakSoal,XGuru,XSetId,XSemua,XStatusSoal,XTglBuat,XKodeSekolah,XPaketSoal
							) values 			
							('$r[XKodeKelas]','$r[XLevel]','$r[XKodeJurusan]','$r[XKodeMapel]','$r[XKodeLevel]',
							'$r[XSesi]','$r[XJenisSoal]','$r[XPilGanda]','$r[XEsai]','$r[XPersenPil]',
							'$r[XPersenEsai]','$r[XKodeSoal]','$r[XJumPilihan]','$r[XJumSoal]','$r[JumUjian]',
							'$r[XAcakSoal]','$r[XGuru]','$r[XSetId]','$r[XSemua]','$r[XStatusSoal]','$r[XTglBuat]','$r[XKodeSekolah]','$r[XPaketSoal]')");

							$percent = intval($i/$baris * 100)."%";

							echo '<script language="javascript">
							document.getElementById("progress3").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
						    document.getElementById("information3").innerHTML="  Download Berkas Paket Soal <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> ... '.$percent.'  Completed.";			
							</script>';

							echo str_repeat(' ',1024*64);

							flush();
							$i++;
						}
					}
					else {
						while($r=mysql_fetch_array($sqlcek)) {
							include "../../config/server.php";

							$sql = mysql_query("insert into cbt_paketsoal 
								(XKodeKelas,XLevel,XKodeJurusan,XKodeMapel,XKodeLevel,
								XSesi,XJenisSoal,XPilGanda,XEsai,XPersenPil,
								XPersenEsai,XKodeSoal,XJumPilihan,XJumSoal,JumUjian,
								XAcakSoal,XGuru,XSetId,XStatusSoal,XTglBuat,XKodeSekolah,XPaketSoal
								) values 			
								('$r[XKodeKelas]','$r[XLevel]','$r[XKodeJurusan]','$r[XKodeMapel]','$r[XKodeLevel]',
								'$r[XSesi]','$r[XJenisSoal]','$r[XPilGanda]','$r[XEsai]','$r[XPersenPil]',
								'$r[XPersenEsai]','$r[XKodeSoal]','$r[XJumPilihan]','$r[XJumSoal]','$r[JumUjian]',
								'$r[XAcakSoal]','$r[XGuru]','$r[XSetId]','$r[XStatusSoal]','$r[XTglBuat]','$r[XKodeSekolah]','$r[XPaketSoal]')");

							$percent = intval($i/$baris * 100)."%";
							echo '<script language="javascript">
								document.getElementById("progress3").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
							    document.getElementById("information3").innerHTML="  Download Berkas Paket Soal <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> ... '.$percent.'  Completed.";			
								</script>';

							echo str_repeat(' ',1024*64);
							flush();
							$i++;
						}
					}
					include "../../config/server_pusat.php";
					$now3 = date("Y-m-d H:i:s");
					if($sinch = true) {
						$sin3 = mysql_query("update cbt_sinc set XData3 = '1', XTanggal='$now3' where XServerId='$serverid'");
						$sinc = mysql_query("update server_sekolah set XStatusSinc='1' where XServerId='$serverid'");
					}
				}
			}

			if(isset($_REQUEST['data_soal'])) {
				if($data4 ==0) {
					include "../../config/server.php";
					$sql = mysql_query("truncate table cbt_soal");
					$i = 1;

					include "../../config/server_pusat.php";
					$sqlcek = mysql_query("select * from cbt_soal order by Urut");
					$baris = mysql_num_rows($sqlcek);

					while($r=mysql_fetch_array($sqlcek)) {
						include "../../config/server.php";

						$hasil= mysql_query("INSERT INTO cbt_soal (XNomerSoal, XKodeMapel, XKodeSoal, XTanya, XJawab1, XGambarJawab1, XJawab2,XGambarJawab2, 
							 XJawab3,XGambarJawab3, XJawab4,XGambarJawab4, XJawab5,XGambarJawab5, XAudioTanya, XVideoTanya, XGambarTanya, XKunciJawaban,XJenisSoal,XAcakSoal,
							 XAcakOpsi,XKategori,XAgama) 
							 VALUES ('$r[XNomerSoal]','$r[XKodeMapel]','$r[XKodeSoal]','$r[XTanya]','$r[XJawab1]','$r[XGambarJawab1]','$r[XJawab2]','$r[XGambarJawab2]',
							'$r[XJawab3]','$r[XGambarJawab3]','$r[XJawab4]','$r[XGambarJawab4]','$r[XJawab5]','$r[XGambarJawab5]','$r[XAudioTanya]',
							 '$r[XVideoTanya]','$r[XGambarTanya]','$r[XKunciJawaban]','$r[XJenisSoal]','$r[XAcakSoal]','$r[XAcakOpsi]','$r[XKategori]','$r[XAgama]')");

						$percent = intval($i/$baris * 100)."%";

						echo '<script language="javascript">
							document.getElementById("progress4").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
						    document.getElementById("information4").innerHTML="  Download Berkas Soal <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> ... '.$percent.'  completed.";			
							</script>';

						echo str_repeat(' ',1024*64);

						flush();

						$i++;
					}
					include "../../config/server_pusat.php";
					$now4 = date("Y-m-d H:i:s");
					if($sinch == true) {
						$sin4 = mysql_query("update cbt_sinc set XData4='1', XTanggal='$now4' where XServerId='$serverid'");
						$sind = mysql_query("update server_sekolah set XStatusSinc='1' where XServerId='$serverid'");
					}
				}
			}

			if(isset($_REQUEST['data_mapel'])) {
				if($data5==0) {
					include "../../config/server.php";
					$sql = mysql_query("truncate table cbt_mapel");
					$i = 1;

					include "../../config/server_pusat.php";
					$sqlcek = mysql_query("select * from cbt_mapel where XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
					$baris = mysql_num_rows($sqlcek);

					while($r=mysql_fetch_array($sqlcek)) {
						include "../../config/server.php";
						$query =  mysql_query("INSERT INTO cbt_mapel ( 
							XKodeMapel, XNamaMapel,XPersenUH,XPersenUTS,XPersenUAS,XKKM,XMapelAgama,XKodeSekolah) VALUES ('$r[XKodeMapel]', '$r[XNamaMapel]', '$r[XPersenUH]', '$r[XPersenUTS]', '$r[XPersenUAS]', '$r[XKKM]','$r[XMapelAgama]','$r[XKodeSekolah]')");

						$percent = intval($i/$baris *100).'%';

						echo '<script language="javascript">
							document.getElementById("progress5").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
						    document.getElementById("information5").innerHTML="  Download Berkas Mata Pelajaran <b>'.$i.'</b> row(s) of <b>'. $baris.'</b> ... '.$percent.'  completed.";			
							</script>';

						echo str_repeat(' ',1024*64);
						flush();

						$i++;
					}
					include "../../config/server_pusat.php";
					$now5=date("Y-m-d H:i:s");

					if($sinch == true ) {
						$sin5 = mysql_query("update cbt_sinc set XData5='1', XTanggal='$now5' where XServerId='$serverid'");
						$sine = mysql_query("update server_sekolah set XStatusSinc='1' where XServerId='$serverid'");
					}
				}
			}

			if(isset($_REQUEST['data_gambar'])) {
				if($data6==0) {
					include "../../config/server.php";

					$i = 1;
					$pust = mysql_query("select * from server_pusat");
					$psat = mysql_fetch_array($pust);
					$PCSERVER = $psat['XIPSekolah'];
					
					include "../../config/server_pusat.php";
					$sqlcek = mysql_query("select * from cbt_upload_file where XFolder='pictures'");
					$baris = mysql_num_rows($sqlcek);

					while($r=mysql_fetch_array($sqlcek)) {
						include "../../config/server.php";
						$hasil= mysql_query("insert into cbt_upload_file (Urut, XNamaFile, XFolder) 
							 value ('$r[Urut]','$r[XNamaFile]','$r[XFolder]')");

						$i++;
					}
					include "../../config/server_pusat.php";
					$sql1 = mysql_query("select * from cbt_upload_file where XFolder ='pictures' group by XNamaFile");
					$jum1 = mysql_num_rows($sql1);
					$i = 0;

					while($r=mysql_fetch_array($sql1)) {
						if(!$r['XNamaFile'] == '') {
							$filese = "$r[XNamaFile]";

							$i++;


							if($folder==''){$url = 'http://'.$PCSERVER.'/pictures/'.$filese; }else{$url = 'http://'.$PCSERVER.'/'.$folder.'/pictures/'.$filese;}

							$file = fopen('../../pictures/'.$filese,'w+');
							$curl = curl_init($url);
							curl_setopt($curl, CURLOPT_TIMEOUT, 0);

							curl_setopt_array($curl, [
								CURLOPT_URL				> $url,
								CURLOPT_RETURNTRANSFER => 1,
							    CURLOPT_FILE           => $file,
							    CURLOPT_TIMEOUT        => 50,
							    CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
							]); 

							$response = curl_exec($curl);

							if($response === false) {
								throw new \Exception('Curl error: '.curl_error($curl));
							}

							$response;
							$percent = intval($i/$jum1 * 100)."%";

							echo '<script language="javascript">
							document.getElementById("progressG").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
						    document.getElementById("informationG").innerHTML="  Download Berkas Gambar Soal <b>'.$i.'</b> row(s) of <b>'. $jum1.'</b> ... '.$percent.'  completed.";			
							</script>';
							
							echo str_repeat(' ',1024*64);
							flush();

						}
					}
					include "../../config/server_pusat.php";
					$now6=date("Y-m-d H:i:s");
					if($sinch == true) {
						$sin6 = mysql_query("update cbt_sinc set XData6='1', XTanggal='$now6' where XServerId='$serverid'");
						$sinf = mysql_query("update server_sekolah set XStatusSinc='1' where XServerId='$serverid'");
					}
				}
			}

			if(isset($_REQUEST['data_audio'])) {
				if($data7==0) {
					include "../../config/server.php";

					$ia = 1;

					include "../../config/server_pusat.php";
					$sqlceka = mysql_query("select * from cbt_upload_file where XFolder ='audio'");
					$barisa = mysql_num_rows($sqlceka);

					while($ra=mysql_fetch_array($sqlceka)){

						include "../../config/server.php";
						$hasila= mysql_query("insert into cbt_upload_file (Urut, XNamaFile, XFolder) 
							 VALUES ('$ra[Urut]','$ra[XNamaFile]','$ra[XFolder]')");

						$ia++;
					}

					include "../../config/server_pusat.php";
					$sql2 = mysql_query("select * from cbt_upload_file where XFolder ='audio' group by XNamaFile");
					$jum2 = mysql_num_rows($sql2);

					$i = 0;
					while($r=mysql_fetch_array($sql2)) {
						if(!$r['XNamaFile'] == '') {
							$filese = "$r[XNamaFile]";

							$i++;

							if($folder==''){$url = 'http://'.$PCSERVER.'/audio/'.$filese;}else{$url = 'http://'.$PCSERVER.'/'.$folder.'/audio/'.$filese; }

							$file = fopen('../../audio/'.$filese, 'w+');
							$curl = curl_init($url);
							curl_setopt($curl, CURLOPT_TIMEOUT, 0); 

							curl_setopt_array($curl, [
							    CURLOPT_URL            => $url,
							    CURLOPT_RETURNTRANSFER => 1,
							    CURLOPT_FILE           => $file,
							    CURLOPT_TIMEOUT        => 50,
							    CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
							]);

							$response = curl_exec($curl);

							if($response === false) {
								throw new \Exception('Curl error: ' . curl_error($curl));
							}

							$response;
							$percent = intval($i/$jum2 * 100)."%";

							echo '<script language="javascript">
								document.getElementById("progressA").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
							    document.getElementById("informationA").innerHTML="  Download Berkas Audio Soal <b>'.$i.'</b> row(s) of <b>'. $jum2.'</b> ... '.$percent.'  completed.";			
								</script>';
							echo str_repeat(' ',1024*64);
							flush();
						}
					}
					include "../../config/server_pusat.php";
					$now7=date("Y-m-d H:i:s");
					if($sinch == true) {
						$sin7 = mysql_query("update cbt_sinc set XData7='1', XTanggal='$now7' where XServerId='$serverid'");	
						$sing = mysql_query("update server_sekolah set XStatusSinc='1' where XServerId='$serverid'");
					}
				}
			}

			if(isset($_REQUEST['data_video'])) {
				if($data8 == 0) {
					include "../../config/server.php";

					$iv = 1;

					include "../../config/server_pusat.php";
					$sqlcekv = mysql_query("select * from cbt_upload_file where XFolder ='video'");
					$barisv = mysql_num_rows($sqlcekv);

					while($rv=mysql_fetch_array($sqlcekv)) {
						include "../../config/server.php";

						$hasilv= mysql_query("insert into cbt_upload_file (Urut, XNamaFile, XFolder) 
							 values ('$rv[Urut]','$rv[XNamaFile]','$rv[XFolder]')");

						$iv++;
					}

					$sql3 = mysql_query("select * from cbt_upload_file where XFolder ='video' group by XNamaFile");
					$jum3 = mysql_num_rows($sql3);
					$i = 0;
					while($r=mysql_fetch_array($sql3)) {
						if(!$r['XNamaFile'] == '') {
							$filese = "$r[XNamaFile]";		
							$i++;

							if ($folder==""){$url = 'http://'.$PCSERVER.'/video/'.$filese; }else{$url = 'http://'.$PCSERVER.'/'.$folder.'/video/'.$filese; }

							$file = fopen('../../video/'.$filese, 'w+');
							$curl = curl_init($url);
							curl_setopt($curl, CURLOPT_TIMEOUT, 0);
							curl_setopt_array($curl, [
								CURLOPT_URL 			=> $url,
								CURLOPT_RETURNTRANSFER	=> 1,
								CURLOPT_FILE			=> $file,
								CURLOPT_TIMEOUT			=> 50,
								CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
							]);

							$response = curl_exec($curl);

							if($response === false) {
								throw new \Exception('Curl error: ' . curl_error($curl));
							}

							$response;
							$percent = intval($i/$jum3 * 100)."%";

							echo '<script language="javascript">
								document.getElementById("progressV").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
							    document.getElementById("informationV").innerHTML="  Download Berkas Video Soal <b>'.$i.'</b> row(s) of <b>'. $jum3.'</b> ... '.$percent.'  completed.";			
								</script>';

							echo str_repeat(' ',1024*64);
							flush();
						}
					}

					include "../../config/server_pusat.php";
					$now8=date("Y-m-d H:i:s");

					if($sinch == true) {
						$sinh = mysql_query("update cbt_sinc SET XData8='1', XTanggal='$now8' where XServerId='$serverid'");
						$sinc = mysql_query("update server_sekolah SET XStatusSinc='1' where XServerId='$serverid'");
					}
				}
			}

			include "../../config/server_pusat.php";
			if(mysql_query("select * from cbt_sinc LIMIT 1")== TRUE) {
				if(isset($_REQUEST['data_pdf'])) {
					if($data9==0) {
						include "../../config/server.php";

						$ip = 1;

						include "../../config/server_pusat.php";

						$sqlcekp = mysql_query("select * from cbt_upload_file where XFolder ='file-pdf'");
						$barisp = mysql_num_rows($sqlcekp);
						if ($sqlcekp>0){
							while($rp =mysql_fetch_array($sqlcekp)) {
								include "../../config/server.php";

								$hasil= mysql_query("insert into cbt_upload_file (Urut, XNamaFile, XFolder) 
							 	value ('$rp[Urut]','$rp[XNamaFile]','$rp[XFolder]')");

							 	$ip++;
							}

							$sql4 = mysql_query("select * from cbt_upload_file where XFolder = 'file-pdf' group by XNamaFile");
							$jum4 = mysql_num_rows($sql4);
							$i = 0;

							while($r=mysql_fetch_array($sql4)) {
								if(!$r['XNamaFile'] == '') {
									$filese = "$r[XNamaFile]";

									$i++;

									if ($folder==""){$url = 'http://'.$PCSERVER.'/file-pdf/'.$filese; }else{$url = 'http://'.$PCSERVER.'/'.$folder.'/file-pdf/'.$filese; }

									$file = fopen('../../file-pdf/'.$filese, 'w+');
									$curl = curl_init($url);
									curl_setopt($curl, CURLOPT_TIMEOUT, 0); 

									curl_setopt_array($curl, [
									    CURLOPT_URL            => $url,
									    CURLOPT_RETURNTRANSFER => 1,
									    CURLOPT_FILE           => $file,
									    CURLOPT_TIMEOUT        => 50,
									    CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
									]);

									$response = curl_exec($curl);

									if($response === false) {
									    throw new \Exception('Curl error: ' . curl_error($curl));
									}

									$response;
									$percent = intval($i/$jum4 * 100)."%";

									echo '<script language="javascript">
										document.getElementById("progressP").innerHTML="<div style=\"width:'.$percent.';background-image:url(../../images/bar/pbar-ani1.gif);\">&nbsp;</div>";
									    document.getElementById("informationP").innerHTML="  Download Berkas PDF Soal <b>'.$i.'</b> row(s) of <b>'. $jum4.'</b> ... '.$percent.'  completed.";			
										</script>'; 

									echo str_repeat(' ',1024*64);
									flush();
								}
							}
						}
						include "../../config/server_pusat.php";
						$now9 = date("Y-m-d H:i:s");

						if($sinch == true) {
							$sinh9 = mysql_query("update cbt_sinc set XData9='1', XTanggal='$now9' where XServerId='$serverid'");
							$sinc9 = mysql_query("update server_sekolah set XStatusSinc='2' where XServerId='$serverid'");

						}
					}
				}
			}

		}

		include "../../config/server_pusat.php";
		//DATA 1
		$sqlsw = mysql_query("select * from cbt_siswa WHERE XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
		$jumsw = mysql_num_rows($sqlsw);
		//DATA 2
		$sqlk = mysql_query("select * from cbt_kelas WHERE XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
		$jumk = mysql_num_rows($sqlk);
		//DATA 3
		$sqlp = mysql_query("select * from cbt_paketsoal WHERE XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
		$jump = mysql_num_rows($sqlp);
		//DATA 4
		$sqls = mysql_query("select * from cbt_soal");
		$jums = mysql_num_rows($sqls);
		//DATA 5
		$sqlm = mysql_query("select * from cbt_mapel WHERE XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
		$jumm = mysql_num_rows($sqlm);
		//DATA 6
		$sql1 = mysql_query("select * from cbt_upload_file where XFolder ='pictures' group by XNamaFile");
		$jum1 = mysql_num_rows($sql1);
		//DATA 7
		$sql2 = mysql_query("select * from cbt_upload_file where XFolder ='audio' group by XNamaFile");
		$jum2 = mysql_num_rows($sql2);
		//DATA 8
		$sql3 = mysql_query("select * from cbt_upload_file where XFolder ='video' group by XNamaFile");
		$jum3 = mysql_num_rows($sql3);
		//DATA 9
		$sql4 = mysql_query("select * from cbt_upload_file where XFolder ='file-pdf' group by XNamaFile");
		$jum4 = mysql_num_rows($sql4);

		include "../../config/server.php";
		//DATA 1
		$sqlsw_ = mysql_query("select * from cbt_siswa WHERE XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
		$jumsw_ = mysql_num_rows($sqlsw_);
		//DATA 2
		$sqlk_ = mysql_query("select * from cbt_kelas WHERE XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
		$jumk_ = mysql_num_rows($sqlk_);
		//DATA 3
		$sqlp_ = mysql_query("select * from cbt_paketsoal WHERE XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
		$jump_ = mysql_num_rows($sqlp_);
		//DATA 4
		$sqls_ = mysql_query("select * from cbt_soal");
		$jums_ = mysql_num_rows($sqls_);
		//DATA 5
		$sqlm_ = mysql_query("select * from cbt_mapel WHERE XKodeSekolah='$serverid' or XKodeSekolah='ALL'");
		$jumm_ = mysql_num_rows($sqlm_);
		//DATA 6
		$sql1_ = mysql_query("select * from cbt_upload_file where XFolder ='pictures' group by XNamaFile");
		$jum1_ = mysql_num_rows($sql1_);
		//DATA 7
		$sql2_ = mysql_query("select * from cbt_upload_file where XFolder ='audio' group by XNamaFile");
		$jum2_ = mysql_num_rows($sql2_);
		//DATA 8
		$sql3_ = mysql_query("select * from cbt_upload_file where XFolder ='video' group by XNamaFile");
		$jum3_ = mysql_num_rows($sql3_);
		//DATA 9
		$sql4_ = mysql_query("select * from cbt_upload_file where XFolder ='file-pdf' group by XNamaFile");
		$jum4_ = mysql_num_rows($sql4_);
?>
		</div>
		
     </div>
  </div>
 </div>


 <!-- Modal Tambah Data -->
<div class="modal fade" id="myTam" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" action="?modul=sinkronsatu" method="post" >
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sinkon data</h5>
        </div>
        <div class="modal-body">
        	<div class="row">
        		<div class="col-md-6">
					<div class="form-group">
		        		<input type="checkbox" value="1" checked="checked" name="data_siswa"> <label>Data 1 : Data Siswa</label>
		        	</div>
        		</div>
        		<div class="col-md-6">
					<div class="form-group">
						<input type="checkbox" value="1" checked="checked" name="data_gambar"> <label>Data 6 : Data Gambar</label>
		        	</div>
        		</div>
        		<div class="col-md-6">
					<div class="form-group">
		        		<input type="checkbox" value="1" checked="checked" name="data_kelas"> <label>Data 2 : Data Kelas</label>
		        	</div>
        		</div>
        		<div class="col-md-6">
					<div class="form-group">
						<input type="checkbox" value="1" checked="checked" name="data_audio"> <label>Data 7 : Data Audio</label>
		        	</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						<input type="checkbox" value="1" checked="checked" name="paket_soal"> <label>Data 3 : Paket Soal</label>
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						<input type="checkbox" value="1" checked="checked" name="data_video"> <label>Data 8 : Data Video</label>
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						<input type="checkbox" value="1" checked="checked" name="data_soal"> <label>Data 4 : Data Soal</label>
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						<input type="checkbox" value="1" checked="checked" name="data_pdf"> <label>Data 9 : Data PDF</label>
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						<input type="checkbox" value="1" checked="checked" name="data_mapel"> <label>Data 5 : Data Mapel</label>
        			</div>
        		</div>
        	</div>
        	
        </div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        	<input type="submit" name="upload" value="START SYNC" class="btn btn-danger">
        </div>	
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="myInfoz" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Data hasil sinkron</h5>
        </div>
        <div class="modal-body">
			<table class="table table-bordered">
				<tr>
	                <th>DATA 1 : Siswa</th>
					<th><?php echo $jumsw; ?></th>
					<th><?php echo $jumsw_?> </th>
                </tr>
				<tr>
	                <th>DATA 2 : Kelas</th>
					<th><?php echo $jumk; ?></th>
					<th><?php echo $jumk_?> </th>
                </tr>
				<tr>
	                <th>DATA 3 : Paket Soal</th>
					<th><?php echo $jump; ?></th>
					<th><?php echo $jump_?> </th>
                </tr>
				<tr>
	                <th>DATA 4 : Soal</th>
					<th><?php echo $jums; ?></th>
					<th><?php echo $jums_; ?></th>
                </tr>
				<tr>
	                <th>DATA 5 : Mapel</th>
					<th><?php echo $jumm_; ?></th>
					<th><?php echo $jumm; ?></th>
                </tr>
				<tr>
	                <th>DATA 6 : Gambar</th>
					<th><?php echo $jum1;?></th>
					<th><?php echo $jum1_;?></th>
                </tr>
				<tr>
	                <th>DATA 7 : Audio</th>
					<th><?php echo $jum2;?></th>
					<th><?php echo $jum2_;?></th>
                </tr>
				<tr>
	                <th>DATA 8 : Video</th>
					<th><?php echo $jum3;?> </th>
					<th><?php echo $jum3_;?> </th>
                </tr>
				<tr>
	                <th>DATA 9 : PDF</th>
					<th><?php echo $jum4;?> </th>
					<th><?php echo $jum4_;?> </th>
                </tr>
			</table>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        </div>
    </div>
  </form>
</div>