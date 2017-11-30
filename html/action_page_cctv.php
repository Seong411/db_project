<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?php
    $conn = mysqli_connect("localhost", "dbseong", "sorry119", "dbseong");
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
/* change character set to utf8 */
if (!mysqli_set_charset($conn, "utf8")) {
	printf("Error loading character set utf8: %s\n", mysqli_error($link));
	exit();
}
$userID = $_POST['userID'];
$option = $_POST['option'];
echo $userID;
if($option == "delete") {
	echo $option;
	$sql = "DELETE FROM CCTV WHERE ID = \"$userID\";";
	$result = mysqli_query($conn, $sql);

	if($result === TRUE) {
		echo("<script>alert('제거 완료.');</script>"); 
		echo "<meta http-equiv='refresh' content='0; url=cctv.php'>";
	}else {
		echo("<script>alert('제거 실패.');</script>"); 
	}
}
else if($option == "modify") {
	if($result === TRUE) {
		echo("<script>alert('수정 완료.');</script>"); 
		echo "<meta http-equiv='refresh' content='0; url=cctv.php'>";
	}else {
		echo("<script>alert('수정 실패.');</script>"); 
		echo "<meta http-equiv='refresh' content='0; url=cctv.php'>";
	}
}
else {
	echo("<script>alert('수정 또는 삭제를 선택해 주십시오.');</script>"); 
	echo "<meta http-equiv='refresh' content='0; url=cctv.php'>";
}
mysqli_close($conn);
?>
</body>
</html>