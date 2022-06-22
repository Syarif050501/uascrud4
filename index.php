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
			$edit = mysqli_query($koneksi, "UPDATE tapotek set
											 	kodeobat = '$_POST[tkodeobat]',
											 	namaobat = '$_POST[tnamaobat]',
												jenisobat = '$_POST[tjenisobat]',
											 	kategori = '$_POST[tkategori]',
												harga = '$_POST[tharga]',
												jumlah = '$_POST[tjumlah]'
											 WHERE id_mhs = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tapotek (kodeobat, namaobat, jenisobat, kategori, harga, jumlah)
										  VALUES ('$_POST[tkodeobat]', 
										  		 '$_POST[tnamaobat]', 
										  		 '$_POST[tjenisobat]', 
										  		 '$_POST[tkategori]',
												   '$_POST[tharga]',
												   '$_POST[tjumlah]')
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM tapotek WHERE id_mhs = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vkodeobat = $data['kodeobat'];
				$vnamaobat = $data['namaobat'];
				$vjenisobat = $data['jenisobat'];
				$vkategori = $data['kategori'];
				$vharga = $data['harga'];
				$vjumlah = $data['jumlah'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tapotek WHERE id_mhs = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

?>
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
	   <H3> FORMULIR DATA OBAT</H3>
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Kode Obat</label>
	    		<input type="text" name="tkodeobat" value="<?=@$vkodeobat?>" class="form-control" placeholder="Input kodeobat di sini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama Obat</label>
	    		<input type="text" name="tnamaobat" value="<?=@$vnamaobat?>" class="form-control" placeholder="Input Nama Obat disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Jenis Obat</label>
	    		<select class="form-control" name="tjenisobat">
	    			<option value="<?=@$vjenisobat?>"><?=@$vjenisobat?></option>
	    			<option value="obatluar">Obat Luar</option>
	    			<option value="Obat Dalam">Obat Dalam</option>
	    		</select>
	    	</div>
	    	<div class="form-group">
	    		<label>Kategori</label>
	    		<select class="form-control" name="tkategori">
	    			<option value="<?=@$vkategori?>"><?=@$vkategori?></option>
	    			<option value="obatKeras">Obat Keras</option>
	    			<option value="obatringan">Obat Ringan</option>
	    		</select>
	    	</div>
			<div class="form-group">
	    		<label>Harga</label>
	    		<input type="text" name="tharga" value="<?=@$vharga?>" class="form-control" placeholder="Input Harga Obat disini!" required>
	    	</div>
			<div class="form-group">
	    		<label>jumlah</label>
	    		<input type="text" name="tjumlah" value="<?=@$vjumlah?>" class="form-control" placeholder="Input Jenis Obat disini!" required>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
			
			
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	  <a href="semua.php" class="btn btn-success">LIHAT HASIL DATA</a>
	</div>
	<!-- Akhir Card Form -->

	

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>