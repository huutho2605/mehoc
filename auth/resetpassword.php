<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8"/>
    <title>Khôi phục mật khẩu</title>

    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="app.css">
</head>
<body>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-kim">
                    
                    <div class="panel-heading">
                        <h4>Khôi phục mật khẩu</h4>
                    </div>

                    <div class="panel-body">
                        <from id="form-forgot" action="" method="POST" role="form">
                            <div id="errors">

                            </div>
                            <div class="form-group">
                                <label for="email">Nhập Email của bạn</label>
                                <input type="text" class="form-control" id="email" placeholder="Nhập email của bạn">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Lấy lại mật khẩu của bạn</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="index.php" class="btn btn-link">Đăng Nhập</a>
                                    </div>
                                </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section> 
   
   <script scr="//code.jquery.com/jquery.js"></script>
   <script scr="//netdna.boottrapcdn.com/bootstrap/3.3.4/jk/bootstrap.min.js"></script>
</body>    
</html>
<?php include('../footer.php'); ?>