<?php
$errors = array();
if (isset($_POST['sbn'])) {
    extract($_REQUEST);
    $u = query('email', $email);
    $re_pass = $_POST['re_password'];
    if (empty($email)) {
        array_push($errors, "Không được để trống Email");
    }
    if (empty($password)) {
        array_push($errors, "Không được để trống mật khẩu");
    }
    if ($re_pass != $password) {
        array_push($errors, "Mật khẩu 2 phải giống mật khẩu 1");
    }

    if ($u['email'] == $email) {
        $id = query_id($u['email']);
        $pass = md5($password);
        update_member($u['member_name'],$u['email'],$pass,$u['member_level'],$u['phone'],$u['address'],$u['id']);
        header("location: ".ROOT."admin/?page=login");
        die();
    }else{
        array_push($errors, "Email không tồn tại");
    }
}
unset($_SESSION['hoten']);
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vietpro Mobile Shop - Administrator</title>

    <link href="themes/css/bootstrap.min.css" rel="stylesheet">
    <link href="themes/css/datepicker3.css" rel="stylesheet">
    <link href="themes/css/bootstrap-table.css" rel="stylesheet">
    <link href="themes/css/styles.css" rel="stylesheet">

    <!--Icons-->
    <script src="themes/js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>


<body>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading" style="background: #3498db;color: #fff;">Team8Drink - <b>Quên mật khẩu</b></div>
                <div class="panel-body">
                <?php if (count($errors) > 0) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    <form role="form" method="POST">
                        <fieldset>
                            
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                   
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu mới" name="password" type="password"  type="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nhập lại mật khẩu mới" name="re_password" type="password" >
                            </div>
                          
                            <button type="submit" class="btn btn-primary"  name="sbn">Lấy mật khẩu</button><br><br>
                            <!-- <p>Bạn chưa có tài khoản? <a href="<?= ROOT ?>admin?page=signup" style="">Đăng Kí Ngay</a></p> -->
                            <p>Bạn có tài khoản? <a href="<?= ROOT ?>admin?page=login" style="">Đăng nhập ngay!</a></p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</body>

</html>