<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--부트스트랩-->
    <link rel="Stylesheet" href="css/bootstrap.min.css" />
     <link type = "text/css" rel="stylesheet" href = "forall.css">
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
        $Position[] = $row['pos'];
        $Phonenumber[] = $row['phone_num'];

    }
    mysqli_close($conn);
    ?>
    <script type="text/javascript">
        var Position = <?= json_encode($Position)?>;
        var ID = <?= json_encode($ID)?>;
        var Password = <?= json_encode($Password) ?>;
        var Name = <?= json_encode($Name) ?>;
        var Phonenumber = <?= json_encode($Phonenumber) ?>;
        var content = 
        '<div>';

        for(var i = 0; i < ID.length; i++) {
 
            content += 
            '    <tr>'+
            '   <form action="action_page_superadmin.php" method="POST">' +
            '        <td>' + ID[i] + '</td> '+
            '        <td>' + Password[i] + '</td> '+
            '        <td>' + Name[i] + '</td> '+
            '        <td>' + Position[i] + '</td> '+
            '        <td>' + Phonenumber[i] + '</td> '+
            '      <input type="hidden" name="userID" value="' + ID[i] + '" />' +
            '        <td><label class="radio-inline">' +
            '           <input type="radio" name="option" value="modify">변경</label>' +
            '        <label class="radio-inline">' +
            '           <input type="radio" name="option" value="delete">삭제</label></td>' +
            '           <td><input type="submit" class="btn btn-default" value="확인"></td>' +
            '   </form>'+
            '    </tr>' ;
        }
        content += 
        '</div>';
        window.onload =function(){
            document.getElementById('text').innerHTML = content;
            // body...
        }
    </script>

    <script type="text/javascript">
      function search(){
        var target= document.getElementById("selectBox");
        var selected = target.options[target.selectedIndex].value;
        var selectedvalue = $('#searchvalue').val();
        //alert('selectedvalue = ' +  selectedvalue);
        var Position = <?= json_encode($Position)?>;
        var ID = <?= json_encode($ID)?>;
        var Password = <?= json_encode($Password) ?>;
        var Name = <?= json_encode($Name) ?>;
        var Phonenumber = <?= json_encode($Phonenumber) ?>;
        var content = 
        '<div>';
        for(var i = 0; i < ID.length; i++) {
          if(selected=="name" && selectedvalue!=Name[i]) continue;
          else if(selected=="id" && selectedvalue!=ID[i]) continue;
          else if(selected=="position" && selectedvalue!=Position[i]) continue;
          else if(selected=="phone_num" && selectedvalue!=Phonenumber[i]) continue;
          else if(selected=="assigned_cctv" ) continue;
            content += 
            '    <tr>'+
            '   <form action="action_page_superadmin.php" method="POST">' +
            '        <td>' + ID[i] + '</td> '+
            '        <td>' + Password[i] + '</td> '+
            '        <td>' + Name[i] + '</td> '+
            '        <td>' + Position[i] + '</td> '+
            '        <td>' + Phonenumber[i] + '</td> '+
            '      <input type="hidden" name="userID" value="' + ID[i] + '" />' +
            '        <td><label class="radio-inline">' +
            '           <input type="radio" name="option" value="modify">변경</label>' +
            '        <label class="radio-inline">' +
            '           <input type="radio" name="option" value="delete">삭제</label></td>' +
            '           <td><input type="submit" class="btn btn-default" value="확인"></td>' +
            '    </tr>' +
            '    <tr>'+
            '   </form>'+
            '    </tr>' ;
        }
        content += 
        '</div>';
        document.getElementById('text').innerHTML = content;
      }
    </script>

    <script type="text/javascript">
      document.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
        }
      }, true);
    </script>
<style>

    
body { margin: 0; }

form{
    padding-top: 5px;
    padding-bottom: 5px;

}
select {
  width: 200px;
  height: 35px;
  margin: 0;
  padding: 0 0 0 .5em;

  cursor: pointer;
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

      <div class="search_">
          <form>
            <select class="form-control" name="search_type" style="display: inline; width:130px;" id="selectBox">
              <option value="name">이름</option>
              <option value="id">ID</option>
              <option value="position">직책</option>
              <option value="phone_num">휴대전화</option>
              <option value="assigned_cctv">할당CCTV</option>
            </select>
                <input class="form-control" style="display: inline; height: 33px; width: 600px;" type="text" name="searchvalue" id="searchvalue" placeholder="Search Item.."  >
                
                <input type="button" class="btn btn-default" style="display: inline;" value="검색" onclick="search()" >
                <input type="button" class="btn btn-default" style="display: inline; " value="관리자 추가"  >
              </form>
            </div>
           


 <div class="table-responsive" >
        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
          <caption class="text-center">Qurey Result </caption>
          <thead>
            <tr>
              <th>ID</th>
              <th>Password</th>
              <th>Name</th>
              <th>Position</th>
              <th>Phone number</th>
              <th>Option</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="text">

          </tbody>
          <tfoot>
            <tr>
              <td colspan="7" class="text-center">Data retrieved from CCTV management DB</td>
            </tr>
          </tfoot>
        </table>
      </div><!--end of .table-responsive-->


    </div>


</body>
</html>
