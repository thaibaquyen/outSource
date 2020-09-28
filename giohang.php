<style>
  table,tr,th,td{
    border:1px while solid;
    text-align:center;
  }
  td,th{
    text-align:center;
    width:17%;
  }
</style>
<script type="text/javascript">
    $(document).ready(function() {
            $(".changesl").change(function(){
                var slnew=$(this).val();
                var stt=$(this).attr("stt");
                $.post("suaseesionsl.php",{stt:stt,sl:slnew},function(data){        
                });
                $("#b").load("giohang.php");
               // location.reload("giohang.php");        
            });
            $(".changesize").change(function(){
                var sizenew=$(this).val();
                var stt=$(this).attr("stt");
                $.post("suaseesionsize.php",{stt:stt,size:sizenew},function(data){
                });
                $("#b").load("giohang.php");
               // location.reload();        
            });
            $(".xoa").click(function(){
                var stt=$(this).attr("stt");
                $.post("xoasp.php",{stt:stt},function(data){                  
                });
                $("#b").load("giohang.php");        
            });
          //  $("#thanhtoan").click(function(e){
           //  $(".modal-header").load("khachhang.php");
           // })
          });         
</script>
<?php
session_start();
$str='<div class="container" style="width:540px; text-align:center; ">         
  <table>
      <tr>
        <th>Sản Phẩm</th>
        <th>Giá</th>    
        <th>Số Lượng</th>
        <th>Size</th>
        <th>Thành Tiền</th>
        <th>xóa</th>
      </tr>';
      if(isset($_SESSION['cart'])){
        $tongtien=0;
        foreach($_SESSION['cart'] as $key => $values){
          $str .= '<tr>
          <td><img src="'.$values['ten'].'" width="60px" height="60px;"></td>
          <td>'.number_format($values['gia']).'</td>    
          <td><select stt="'.$key.'" class="changesl">';
          for($i=1;$i<10;$i++){
            if($i==$values['sl']){
            $str .= '<option value="'.$i.'" selected>'.$i.'</option>';}
            else{
              $str .= '<option value="'.$i.'">'.$i.'</option>';
            }
          }
          $str .='</select></td>
          <td><select stt="'.$key.'" class="changesize">';
          for($i=37;$i<44;$i++){
            if($i==$values['size']){
            $str .= '<option value="'.$i.'" selected>'.$i.'</option>';}
            else{
              $str .= '<option value="'.$i.'">'.$i.'</option>';  
            }
          }
          $tongtien += $values['sl']*$values['gia'];
        $str.='</select></td>
          <td>'.number_format($values['sl']*$values['gia']).'</td>
          <td><button type="button" stt="'.$key.'" class="xoa">xóa</button></td>
          </tr>';   
        };
        $str.='<p>Tổng tiền của bạn cần thanh toán là  '.number_format($tongtien).'đ</p>';
        echo $str;
        echo "</table></div>";
      }
      else{
        echo "giỏ trống";
      }
?>