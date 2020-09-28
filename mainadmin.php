<?php
    session_start();
    if(isset($_SESSION['admin'])){
    }
    else{
        header("location:login.php");
    }
    if(isset($_POST["btn"])){
        unset($_SESSION['admin']);
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>kho hang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    tr,th,td{
        width:100px;
        text-align:center;
    }
  </style>
<script type="text/javascript">   
    $(document).ready(function() {
            $(".xoa").click(function(){    
              var id=$(this).attr('stt'); 
              $.post("./mainadmin/deleted.php",{id:id},function(data){
                //$("#tb").html(data);
              });
              location.reload("mainadmin.php"); 
              //alert("ghhh "+id);
            }); 
            $(".sua").click(function(){    
              var id=$(this).attr('stt'); 
              $.post("./mainadmin/updated.php",{id:id},function(data){
                $("#ndsua").html(data);
              });
              //alert("ghhh "+id);
            });
            $("#them").click(function(){    
              $("#ndthem").load("./mainadmin/inserted.php");
              //alert("ghhh "+id);
            });            
        });
</script>
</head>
<body>
<form action="" method="post">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">kho hàng</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="./mainadmin/inserted.php">Thêm S/P</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span><input type="submit" name="btn" value="Logout"></a></li>
      </ul>
    </div>
  </div>
</nav>
  <h2 id="tb"></h2>
<div class="container">
 <!-- <button type="button" class="btn btn-info btn-lg" id="them" data-toggle="modal" data-target="#themsp">Thêm s/p</button> -->
  <?php
    $i=0;
    $str1='<div class="row"> <div class="col-sm-6"><table>
            <tr>
                <th>Sản phẩm</th>  
                <th>Giá</th>
                <th>Sale(%)</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>';
    $str2=' <div class="col-sm-6"><table>
            <tr>
                <th>Sản phẩm</th>  
                <th>Giá</th>
                <th>Sale(%)</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>';
            require("ketnoisql.php");
    $conn=connect();
    $query=$conn->query("select * from khohang");
    while($data = $query->fetch_assoc()){
        if($i<$query->num_rows /2){
        $link="./img/".$data["ten"].".jpg";
        $str1 .='<tr>
        <td><img src="'.$link.'" width="60px" height="60px;"></td>  
        <td>'.number_format($data["gia"]).'</td>
        <td>'.$data["sale"].'</td>
        <td><a href="./mainadmin/updated.php?id='.$data["masp"].'">sua</a></td>
        <td><button type="button" stt="'.$data["masp"].'" class="xoa">xóa</button></td>
        </tr>';
        $i++;
        }
        else{
            $link="./img/".$data["ten"].".jpg";
            $str2 .='<tr>
            <td><img src="'.$link.'" width="60px" height="60px;"></td>  
            <td>'.number_format($data["gia"]).'</td>
            <td>'.$data["sale"].'</td>
            <td><a href="./mainadmin/updated.php?id='.$data["masp"].'">sua</a></td>
            <td><button type="button" stt="'.$data["masp"].'" class="xoa">xóa</button></td>
            </tr>';
        }
    }
    $str1 .='</table></div>';
    $str2 .='</table></div></div>';
    echo $str1;
    echo $str2;
  ?>
</div>
</form>
    <!--<button type="button" stt="'.$data["masp"].'" class="sua" data-toggle="modal" data-target="#suasp" >sửa</button>-->
  <!---------<a href="updated.php?id='.$data["masp"].'">sua</a>  modal them sp  
  <button type="button" stt="'.$data["masp"].'" class="sua" data-toggle="modal" data-target="#suasp">sửa</button>      -->
<div class="modal fade" id="themsp" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm</h4>
        </div>
        <div class="modal-body" id="ndthem">
          <p>nl them</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>   
    </div>
  </div>
  <!---------  modal sua sp        -->
  <div class="modal fade" id="suasp" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">sửa</h4>
        </div>
        <div class="modal-body" id="ndsua">
          <p>ndsua.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>   
    </div>
  </div>
</body>
</html>

