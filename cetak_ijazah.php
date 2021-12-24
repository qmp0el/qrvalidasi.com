<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ijazah</title>
	<link rel="icon" href="./assets/img/3-logo.png">
	<style type="text/css">
		img.a {
			vertical-align: text-bottom;
		}
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<table border="6" cellpadding="80" cellspacing="0" width="100%">
<tr>
	<td>
	<table width="100%">
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM mahasiswa WHERE id='$_GET[id]'");
		$d=mysqli_fetch_array($sql);
		?>
		<tr>
			<td colspan="3">
			
				<img src="assets/img/3-logo.png" width="120px"><img src="assets/img/2-logo.png" width="120px">
				<center>
				<h1><img class="a" src="assets/img/3-logo.png" width="120px">STATEMENT OF ACHIEVEMENT</h1>
				<p>(KEMENDIKBUD - NPSN : K5663209)</p>
				<hr></center>
				<p style="text-align:right;"> Serial No : <b><i><?php echo $d['no_reg']; ?></b></i></p>
				<br>
				<center>
				<p>This is to certify that</p>
				<br>
				<p>has successflly completed
				<br>the <h><b><u><?php echo $d['course']; ?></u></b></h>
				<br>dated on <h><b><?php echo tglIndonesia($d['tgl_reg']); ?></b></h></p>
				<p>coducted by <h><b><?php echo $d['lembaga']; ?></b></h></p>
				</center>
			</td>
		</tr>
		
		<tr>
			<td colspan="3">
			<pre><p style="text-align:right;"> Certified by,			</p></pre>
			<p><b>and has attained the following scores :</b></p>
			<pre>Listening Comprehension			: <b><?php echo $d['listening']; ?></b><br>Structure & Written Expressions		: <b><?php echo $d['structure']; ?></b><br>Vocabulary & Reading Comprehension	: <b><?php echo $d['reading']; ?></b>
			
			<br>Overall Score				: <b><?php echo $d['score']; ?></b></pre></p>
			</td>
		</tr>
		<tr>
			<td ><img align="center" src="temp/<?php echo $d['npm'].".png"; ?>"></td>
			
			<td width="300px">
				<p style="text-align:center;">Drs. HM. Ali Badarudin, SH., MM.<br/>
				President Director</p>
				<br/>
				<br/>
				<br/>
				
			</td>
		</tr>		
	</table><p style="text-align:center;"><b>The Statement Achievement is valid for 6 (six) months as of the above date</b></p>
	</td>
</tr>
</table>
<br>
<center><a href="#" class="no-print" onclick="window.print();">Cetak/Print</a></center>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>