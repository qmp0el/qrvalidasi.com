<?php include "header.php"; ?>

<div class="container">

<?php
$view = isset($_GET['view']) ? $_GET['view'] : null;

switch($view){
	default:
	?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Data Peserta</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="data_mahasiswa.php?view=tambah">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>NPM</th>
						<th>Nama</th>
						<th>Nomor Reg</th>
						<th>Tanggal Reg</th>
						<th>Program Studi</th>
						<th>Course</th>
						<th>Lembaga</th>
						<th>Listening</th>						
						<th>Structure</th>
						<th>reading</th>
						<th>score</th>
						<th>keterangan</th>
						<th>Action</th>
					</tr>
					<?php
					$sql=mysqli_query($konek, "SELECT * FROM mahasiswa ORDER BY id ASC");
					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td>$d[npm]</td>
							<td>$d[nama_pes]</td>
							<td>$d[no_reg]</td>
							<td>$d[tgl_reg]</td>
							<td>$d[prodi]</td>
							<td>$d[course]</td>
							<td>$d[lembaga]</td>
							<td>$d[listening]</td>
							<td>$d[structure]</td>
							<td>$d[reading]</td>
							<td>$d[score]</td>
							<td>$d[ket]</td>
							<td width='180px' align='center'>
								<a class='btn btn-danger btn-sm' href='buatQRCode.php?npm=$d[npm]&nomor=$d[no_reg]'>Buat Kode QR</a>
								<a class='btn btn-success btn-sm' href='cetak_ijazah.php?id=$d[id]' target='_blank'>Cetak</a>
							</td>
						</tr>";
						$no++;
					}
					?>
				</table>
			</div>
		</div>
	</div>

<?php
	break;
	case "tambah":

?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data Peserta</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="aksi_mahasiswa.php?act=insert">
					<table class="table">
						<tr>
							<td width="160">NPM</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="text" name="npm" required /></div>
							</td>
						</tr>
						<tr>
							<td>Nama Peserta</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="nama" required /></div></td>
						</tr>
						<tr>
							<td>Program Studi</td>
							<td>
								<div class="col-md-6">
									<select name="prodi" class="form-control">
									<option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
									<option value="Hubungan Internasional">Hubungan Internasional</option>
									<option value="Ilmu Politik">Ilmu Politik</option>
									<option value="Sosiologi">Sosiologi</option>
									<option value="Administrasi Publik">Administrasi Publik</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Course</td>
							<td>
								<div class="col-md-6">
									<select name="course" class="form-control">
									<option value="LPIA-EPT (TOEFL® PREDICTION TEST)">LPIA-EPT (TOEFL® PREDICTION TEST)</option>
									<option value="LPIA-CPT (TOEIC® PREDICTION TEST)">LPIA-CPT (TOEIC® PREDICTION TEST)</option>
									<option value="LPIA-IPT (IELTS® PREDICTION TEST)">LPIA-IPT (IELTS® PREDICTION TEST)</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Lembaga</td>
							<td>
								<div class="col-md-6">
									<select name="lembaga" class="form-control">
									<option value="LPIA-Cikarang, Bekasi">LPIA-Cikarang, Bekasi</option>
									<option value="LPIA-RBTV Yogyakarta">LPIA-RBTV Yogyakarta</option>
									<option value="LPIA-Universitas AMIKOM Yogyakarta">LPIA-Universitas AMIKOM Yogyakarta</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Listening</td>
							<td><div class="col-md-2"><input class="form-control" type="number" name="listening" required /></div></td>
						</tr>
						<tr>
							<td>Structure</td>
							<td><div class="col-md-2"><input class="form-control" type="number" name="structure" required /></div></td>
						</tr>
						<tr>
							<td>Reading</td>
							<td><div class="col-md-2"><input class="form-control" type="number" name="reading" required /></div></td>
						</tr>
						<tr>
							<td>Score</td>
							<td><div class="col-md-2"><input class="form-control" type="number" name="score" required /></div></td>
						</tr>
						<tr>
							<td>No. Registrasi</td>
							<td><div class="col-md-4"><input class="form-control" type="text" name="noreg" required /></div></td>
						</tr>
						<tr>
							<td>Tanggal Test</td>
							<td><div class="col-md-3"><input class="form-control" type="date" name="tglreg" required /></div></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td><div class="col-md-2"><input class="form-control" type="text" name="ket" required /></div></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="data_mahasiswa.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>

<?php
	break;
}
?>

</div>

<?php include "footer.php"; ?>