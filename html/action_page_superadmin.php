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
	$sql = "DELETE FROM ADMIN WHERE ID = \"$userID\";";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	if($result === TRUE) {
		echo("<script>alert('제거 완료.');</script>"); 
		echo "<meta http-equiv='refresh' content='0; url=manageadmin.php'>";
	}else {
		echo("<script>alert('제거 실패.');</script>"); 
	}
}
else if($option == "insert") {
	echo $option;
	$sql = "INSET INTO ADMIN VALUES (\"$ID\", \"$pw\", \"$name\", \"$position\", \"$phone\");";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	if($result === TRUE) {
		echo("<script>alert('추가 완료.');</script>"); 
		echo "<meta http-equiv='refresh' content='0; url=manageadmin.php'>";
	}else {
		echo("<script>alert('추가 실패.');</script>"); 
	}
}
else if($option == "modify") {
	echo $option;
	$sql = "INSET INTO ADMIN VALUES (\"$ID\", \"$pw\", \"$name\", \"$position\", \"$phone\");";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	if($result === TRUE) {
		echo("<script>alert('추가 완료.');</script>"); 
		echo "<meta http-equiv='refresh' content='0; url=manageadmin.php'>";
	}else {
		echo("<script>alert('추가 실패.');</script>"); 
	}
}
?>
</body>
</html>