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
    if(isset($_POST["name"])){
        $ten=$_POST["name"];
        $gia=$_POST["gia"];
        $mota=$_POST["mota"];
        $sale=$_POST["sale"];
        $loai=$_POST["loai"];
        include("../ketnoisql.php");
        $conn=connect();
        $sql="INSERT INTO khohang(ten,gia,loai,mota,sale) VALUES('$ten',$gia,$loai,'$mota',$sale)";
        $conn->query($sql);
        $conn->close();
    }
?>
<div id="bk">
<form action="" method="post">
    <table cellspacing="10" cellpadding="10">
        <h2 style="font-family: 'Pacifico';text-align:center;">Thêm Sản Phẩm</h2>
        <tr>
            <td>Tên ảnh</td>
            <td><input type="text" name="name"></td>
        </tr>
        
        <tr>
            <td>Giá</td>
            <td><input type="text" name="gia"></td>
        </tr>
        
        <tr>
            <td>loại</td>
            <td>
                <form action="" methor="post">
                    <input type="radio" name="loai" value="0" checked>nam<br>
                    <input type="radio" name="loai" value="1">nữ<br>
                </form>
            </td>
        </tr>
        <tr>
            <td>mô tả</td>
            <td><input type="text" name="mota"></td>
        </tr>
        <tr>
            <td>Sale</td>
            <td><input type="text" name="sale"></td>
        </tr> 
        <tr>
            <td style="font-family:'Pacifico';text-align:center;"><input type="submit" name="btnthem" type="button"></td>
            <td><a style="text-decoration: none;" href="../mainadmin.php">Trở về</a></td>     
        </tr>
    </table>
</form>
</div>
</body>
</html>