<?php
  if(isset($_POST['btn'])){
    extract($_REQUEST);
    insert_letter($letter_name,$letter_email,$letter_title,$letter_content);
    header('Location:' . ROOT . '?page=contact');
    die();
  }
?>
  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="<?=ROOT?>">Trang chủ</a></span> <span>Trang liên hệ</span></p>
          <h1 class="mb-0 bread">Liên hệ chúng tôi</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Địa chỉ:</span> Cao đẳng FPT Polyteachnic phố Trịnh Văn Bô, Hà Nội</p>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Điện thoại:</span> <a href="tel://1234567920">+84 12345678</a></p>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Mail:</span> <a href="mailto:info@yoursite.com">team8drink@edu.com</a></p>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Website</span> <a href="#">team8drink.com</a></p>
          </div>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form action="" method="POST" class="bg-white p-5 contact-form">
              <div class="form-group">
                  <label for="">Gửi ý kiến cho chúng tôi</label>
                </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Tên của bạn" name="letter_name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Email của bạn" name="letter_email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Tiêu đề" name="letter_title">
            </div>
            <div class="form-group">
              <textarea id="" cols="30" rows="7" class="form-control" placeholder="Lời nhắn" name="letter_content"></textarea>
            </div>
            <div class="form-group" style="text-align: center;" onclick="return confirm('Bạn đã gửi thành công!')">
              <input type="submit" value="Gửi cho chúng tôi" class="btn btn-primary py-3 px-5" name="btn"  >
            </div>
          </form>

        </div>

        <div class="col-md-6 d-flex" style="text-align: center;">
         
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639810460504!2d105.74459305056386!3d21.03812778592463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1szh-TW!2s!4v1596823025498!5m2!1szh-TW!2s" width="600" height="650" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       
        </div>
      </div>
    </div>
  </section>