<html>
	<head>
		<title>Searching</title>
	</head>
	
	<body>
		
		<div style="width:900px; height:100px; background-color:#F5F5DC; box-shadow:1px 1px 3px silver; margin:30px 0 0 150px">
		<form action="" method="post">
			<input style="width:400px;height:30px; border-style:groove; margin:40px 0 0 160px;" type="text" name="search" id="search" placeholder="Cari data..." />
			<input style="width:100px;height:25px; background-color:green; color:white; border-style:none;"type="submit" name="cari" id="cari" value="Cari"/>
		</form>
		</div>
		
		
			<?php
			$host = "localhost";
			$username = "root";
			$password = "";
			$db = "mahasiswa"; 
			$db_link = mysqli_connect($host,$username,$password,$db);
	
			if (!$db_link){
				echo "koneksi gagal";
				}

			if(isset($_POST["cari"]))
			{
				$no = 1; 
				$look = $_POST['search'];
				$query = mysqli_query($db_link,"select * from tabel_matakuliah where nama_matkul like '%$look%' or sks like '%$look%' order by kode_matkul desc");
				?>
				<div style="width:860px; height:auto; padding:20px 20px 20px 20px; box-shadow:1px 1px 5px black; margin:30px 0 0 150px ">
				
				Menampilkan Hasil Pencarian dari Nilai = <b><i>'<?php echo "$look";?>'</i>..</b>
				<div style="width:800px;height:auto; padding:20px 20px 20px 20px;">	
					<table>
					<tr>
						<td>No</td><td style="width=500px;">| Mata Kuliah</td><td style="width=100px;">|  Sks</td></tr>
						<hr>
					<?php
					While($data=mysqli_fetch_row($query))
					{
						echo "<tr><td>| $data[0]</td> <td>| $data[1]</td> <td>| $data[2]</td></tr>";
			
					}
					?></table></div><?php
			}
		?>
		</div>

	</body>
