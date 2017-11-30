<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--부트스트랩-->
    <link rel="Stylesheet" href="css/bootstrap.min.css" />
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <title>CCTV 관리</title>

    <?php
    $conn = mysqli_connect("localhost", "dbseong", "sorry119", "dbseong");
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    /* change character set to utf8 */
    if (!mysqli_set_charset($conn, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($link));
        exit();
    }
    $select_query = "SELECT * FROM CCTV";
    $result = mysqli_query($conn, $select_query);
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['pos']==='Super') continue;
        $ID[] = $row['ID'];
        $Name[] = $row['name'];
        $Date[] = $row['install_date'];
        $ManagerID[] = $row['manager_id'];

    }
    mysqli_close($conn);
    ?>
    <script type="text/javascript">
        var ID = <?= json_encode($ID)?>;
        var Name = <?= json_encode($Name) ?>;
        var Date = <?= json_encode($Date) ?>;
        var ManagerID = <?= json_encode($ManagerID) ?>;
        var content = 
        '<div>';
        for(var i = 0; i < ID.length; i++) {
            content += 
            '   <form action="action_page_cctv.php" method="POST">' +
            '   <table class="table table table-hover table-bordered">' +
            '    <tr>'+
            '        <td>' + ID[i] + '</td> '+
            '        <td>' + Name[i] + '</td> '+
            '        <td>' + Date[i] + '</td> '+
            '        <td>' + ManagerID[i] + '</td> '+
            '        <td><label class="radio-inline">' +
            '           <input type="radio" name="option" value="delete">삭제</label></td>' +
            '        <td><label class="radio-inline">' +
            '           <input type="radio" name="option" value="modify">수정</label></td>' +
            '           <td><input type="submit" class="btn btn-default">' +
            '      <input type="hidden" name="userID" value="' + ID[i] + '" /></td>' +
            '    </tr>' +
            '   </table>' +
            '   </form>';
        }
        content += 
        '</div>';
        window.onload =function(){
            document.getElementById('text').innerHTML = content;
            // body...
        }
    </script>

        <style>
body { margin: 0; }
.navbar {
    top: 0px;
  background:   #00CED1;
  margin: 0; padding: 0;
  list-style: none;
  position: fixed;
  width: 100%;
  height: 60px;

}
.navbar>li {
  display: inline-block;

   margin-left: 5px;
   margin-right: 5px;
   padding-left: 5px;
   padding-right: 5px;
     height: 60px;

}
.navbar>li>a {
  display: block;
  text-decoration: none;
   line-height: 50px;

  color: white;
  
}
.navbar>li:hover {
  background: #009dd1;
}
.content{
    margin-left: 320px;
    margin-top: 60px;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
        <ul class="navbar">
        <li><a href="superadmin.html"><img src="로고.png" height="50"></a></li>
        <li style="float: right"><a href="#">logout</a></li>
    </ul>
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:300px;">
        <a href="cctv.php" class="w3-bar-item w3-button">CCTV 관리</a>
        <a href="manageadmin.php" class="w3-bar-item w3-button">일반 관리자 관리</a>
        <a href="" class="w3-bar-item w3-button">촬영 영상, 메타로그 파일 관리</a>
        <a href="" class="w3-bar-item w3-button">이웃 공간 관리</a>
        <a href="" class="w3-bar-item w3-button">공간 시퀀스 관리</a>
        <a href="" class="w3-bar-item w3-button">내정보 관리</a>
    </div>
    <div class="content">
    <div id="wrapper">
        <hr>
        <div>
            <form class="form-horizontal" action="includecctv.php" method="post">
            <div class="form-group">
                <label for="Name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-7">
                    <input type="text" name="name" class="form-control" id="Name" placeholder="name">
                </div>
            </div>
            <div class="form-group">
                <label for="Date" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-7">
                    <input type="date" name="Date" class="form-control" id="Date">
                </div>
            </div>
            <div class="form-group">
                <label for="ManagerNum" class="col-sm-2 control-label">Manager ID</label>
                <div class="col-sm-7">
                    <input type="text" name="ManagerNum" class="form-control" id="ManagerNum" placeholder="ManagerNum">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-default" ></button>
                </div>
            </div>
        </form>
        </div>
        <hr>
        <div id="text"></div>
    </div>
</div>

</body>
</html>
