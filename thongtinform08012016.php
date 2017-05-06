<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
  <title>Đổi thông tin - GPS Tracking</title>
  <link rel="stylesheet" type="text/css" media="all" href="styles.css">
 
</head>
<body>
<div id="w">
<form id="thongtinform" name="thongtinform" method="post" action="thongtinnform.php">
  <p class="note"><span class="req">*</span>Bạn hãy điền vào những khoảng trống bắt buộc</p>
   <div class="row">
    <label for="email">Tài khoản cũ <span class="req">*</span></label>
    <input type="text" name="user" id="user" class="txt" tabindex="2" placeholder="Tài khoản bạn dùng để đang nhập" required>
  </div>
  <div class="row">
    <label for="name">Mật khẩu <span class="req">*</span></label>
    <input type="password" name="password" id="password" class="txt" tabindex="1" placeholder="Mật khẩu của bạn" required>
  </div>
   
  <div class="row">
    <label for="email">E-mail <span class="req"></span></label>
    <input type="email" name="email" id="email" class="txt" tabindex="2" placeholder="E-mail mà bạn muốn đổi">
  </div>
   
  <div class="row">
    <label for="subject">Tài khoản mới <span class="req"></span></label>
    <input type="text" name="user_new" id="user_new" class="txt" tabindex="3" placeholder="Tài khoản mà bạn muốn đổi">
  </div>
   
  <div class="row">
    <label for="message">Bảng số xe  <span placeholder="Bảng số xe bạn muốn đổi" class="req"></span></label>
    <textarea name="bangsoxe" id="bangsoxe" class="txtarea" tabindex="4"></textarea>
  </div>
   
  <div class="center">
    <input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="Đổi">
  </div>
</form>
</div>
</body>
</html>