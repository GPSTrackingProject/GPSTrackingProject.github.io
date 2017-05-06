<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
  <title>Đổi thông tin - GPS Tracking</title>
  <link rel="stylesheet" type="text/css" media="all" href="styles.css">
 
</head>
<body>
<div id="w">
<form id="thongtinform" name="thongtinform" method="post" action="thongtin_bangsoxe.php">
  <p class="note"><span class="req">*</span>Bạn hãy điền vào những khoảng trống bắt buộc</p>
   <div class="row">
    <label for="email">Tài khoản <span class="req">*</span></label>
    <input type="text" name="user" id="user" class="txt" tabindex="2" placeholder="Tài khoản bạn dùng để đăng nhập" required>
  </div>
  <div class="row">
    <label for="name">Tên đối tượng cũ <span class="req">*</span></label>
    <input type="text" name="bangsoxe" id="bangsoxe" class="txt" tabindex="1" placeholder="Tên đối tượng mà bạn đã đăng kí" required>
  </div>
   
  <div class="row">
    <label for="message">Tên đối tượng mới <span placeholder="Tên đối tượng bạn muốn đổi" class="req">*</span></label>
    <input type="text" name="bangsoxe_new" id="bangsoxe_new" class="txt" tabindex="4" placeholder="Tên đối tượng mà bạn muốn đổi" required>
  </div>
   
  <div class="center">
    <input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="Đổi">
  </div>
</form>
</div>
</body>
</html>