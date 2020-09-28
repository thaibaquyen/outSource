<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    table,tr,td{
        text-align:center;
        margin:0px auto;
    }
    tr{
        margin-top:10px;
    }
    #bk{
        border-radius: 40px 40px;
        width:500px;
        margin:50px auto;
        border:2px solid blue;
        background-color:pink;
        text-align:center;
    }
    body{
        background-color:rgba(192,192,192,0.5);
    }
    input:focus{
        border-radius:20px 20px;
    }
    input[type=submit]{
        border-radius:20px 20px;
    }
</style>
</head>
<body>
<?php
    //$id=1;
    require("../ketnoisql.php");
    $conn=connect();
    mysqli_set_charset($conn, 'UTF8');
    $id=$_GET["id"];
    //$id=$_POST["id"];
    if(isset($_POST["btnset"])){
        $ten=$_POST["name"];
        $gia=$_POST["gia"];
        $mota=$_POST["mota"];
        $sale=$_POST["sale"];
        $loai=$_POST["loai"];
        $sql="UPDATE khohang SET ten='$ten',gia=$gia,loai=$loai,mota='$mota',sale=$sale WHERE masp=$id";
        $conn->query($sql);
    }
?>
<?php
    $sql="select * FROM khohang WHERE masp=$id";
    $result = $conn->query($sql);
    $data=$result->fetch_assoc();
    
    $str='<div id="bk">
    <form action="" method="post">
        <table cellspacing="10" cellpadding="10">
            <h2 style="font-family: "Pacifico";text-align:center;">Sửa Sản Phẩm</h2>
            <tr>
                <td>Tên ảnh</td>
                <td><input type="text" name="name" value='.$data["ten"].'></td>
            </tr>
            
            <tr>
                <td>Giá</td>
                <td><input type="text" name="gia" value='.$data["gia"].'></td>
            </tr>
            
            <tr>
                <td>loại</td>
                <td>
                    <form action="" methor="post">';
                    if($data["loai"] == 0){
                       $str .= '<input type="radio" name="loai" value="0" checked>nam<br>
                        <input type="radio" name="loai" value="1">nữ<br>';
                    }
                    else{
                        $str .= '<input type="radio" name="loai" value="0" >nam<br>
                        <input type="radio" name="loai" value="1" checked>nữ<br>';
                    }

                    $str .='</form>
                </td>
            </tr>
            <tr>
                <td>mô tả</td>
                <td><textarea rows="3" cols="21" name="mota">'.$data["mota"].'</textarea></td>
            </tr>
            <tr>
                <td>Sale</td>
                <td><input type="text" name="sale" value='.$data["sale"].'></td>
            </tr> 
            <tr>
                <td style="font-family:"Pacifico";text-align:center;"><input type="submit" name="btnset" type="button" value="lưu"></td>
                <td><a style="text-decoration: none;" href="../mainadmin.php">Trở về</a></td>    
                </tr>
        </table>
    </form>
    </div>';
    echo $str;
    $conn->close();
?>  
</body>
</html>
