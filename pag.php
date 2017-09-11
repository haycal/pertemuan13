<?php
	//koneksi database
	$con=mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "mahasiswa");//fungsi pagination
	
	$BatasAwal = 5;
	if (!empty($_GET['page'])) 
	{
		$hal = $_GET['page'] - 1;
		$MulaiAwal = $BatasAwal * $hal;
		} 
		else if (!empty($_GET['page']) and $_GET['page'] == 1) 
		{
			$MulaiAwal = 0;
		} else if (empty($_GET['page'])) {
			$MulaiAwal = 0;
		}//tampil data
		
		$query = mysqli_query($con,"SELECT * FROM tabel_matakuliah LIMIT $MulaiAwal , $BatasAwal");
		?><div style="width:860px; height:auto; padding:20px 20px 20px 20px; box-shadow:1px 1px 5px black; margin:30px 0 0 150px ">
				Daftar Mata Kuliah
					<table>
					<tr>
						<td>No</td><td style="width=500px;">| Mata Kuliah</td><td style="width=100px;">|  Sks</td></tr>
						<hr>
					<?php
					While($data=mysqli_fetch_row($query))
					{
						echo "<tr><td>| $data[0]</td> <td>| $data[1]</td> <td>| $data[2]</td></tr>";
			
					}
					?></table>
			<?php
				$cekQuery = mysqli_query($con,"SELECT * FROM tabel_matakuliah");
				$jumlahData = mysqli_num_rows($cekQuery);
				if ($jumlahData > $BatasAwal) 
				{
					?><center>
					<div style="width:150px; height:10px; background-color:white; box-shadow:1px 1px 3px black; padding:10px; 0 0 0;"
					<?php
					echo '<br/><div style="font-size:10pt;">Page : ';
					$a = explode(".", $jumlahData / $BatasAwal);
					$b = $a[0];
					$c = $b + 1;
					for ($i = 1; $i <= $c; $i++) {
						echo '<a style="text-decoration:none;font-size:15px;';
						if ($_GET['page'] == $i) {
							echo 'color:white;background-color:blue;font:bold;';
						}
						echo '" href="?page=' . $i . '">' . $i . '</a>, ';
					}
					echo '</div></div></div></center>';
				}
?>