<?php
$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
if(!$db){
    die("無法對資料庫連線");
}        
$sql = "SELECT * FROM trashcan_show_state";
$rows = mysqli_query($db , $sql);
$nums = mysqli_num_rows($rows);

echo '<table class=1';
echo 'table>';
echo '
	<thead>
		<tr>	
			<th>ID</th>
			<th>used time</th>
			<th>battery</th>
			<th>voltage</th>
			<th>current</th>
			<th>temperature</th>
			<th>warning</th>
			<th>state</th>
			<th>last used time</th>
		</tr>
	</thead>
	
	<tbody>';
	
	for($a = 0 ; $a < $nums ; $a++){
		$row = mysqli_fetch_row($rows);
		echo "<tr>";
		echo "<td class = \"id_detail\"> <a href='id_detail.php?id=$row[0]&lon=$row[7]&lat=$row[6]'  target='_blank'>{$row[0]}</a> </td>";
		echo "<td class = \"id_detail\">" . $row[1] . "</td>";
		echo "<td class = \"id_detail\">" . $row[2] . "</td>";
		echo "<td class = \"id_detail\">" . $row[3] . "</td>";
		echo "<td class = \"id_detail\">" . $row[4] . "</td>";
		echo "<td class = \"id_detail\">" . $row[5] . "</td>";
		echo "<td class = \"id_detail\">" . $row[8] . "</td>";
		echo "<td class = \"id_detail\">" . $row[9] . "</td>";
		echo "<td class = \"id_detail\">" . $row[10] . "</td>";
		echo "</tr>";	
	}
	mysqli_free_result($rows);
	
	echo '</tbody></table>';
	
?>