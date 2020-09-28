<?php 
    session_start();
    $ten=$_POST["ten"];
    $dc=$_POST["dc"];
    $fax=$_POST["fax"];
    $email=$_POST["email"];
    $mahd;
    $makh;
    $tongtien;

    include("ketnoisql.php");
    $conn=connect();
    $sqll="SELECT max(mahd) as'stt' from hoadon";
    $mangf = $conn->query($sqll);
    if($mangf->num_rows > 0){
        while($data = $mangf->fetch_assoc()){
           $mahd=$data["stt"]+1;
        }
    }
    else{
        $mahd=1;
    }
    $sqll="SELECT max(makh) as'ma' from khachhang";
    $mangf = $conn->query($sqll);
    if($mangf->num_rows > 0){
        while($data = $mangf->fetch_assoc()){
            $makh=$data['ma']+1;
        }
    }
    else{
        $makh=1;
    }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $ngaylap=date("Y/m/d h:i:sa");
    //echo $makh;
    
    if(!isset($_SESSION['cart'])){
        echo "giỏ trống";
    }
    else{    
        foreach($_SESSION['cart'] as $key => $values){
                $tien=$values['gia']*$values['sl'];
                $tongtien += $tien;
            }
    }

    $sql="INSERT INTO hoadon(mahd,ngaylap,makh,tongtien) VALUES ($mahd,'$ngaylap',$makh,$tongtien)";
    $conn->query($sql);
    
    $sql="INSERT INTO khachhang(ten,diachi,sdt,email) VALUES ('$ten','$dc','$fax','$email')";
    $conn->query($sql);
    if(!isset($_SESSION['cart'])){
        echo "giỏ trống";
    }
    else{    
        foreach($_SESSION['cart'] as $key => $values){
                $masp=$values['masp'];
                $mahdd=$mahd;
                $sl=$values['sl'];
                $size=$values['size'];
                $tien=$values['gia']*$values['sl'];
                $sql="INSERT INTO cthoadon(mahd,masp,soluong,size,tien) VALUES ($mahd,$masp,$sl,$size,$tien)";
                $conn->query($sql);
            }
    }
    unset($_SESSION['cart']);
    $con->close();
?>