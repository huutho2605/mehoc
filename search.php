<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title>Danh sách tài khoản</title>
     <style>.list{border-collapse: collapse; margin: 0 auto; width: 84%;} .list tr
     th{background: #ebebeb;} .list img{width: 32px:} .seach-form{position: relative; left: 7%;}
     </style>
</head>     
<body>

    <table class="search-form" callpadding="10">
    <tr>
        <td>
             <form action=""method="get"> 
             <input type="text" name="q" placeholder="Nhập từ khóa cần tìm" value="<?php if(isset($_GET('q'))) { echo $_GET('q'); }?>" /> 
             <input type="submit" value="Tìm" />
             <input type="button" value="Tất cả" onclick="window.location.href='/quiz'"/>
         </form>
     </td>
 </tr>
 </table>
 </body>
</html>
