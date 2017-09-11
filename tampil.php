<html>
	<body>
	<div id="content">
	
	<?php
	$query1=mysqli_connect("localhost","root","");
	mysqli_select_db($query1, "mahasiswa");

	$start=0;
	$limit=5;

	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$start=($id-1)*$limit;
	}

		$query=mysqli_query($query1,"select * from tabel_matakuliah LIMIT $start, $limit");
		echo "<ul>";
		while($query2=mysqli_fetch_array($query))
	{
		echo "<li>".$query2['nama_matkul']."</li>";
	}
		echo "</ul>";
		
		$query3=mysqli_query($query1,"select * from tabel_matakuliah");
		$rows=mysqli_num_rows($query3);
		
		$total=ceil($rows/$limit);

		if($id>1)
		{
			echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
		}
		if($id!=$total)
		{
			echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
		}

		echo "<ul class='page'>";
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo "<li class='current'>".$i."</li>"; }
			else 
			{ 
				echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
			}
		echo "</ul>";
		?>
		</div>
	</body>
</html>