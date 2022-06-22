
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
						document.location='semua.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='semua.php';
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
						document.location='semua.php';
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
						document.location='semua.php';
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
						document.location='semua.php';
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
						document.location='semua.php';
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
						document.location='semua.php';
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



	<!-- Awal Card Tabel -->
	<a href="index.php" class="btn btn-success">KEMBALI KE FORMULIR OBAT</a>
	<div class="card mt-3">
	  <div class="card-header bg-warning text-dark">
	    <h3>DAFTAR OBAT</h3>
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>Kode Obat</th>
	    		<th>Nama Obat</th>
	    		<th>Jenis Obat</th>
	    		<th>Kategori</th>
				<th>Harga</th>
				<th>Jumlah</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from tapotek order by id_mhs desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['kodeobat']?></td>
	    		<td><?=$data['namaobat']?></td>
	    		<td><?=$data['jenisobat']?></td>
	    		<td><?=$data['kategori']?></td>
				<td><?=$data['harga']?></td>
	    		<td><?=$data['jumlah']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning"> Edit </a>
	    			<a href="semua.php?hal=hapus&id=<?=$data['id_mhs']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>
	
	
	  </div>
	</div>
	<!-- Akhir Card Tabel -->
    <!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-danger text-white">
	    <h3>DETAIL OBAT</h3>
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>NO RESEP</th>
	    		<th>KODE OBAT</th>
	    		<th>HARGA</th>
	    		<th>DOSIS</th>
				<th>SUBTOTAL</th>
	    		<th>ISI DETAIL</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from tapotek2 order by idapotek desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['noresep']?></td>
	    		<td><?=$data['kodeobat']?></td>
	    		<td><?=$data['harga']?></td>
	    		<td><?=$data['dosis']?></td>
				<td><?=$data['subtotal']?></td>
	    		<td>
	    			<a href="form2.php?hal=edit&id=<?=$data['idapotek']?>" class="btn btn-warning"> ISI DETAIL OBAT </a>
	    			<a href="semua.php?hal=hapus&id=<?=$data['idapotek']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>
		
       
	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>
<script>

function startCalc(){

interval = setInterval("calc()",1);}

function calc(){

one = document.autoSumForm.$vharga.value;

two = document.autoSumForm.$vjumlah.value;

three = document.autoSumForm.$vsubtotal.value;

document.autoSumForm.total.value = (one * 1) * (two * 1) - (three * 1);}

function stopCalc(){

clearInterval(interval);}

</script>

 

</body>

</html>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>