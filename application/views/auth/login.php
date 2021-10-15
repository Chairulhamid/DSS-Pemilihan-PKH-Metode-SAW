<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login SPK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="" >
       <!-- Custom Theme Style -->
    <link href="<?= base_url('assets'); ?>/build/css/custom.min.css" rel="stylesheet">
</head>
<body>
    <section class="main">
        <!-- Image -->
        <div class="main-img">
            <img src="images/kementerian-sosial.png" alt="">
        </div>
        <!-- text and buttons -->
        <div class="text-btns">
            <p>Sistem Pendukung Keputusan Penerima PKH</p>
            
            <!-- <div>
                           <a href="<?= base_url('auth'); ?>" class="primary-btn2 mb-3 mb-sm-0">Hitung Nilai Siswa</a>
                           <a href="<?= base_url('LaporanPdf/index'); ?>" class="primary-btn ml-sm-3 ml-0">Download Hasil</a>
                       </div> -->
            <!-- <div class="btns">
                <button class="login-btn1">Data Penduduk</button>
                <button class="login-btn1">Data Penerima PKH</button>
               
            </div> -->
            <!-- login signup buttons -->
            <!-- login with social links -->
            <span>SIGN IN??</span>
            <!-- social icons -->
            <div class="via-social">
                <div class="btns">
                    <button class="login-btn">Login</button>
                    <br>
                    <button class="signup-btn">Sign Up</button>
                
                </div>
            </div>
        </div>

        <!-- section login side bar -->
        <div class="side-login">
            <!-- cancel btn -->
            <a href="#" class="login-cancel-btn">
                <i class="fas fa-arrow-left"></i>
            </a>
            <!-- headeing -->
            <strong><i class="fa fa-graduation-cap"></i> Sign In</strong>
            <!-- form -->
          <form action="<?= base_url('auth'); ?>" method="POST">
                <!-- email -->
               
                <label for="">Email<samp>*</samp></label>
                <div class="email">
                    <i class="far fa-paper-plane"></i>
                    <input type="email" name="email" placeholder="Masukan Email..." required>
                </div>
                <!-- password -->
                <label for="">Password<samp>*</samp></label>
                <div class="password">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Masukan Password..." required>
                </div>
                <!-- login btn -->
                <input type="submit" name="login" value="Login" class="login">
                <!-- forget password -->
                <!-- <a href="https://i.ytimg.com/vi/DOJGwFgjpmw/maxresdefault.jpg" class="forget">Forget your password?</a> -->
            </form>
            <!-- relative bottom text -->
            <div class="relative-text">
                <span>Hello and Welcome</span>
                <p>lets go!!.</p>
                <p>SIGN IN Sistem Pendukung Keputusan Penerima Bantuan Program Keluarga harapan Nagari Padang Lua.</p>
            </div>
        </div>

         <!-- section sign up side bar -->
         <div class="side-sign-up">
            <!-- cancel btn -->
            <a href="#" class="sign-up-cancel-btn">
                <i class="fas fa-arrow-left"></i>
            </a>
            <!-- headeing -->
            <strong><i class="fa fa-graduation-cap"></i>  Sign Up</strong>
            <!-- form -->
            
             <form action="<?= base_url('auth/daftar'); ?>" method="POST">
                <!-- Fullname -->
                <label for="">Full Name<samp>*</samp></label>
                <div class="fullname">
                    <i class="far fa-user"></i>
                    <input type="text" name="nama" placeholder="Masukan Nama Panjang..." required>
                </div>
                <!-- email -->
                <label for="">Email<samp>*</samp></label>
                <div class="email">
                    <i class="far fa-paper-plane"></i>
                    <input type="email" name="email" placeholder="Masukan Email..." required>
                </div>
                <!-- password -->
                <label for="">Password<samp>*</samp></label>
                <div class="password">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password1" placeholder="Masukan Password..." required>
                </div>
                  <!-- Confirm password -->
                  <label for="">Confirm Password<samp>*</samp></label>
                  <div class="password">
                      <i class="fas fa-lock"></i>
                      <input type="password" name="password2" placeholder="Ulangi Password..." required>
                  </div>
                <!-- login btn -->
                 <div>
                            <button type="submit" class="signup btn btn-default submit">Daftar</button>
                        </div>
                <!-- <input type="submit" name="signup" value="Sign Up" class="signup"> -->
            </form>
            <!-- relative bottom text -->
            <div class="relative-text">
                <span>Come and Join Us</span>
               
            </div>
        </div>
    </section>

    <script src="js/main.js"></script>
</body>
</html>