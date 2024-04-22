<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Teacher Fve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('public/css/index.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="icon" href="img/logofve.png">

</head>

<body>
    <section class="narbet">
        <nav>
            <div class="container ">
                <a class="logo">
                    <!-- logo navber -->
                    <img src="<?php echo base_url('public/img/Header.png') ?>" width="35%" height="15%">
                </a>
            </div>
        </nav>
    </section>
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-center">
                <br>
                <div class="card-body">
                    <div class="d-flex justify-content-center" style="margin-top:50px;">
                        <form id="CheckSubmit" method="post" action="<?php echo base_url('/login') ?>">
                            <img src="<?php echo base_url('public/img/logofve.png') ?>" alt="Avatar" width="200">
                            <div style="margin-top:15px;">
                                <input class="control" type="text" placeholder="Username" name="user" required>
                                <input class="control" type="password" placeholder="Password" name="pass" required><br><br>
                                <input type="submit" name="submit" value="เข้าสู่ระบบ" class="btn btn-success">
                                <!-- <a href="register.php" class="btn btn-warning">สมัครสมาชิก</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- star footer -->
    <footer class="footer fixed-bottom koh">
        <div>
            <h4>พัฒนาเว็บไซต์โดย</h4>
            <span>
                <h5>นาย นฤเบศ สอนง่าย / นายวชิรวิทย์ โปธิตา</h5>
            </span>
            <span>
                <h6>ครูประจำแผนกวิชา คอมพิวเตอร์ธุรกิจ</h6>
            </span>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <?php if (session()->getFlashdata('msg') != null) : ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: '<?= session()->getFlashdata('msg') ?>',
                timer: 2000,
            })
        </script>
    <?php endif; ?>

</body>

</html>