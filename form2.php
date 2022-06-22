<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dblatihan";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE tapotek2 set
											 	noresep = '$_POST[tnoresep]',
											 	kodeobat = '$_POST[tkodeobat]',
												harga = '$_POST[tharga]',
											 	dosis = '$_POST[tdosis]',
												subtotal = '$_POST[tsubtotal]'
							
											 WHERE idapotek = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='semua.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='form2.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tapotek2 (noresep, kodeobat, harga, dosis, subtotal)
										  VALUES ('$_POST[tnoresep]', 
										  		 '$_POST[tkodeobat]', 
										  		 '$_POST[tharga]', 
										  		 '$_POST[tdosis]',
												   '$_POST[tsubtotal]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='semua.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='form2.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tapotek2 WHERE idapotek = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnoresep = $data['noresep'];
				$vkodeobat = $data['kodeobat'];
				$vharga = $data['harga'];
				$vdosis = $data['dosis'];
				$subtotal = $data['subtotal'];
	
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tapotek2 WHERE idapotek = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='form2.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP & MYSQL SYARIF HIDAYATULLOH 200413</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<h1 class="text-center">CRUD PHP & MYSQL </h1>
	<h2 class="text-center">SYARIF HIDAYATULLOH 200413</h2>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
	    <H3>FORMULIR DETAIL OBAT</H3>
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label> NO RESEP</label>
	    		<input type="text" name="tnoresep" value="<?=@$vnoresep?>" class="form-control" placeholder="Input no resep di sini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Kode Obat</label>
	    		<input type="text" name="tkodeobat" value="<?=@$vkodeobat?>" class="form-control" placeholder="Input kode obat disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Harga</label>
	    		<input type="text" name="tharga" value="<?=@$vharga?>" class="form-control" placeholder="Input harga obat disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Dosis</label>
	    		<input type="text" name="tdosis" value="<?=@$vdosis?>" class="form-control" placeholder="Input kode obat disini!" required>
	    	</div>
			<div class="form-group">
	    		<label>sub total</label>
	    		<input type="text" name="tsubtotal" value="<?=@$vsubtotal?>" class="form-control" placeholder="Input Harga Obat disini!" required>
	    	</div>
			

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	
	<!-- Akhir Card Form -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>