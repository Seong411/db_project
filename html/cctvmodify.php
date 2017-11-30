<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--부트스트랩-->
    <link rel="Stylesheet" href="css/bootstrap.min.css" />
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <title>관리자 관리</title>

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
    $select_query = "SELECT * FROM ADMIN";
    $result = mysqli_query($conn, $select_query);
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['pos']==='Super') continue;
        $ID[] = $row['ID'];
        $Password[] = $row['password'];
        $Name[] = $row['name'];
        $Address[] = $row['pos'];
        $Phonenumber[] = $row['phone_num'];

    }
    mysqli_close($conn);
    ?>
    <script type="text/javascript">
        var ID = <?= json_encode($ID)?>;
        var Password = <?= json_encode($Password) ?>;
        var Name = <?= json_encode($Name) ?>;
        var Phonenumber = <?= json_encode($Phonenumber) ?>;
        var content = 
        '<div>';
        for(var i = 0; i < ID.length; i++) {
            content += 
            '   <form action="action_page_superadmin.php" method="POST">' +
            '   <table class="table table table-hover table-bordered">' +
            '    <tr>'+
            '        <td>' + ID[i] + '</td> '+
            '        <td>' + Password[i] + '</td> '+
            '        <td>' + Name[i] + '</td> '+
            '        <td>' + Phonenumber[i] + '</td> '+
            '      <input type="hidden" name="userID" value="' + ID[i] + '" />' +
            '        <td><label class="radio-inline">' +
            '           <input type="radio" name="option" value="delete">삭제</label>' +
            '           <input type="submit" class="btn btn-default"></td>' +
            '    </tr>' +
            '    <tr>'+
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
        <form action="#">
            <select name="search_type">
              <option value="id">ID</option>
              <option value="address">주소</option>
              <option value="building">건물명</option>
              <option value="floor">층</option>
              <option value="location">실내위치</option>
            </select>
             
            <input type="submit" name="CCTV 수정" value="Submit">
        </form>



        <div id="wrapper" style="padding-top: 15px;">
            <div id="text"></div></div>
    </div>
  </div>
</body>
</html>
