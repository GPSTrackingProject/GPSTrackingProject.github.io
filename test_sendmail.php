<?php
$path = 'a.txt';
$fp = @fopen($path, "r");
  
// Kiểm tra file mở thành công không
if (!$fp) {
    echo 'Mở file không thành công';
}
else{
    echo 'Mở file thành công';
}
?>