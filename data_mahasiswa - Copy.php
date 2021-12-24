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
				<h3 class="panel-title">Data Mahasiswa Lulus</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="data_mahasiswa.php?view=tambah">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>NPM</th>
						<th>Nama Mahasiswa</th>
						<th>Program Studi</th>
						<th>Tanggal Lulus</th>
						<th>Nomor Ijazah</th>
						<th>IPK</th>
						<th>Ijazah</th>
					</tr>
					<?php
					$sql=mysqli_query($konek, "SELECT * FROM mahasiswa ORDER BY id ASC");
					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td>$d[npm]</td>
							<td>$d[nama_mhs]</td>
							<td>$d[prodi]</td>
							<td>$d[tgl_lulus]</td>
							<td>$d[no_ijazah]</td>
							<td>$d[ipk]</td>
							<td width='180px' align='center'>
								<a class='btn btn-danger btn-sm' href='buatQRCode.php?npm=$d[npm]&nomor=$d[no_ijazah]'>Buat Kode QR</a>
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
				<h3 class="panel-title">Tambah Data Mahasiswa Lulus</h3>
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
							<td>Nama Mahasiswa</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="nama" required /></div></td>
						</tr>
						<tr>
							<td>Program Studi</td>
							<td>
								<div class="col-md-6">
									<select name="prodi" class="form-control">
									<option value="Teknik Informatika">Teknik Informatika</option>
									<option value="Sistem Informasi">Sistem Informasi</option>
									<option value="Teknik Komputer">Teknik Komputer</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Tanggal Lulus</td>
							<td><div class="col-md-4"><input class="form-control" type="date" name="tgllulus" required /></div></td>
						</tr>
						<tr>
							<td>No. Ijazah</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="noijazah" required /></div></td>
						</tr>
						<tr>
							<td>IPK</td>
							<td><div class="col-md-2"><input class="form-control" type="number" step="0.01" name="ipk" required /></div></td>
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