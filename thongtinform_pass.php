<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
  <title>Đổi thông tin - GPS Tracking</title>
  <link rel="stylesheet" type="text/css" media="all" href="styles.css">
 
</head>
<body>
<div id="w">
<form id="thongtinform" name="thongtinform" method="post" action="thongtin_pass.php">
  <p class="note"><span class="req">*</span>Bạn hãy điền vào những khoảng trống bắt buộc</p>
   <div class="row">
    <label for="email">Tài khoản<span class="req">*</span></label>
    <input type="text" name="user" id="user" class="txt" tabindex="2" placeholder="Tài khoản bạn dùng để đăng nhập" required>
  </div>
  <div class="row">
    <label for="name">Mật khẩu <span class="req">*</span></label>
    <input type="password" name="pass" id="pass" class="txt" tabindex="1" placeholder="Mật khẩu mà bạn đã dùng để đăng nhập" required>
  </div>
   
  <div class="row">
    <label for="subject">Mật khẩu mới <span class="req">*</span></label>
    <input type="password" name="pass_new" id="pass_new" class="txt" tabindex="3" placeholder="Mật khẩu mà bạn muốn đổi" required>
  </div>
   <div class="row">
    <label for="subject">Nhập lại mật khẩu <span class="req">*</span></label>
    <input type="password" name="confirmpass_new" id="confirmpass_new" class="txt" tabindex="3" placeholder="Nhập lại mật khẩu mà bạn muốn đổi" required>
  </div>
   <div class="center">
    <input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="Đổi">
  </div>
</form>
</div>
</body>
</html>