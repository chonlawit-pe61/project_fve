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
    <section class="py-3 py-md-5 py-xl-8 " style="height: 100vh;background-color: #800000;">
        <div class=" container h-100 ">
            <div class=" row gy-4 align-items-center h-100">
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="d-flex justify-content-center ">
                        <div class="col-12 col-xl-9">
                            <img class="img-fluid rounded" loading="lazy" src="<?php echo base_url('public/img/backgroudLogo.png') ?>" width="245" height="80" alt="BootstrapBrain Logo">
                            <hr class="border-primary-subtle mb-4 hr  " style="color: white;">
                            <h2 class="h1 mb-0 text-white">วิทยาลัยการอาชีพฝาง.</h2>
                            <span class="text-white">FANG INDUSTRIAL AND COMMUNITY EDUCATION COLLEGE</span>
                            <p class="lead mt-3 mb-5 text-white">ส่งเสริมนักศึกษา สร้างการเรียนรู้ สรรค์สร้างนวัตกรรมใหม่.</p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-5">
                    <div class="card border-0 rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <h3>เข้าสู่ระบบ</h3>
                                    </div>
                                </div>
                            </div>
                            <form action="<?php echo base_url('/login') ?>" method="post">
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="" required>
                                            <label for="email" class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg" type="submit">เข้าสู่ระบบ</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                                        <a href="#!">สมัครสมาชิก</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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