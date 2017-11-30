<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "dbseong", "sorry119", "dbseong");

$userID = $_POST['userID'];
$password = $_POST['password'];

$sql = "SELECT * FROM ADMIN;";
$result = mysqli_query($conn, $sql);
$bool = "false";
$admin = "none";
while($row = mysqli_fetch_assoc($result)) {
   if($userID == $row['ID'] && $password == $row['password'] && $row['pos']!='Super' ){
      $bool = 'true';
      $admin = "admin";
   }
   elseif($userID == $row['ID'] && $password == $row['password'] && $row['pos']==='Super' ){
      $bool = 'true';
      $admin = "superadmin";
  }
}

mysqli_close($conn);
if($bool === 'true' && $admin ==="superadmin") {
  echo("<script>alert('최고 관리자 로그인.');</script>"); 
  echo "<script> location.href = 'superadmin.html';</script>";
}
elseif($bool === 'true' && $admin ==="admin") {
  echo("<script>alert('일반 관리자 로그인.');</script>"); 
  echo "<script> location.href = 'admin.html';</script>";
}
else {
  echo("<script>alert('관리자가 아닙니다.');</script>"); 
  echo "<script> location.href='index.html';</script>";
}
?>
</body>
</html>

