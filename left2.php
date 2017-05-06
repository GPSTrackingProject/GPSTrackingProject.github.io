<div class="col-md-3">
                <p class="lead">GPS Tracking</p>
                <div class="list-group">
				<a href="index.php" class="list-group-item">Vị trí</a>
                <a href="#" class="list-group-item active">Quá trình đi 
<div>

<?php
	$row =array();
	$sql= mysql_query("select * from imei where user_id = '$user_id'");
	while ($rowimei=mysql_fetch_array($sql))
	{
		$imei = $rowimei['id'];
		$bangsoxe = $rowimei['bangsoxe'];
		echo '<option value="'.$imei.'&bangsoxe='.$bangsoxe.'">'.$bangsoxe.'</option>';
		array_push($row,$rowimei);
	}
?>
</select>
</div></a>
<!-- <a href="hinhanh.php" class="list-group-item">Hình ảnh xe --><div>

<?php
	$row =array();
	$sql= mysql_query("select * from imei where user_id = '$user_id'");
	while ($rowimei=mysql_fetch_array($sql))
	{
		$imei = $rowimei['id'];
		$bangsoxe = $rowimei['bangsoxe'];
		echo '<option value="'.$imei.'&bangsoxe='.$bangsoxe.'">'.$bangsoxe.'</option>';
		array_push($row,$rowimei);
	}
?>
</select>
</div></a>
                    <a href="thongtincanhan.php" class="list-group-item">Thông tin cá nhân</a>
                </div>
<div>
	
	<form action='quatrinh.php' method="GET">
	<input type="hidden" name="bangsoxe" value="<?php echo $bangsoxe;?>"/>
	<input type="hidden" name="imei" value="<?php echo $id_imei;?>"/>
	<input type="text" name="date" class="tcal" value="<?php echo $date;?>" />
	<input type="submit" value="GO!"/>
	</form>
	<button id='btnxemlai'onclick="btnxemlaiclick()">Xem lộ trình</button>
<table cellspacing="0" cellpadding="0" border="0" width="265">
  <tr>
	<td>
	</td>
  </tr>
  <tr>
  <td>
	<div style="width:265; height:410px; overflow:auto;">
	<table cellspacing="0" cellpadding="1" border="1" width="245" >
	<tr>
				<td>Thời gian</td>
				<td>Tốc độ</td>
				<td>Vị trí</td>
	</tr>
<?php
	$i=0;
	$sql=mysql_query("select * from tracking where id_imei=$id_imei and date='$date'");
	while ($rowtracking=mysql_fetch_array($sql))
	{
        $thoigian = $rowtracking['time'];
		$des = $rowtracking['vitri'];
		$speed = $rowtracking['tocdo'];
		if(($thoigian!='') and ($des!=''))
		{
		echo '<tr><td>'.$thoigian.'</td><td>'.$speed.'</td><td>'.$des.'</td></tr>';
		$i++;
		}
		if ($i==0) echo 'Không thể hiển thị vị trí đối tượng trong ngày này';
	}
?>
	</table>
	</div>
	</td>
	</tr>
</table>
</div>
</div>
