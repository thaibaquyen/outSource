<?php 
    include("ketnoisql.php");
    $conn=connect();
    $ar = array();
    $aaaa = array(array("e"=>"qww","er"=>"wwww"),array("e"=>"qww","er"=>"wwww"));
    $sqll="SELECT * from khohang";
    $mangf = $conn->query($sqll);
    foreach($mangf as $k=>$aa){
      echo var_dump($aa);
    }
?>