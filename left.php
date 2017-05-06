<div class="col-md-3">
     <p class="lead">GPS Tracking</p>
        <div class="list-group">
			<!-- Vi tri xe -->
            <a href="#" class="list-group-item active">Vị trí</a>
			<!-- End vi tri xe -->
			<!-- Qua trinh -->
            <a href="#" class="list-group-item">Quá trình đi 
			<div>
				<select name="quatrinh" id="optionchonxe">
				<option selected="selected" value="0">Chọn đối tượng</option>
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
				<button id='btnxem'onclick="btnxemclick()">Xem</button>
			</div>
			</a>
			<!-- End qua trinh -->
			<!-- Khoanh vung -->

			<!-- End khoanh vung -->
			<!-- Thong tin ca nhan -->
            <a href="thongtincanhan.php" class="list-group-item">Thông tin cá nhân</a>
			<!-- End thong tin ca nhan -->
        </div>
</div>

       