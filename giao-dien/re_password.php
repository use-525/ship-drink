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
        header("location: ".ROOT."?page=login");
        die();
    }else{
        array_push($errors, "Email không tồn tại");
    }
}

unset($_SESSION['login_member']);
?>

    <main>
        <div class="container form-login">
        <?php if (count($errors) > 0) : ?>
						<?php foreach ($errors as $error) : ?>
							<div class="alert alert-danger">
								<?php echo $error; ?>
							</div>
						<?php endforeach ?>
					<?php endif ?>
            <div class="box-login-registered" style="background-color: forestgreen; padding: 2rem;">
      
                <div class="box-login">
                    <h4 class="facebook">
                        <i class="fab fa-facebook"></i>
                        <span>faceboook</span>
                        <div></div>
                    </h4>
                    <h4 class="google">
                        <i class="fab fa-google"></i>
                        <span>google</span>
                        <div></div>
                    </h4>
                    <p class="or" style="color: #fff;"> Điền thông tin tài khoản</p>
                    <form action="" method="post" class="login">
                        <input type="text" name="email" placeholder="email">
                        <input type="text" name="password" placeholder="Password">
                        <input type="text" name="re_password" placeholder="Nhập lại mật khẩu">
                        <div class="save-lg">
                            <a href="<?=ROOT?>?page=login" style="color:#fff;">Bạn đã có tài khoản?</a>
                        </div>
                        <button name="sbn" style="color: #fff;">Lấy lại mật khẩu</button>
                    </form>
                 
                </div>
            </div>
    </main>

 