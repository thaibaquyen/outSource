<style>
    p{
        text-align:center;
    }
    #bk{
        border-radius: 40px 40px;
        width:500px;
        margin:10px auto;
        border:2px solid blue;
        background-color:pink;
        text-align:center;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">   
    $(document).ready(function() {
            $("#xnthanhtoan").click(function(){
              var ten=$('#name').val();
              var dc=$('#address').val();
              var fax=$('#pax').val();
              var email=$('#email').val();
              $.post("addkhachhang.php",{ten:ten,dc:dc,fax:fax,email:email},function(data){
                $("#bk").html("cảm ơn bạn đã mua hàng của chúng tôi");
                });
             // alert(ten +" "+ dc);
            });
            
        });
</script>
<div id="bk" >
<form action="" method="post">
    <table>
        <h2 style="font-family: 'Pacifico';text-align:center;" >Kính Chào Quý Khách</h2>
        <tr>
            <p>Tên</p>
            <p><input type="text" id="name"></p>
        <tr>
        
        <tr>
            <p>Địa chỉ</p>
            <p><input type="text" id="address"></p>
        <tr>
        
        <tr>
            <p>Số Điện Thoại</p>
            <p><input type="text" id="pax"></p>
        <tr>
        
        <tr>
            <p>Email</p>
            <p><input type="text" id="email"></p>
        <tr>  
            <p><button id="xnthanhtoan" type="button"> Thanh Toán</button></p>
    </table>
</form>
</div>