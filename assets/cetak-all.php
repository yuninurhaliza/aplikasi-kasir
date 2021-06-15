<html>
	<head>

	</head>

	<body>

		<style type ='text/css'>
		table{
			margin: 30px;
			border-collapse: collapse;
			border: none;
			font-family: Calibri;
			border-top: 5px solid #000;
			width: 500px;
			box-shadow: 0px 0px 0.5px #999;
		}
		table td{
			padding: 10px;
		}

		</style>

		<?php
 		
 		include '../config/koneksi.php';

 		// Like
	 	$queryhitunglike = mysqli_query($config, "SELECT tb_artikel.idArtikel, tb_artikel.judul, tb_artikel.keterangan, count(tb_like.idArtikel) AS Total FROM tb_like INNER JOIN tb_artikel ON tb_artikel.idArtikel = tb_like.idArtikel GROUP BY judul ORDER BY Total DESC LIMIT 1");
	 	$qhl = mysqli_fetch_array($queryhitunglike);
	 		$ket1 = $qhl['keterangan'];
	 		$ket_potong1 = substr($ket1, 0, 220)."...";

	 	// Komen
	 	$queryhitungkomen = mysqli_query($config, "SELECT tb_artikel.judul, tb_artikel.keterangan, tb_komentar.idArtikel, count(tb_komentar.idArtikel) AS Total FROM tb_komentar LEFT JOIN tb_artikel ON tb_artikel.idArtikel = tb_komentar.idArtikel GROUP BY tb_komentar.idArtikel ORDER BY Total DESC LIMIT 1");
		$qhk = mysqli_fetch_array($queryhitungkomen);
	 		$ket2 = $qhk['keterangan'];
	 		$ket_potong2 = substr($ket2, 0, 190)."...";

	 	// Admin paling banyak publish artikel
	 	$queryhitungpublisher = mysqli_query($config, "SELECT tb_users.idUsers, tb_users.nama AS Penulis, tb_artikel.idArtikel, count(tb_artikel.idUsers) AS Total_Artikel FROM tb_artikel LEFT JOIN tb_users ON tb_users.idUsers = tb_artikel.idUsers GROUP BY tb_users.idUsers LIMIT 1");
	 	$qhp = mysqli_fetch_array($queryhitungpublisher);
	 	$idPublisher = $qhp['idUsers'];

	 		// Tampil Artikelnya Publisher
	 		$querytampilartikelpublisher = mysqli_query($config, "SELECT tb_users.nama AS Penulis, tb_artikel.keterangan as Deskripsi, tb_artikel.judul FROM tb_artikel LEFT JOIN tb_users ON tb_users.idUsers = tb_artikel.idUsers WHERE tb_artikel.idUsers ='".$idPublisher."' ORDER BY tb_artikel.idArtikel DESC");
	 		$qtap0 = mysqli_fetch_array($querytampilartikelpublisher);
	?>



	 		<table border =''>
	 		<tr>
	 			<td> <span class ='fak like'> Like terbanyak : <?php echo $qhl['Total']; ?></span> </td>
	 		</tr>
	 		<tr>
	 			<td> <b> Judul Artikel : </b> <?php echo $qhl['judul']; ?> </th>
	 		</tr>
	 		</table>
	 	
	 		<table border =''>
	 		<tr>
	 			<td> <span class ='fak komen'> Komentar terbanyak : <?php echo $qhk['Total']; ?> </span></td>
	 		</tr>
	 		<tr>
	 			<td> <b> Judul Artikel : </b> <?php echo $qhk['judul']; ?> </th>
	 		</tr>
	 		</table>
	 		
	 		<table border =''>
	 		<tr>
	 			<td> <span class ='fak komen'> Publisher paling update : <?php echo $qhp['Penulis']; ?> </span></td>
	 		</tr>
	 		<tr>
	 			<td> <b> Artikel yang dipublish : </b> </td>
	 		<?php
	 			$no = 1;
	 			while($qqhp = mysqli_fetch_array($querytampilartikelpublisher)){?>
	 		<tr>
	 			<td> <b> <?php echo $no++; ?>. </b> <?php echo $qqhp['judul']; ?> </th>
	 		</tr>
	 		<?php } ?>
	 		</table>


	 	<script>
	 		window.print();
	 	</script>
		</body>
</html>