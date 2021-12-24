<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hasil Validasi Ijazah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./assets/img/logo.png">
	<!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            margin-top: 3%;
            /*padding: 3%;*/
        }
        .register{
            background: #f8f9fa;
            border-radius: 25px;
            margin-top: 100px;
            margin-bottom: 100px;
            padding: 20px;
        }
        .register img{
            margin-top: 15%;
            margin-bottom: 5%;
            width: 50%;
            -webkit-animation: mover 2s infinite  alternate;
            animation: mover 1s infinite  alternate;
        }
        @-webkit-keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-body">
                    <?php
					//$sql=mysqli_query($konek, "SELECT * FROM mahasiswa WHERE 183112351640044='I-A.LPIA.30.01.22.0820001'");
                    $sql=mysqli_query($konek, "SELECT * FROM mahasiswa WHERE no_reg='$_POST[noijazah]'");
                    $d=mysqli_fetch_array($sql);

                    if(mysqli_num_rows($sql) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            <i>Silahkan menghubungi Perguruan Tinggi terkait untuk menanyakan masalah ini</i>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
					<table align="left" style="width:100%">
                        <tr><th style="width:20%" rowspan="2"></th>
                            <th><h3>Validasi Certifikate</h3></th>
					</table>
					
                    <table class="table table-bordered">
                        <tr><th style="width:20%" rowspan="10">
						<center>
						<img src="assets/img/certificate_valid.png" width="100px">
						<div class="alert alert-success" role="alert"><?php echo $d['ket']; ?></div></th>
						</center>
                            <td>Name</td>
							<th><?php echo $d['nama_pes']; ?></th>
                        </tr>
                        <tr>
                            <td>Course</td>
							<th><?php echo $d['course']; ?></th>
                        </tr>
                        <tr>
                            <td>Lembaga</td>
							<th><?php echo $d['lembaga']; ?></th>
                        </tr>
                        <tr>
                            <td>Serial Number</td>
							<th><?php echo $d['no_reg']; ?></th>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
							<th><?php echo $d['tgl_reg']; ?></th>
                        </tr>
                        <tr>
                            <td>Grade/ Score</td>
							<th><?php echo $d['score']; ?></th>
                        </tr>
                        <tr>
                            <td rowspan="3">Desc</td>
							<th> Listening Comprehension : <?php echo $d['listening']; ?></th>
                        </tr>
                        <tr>
                            <th> Structure & WrittenExpressions : <?php echo $d['structure']; ?></th>
                        </tr>
                            <th> Vocabulary & Reading Comprehension : <?php echo $d['reading']; ?></th>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="./validasi-ijazah">Kembali</a></center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>