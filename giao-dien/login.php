    <?php

$errors = array();
if (isset($_POST['login'])) {
	extract($_REQUEST);
    $u = query('email', $email);
    var_dump($u);
	$re_pass = $_POST['password'];
	$password = md5($re_pass);
	if (empty($email)) {
		array_push($errors, "Không được để trống Email");
	}
	if (empty($password)) {
		array_push($errors, "Không được để trống mật khẩu");
	}
	if (isset($u['email'])) {
		if ($u['password'] == $password ) {
            $_SESSION['login_member'] = $u['member_name'];
            $_SESSION['member'] = $u;
            // echo $_SESSION['member']['id'];
			header("location: " . ROOT . "?page=home" );
			die();
		} else {
			array_push($errors, "Tài khoản hoặc mật khẩu không đúng!");
		}
	}else{
		array_push($errors, "Tài khoản hoặc mật khẩu không đúng!");
	}
}
if (isset($_POST['registration'])) {
	extract($_REQUEST);
	$re_pass = $_POST['re_password'];
	$u = query('email', $email);
	$n = query('member_name', $member_name);
	if (empty($member_name)) {
		array_push($errors, "Không được để trống họ và tên");
	}
	if (empty($email)) {
		array_push($errors, "Không được để trống Email");
	}
	if (empty($password)) {
		array_push($errors, "Không được để trống mật khẩu");
	}
	if ($re_pass != $password) {
		array_push($errors, "Mật khẩu 2 phải giống mật khẩu 1");
	}
	if ($n['member_name'] == $member_name) {
		array_push($errors, "Name đã tồn tại, mời bạn đổi!");
	}
	if ($u['email'] == $email) {
		array_push($errors, "Email đã tồn tại, mời bạn đổi!");
	}
	if (count($errors) == 0) {
		$pass = md5($password);
		insert_member($member_name, $email, $pass, $member_level, $phone, $address);
		// $_SESSION['member'] = "Tạo tài khoản thành công";
		header("location: " . ROOT . "?page=login");
		die;
	}
}

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
                 <div style="display: flex; color:red;">
                 <h4 id="dangnhap" style="margin-right:20px">Đăng Nhập</h4><h4 id="dangky">Đăng Ký</h4>
                 </div>
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
                    <p class="or" style="color: #fff;">Hoặc đăng nhập bằng tài khoản của bạn</p>
                    <form action="" method="post" class="login">
                        <input type="text" name="email" placeholder="email">
                        <input type="text" name="password" placeholder="Password">
                   
                        <div class="save-lg">
                            <a href="<?=ROOT?>?page=re_password" style="color:#fff;">Quên Mật Khẩu?</a>
                        </div>
                        <button name="login" style="color: #fff;">Đăng Nhập</button>
                    </form>
                 
                </div>
                <div class="box-registered">
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
                    <p class="or"> Hoặc đăng ký tài khoản mới</p>
                    <form action="" method="post" class="login">
                        <input name="member_name" type="text" placeholder="Username or email">
                        <input name="password" type="text" placeholder="Password">
                        <input name="re_password" type="text" placeholder="Xác Nhận Password ">
                        <input name="email" type="text" placeholder="Email">
                        <input name="phone" type="text" placeholder="Phone ">
                       
                        <button name="registration">Đăng Ký</button>
                    </form>
                </div>
            </div>
    </main>

 