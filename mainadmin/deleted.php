<?php
     $id=$_POST["id"];
     include("../ketnoisql.php");
     $conn=connect();
     $sql="DELETE FROM khohang WHERE masp=$id";
     $conn->query($sql);
     $conn->close();
?>