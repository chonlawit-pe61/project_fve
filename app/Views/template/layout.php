<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Ved Fve Home Page</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" href="img/logofve.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <! <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/adminlte.min.css') ?> ">
    <link rel="stylesheet" href="<?php echo base_url('public/css/skin.min.css') ?> ">
    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/dataTables.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/select2.min.css') ?>">
</head>

<body class="skin-blue">
    <div class="wrapper">
        <header class="main-header">
            <a href="./index.php" class="logo">
                <span class="logo-mini" style="margin-top:5%;"><b>M-Place</b></span>
                <span class=""><b><img src="<?php echo base_url('public/img/Header.png') ?> " width="210"></b></span>
            </a>
            <nav class="navbar ">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left info">
                        </a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><b style="font-size: 20px; color: #fff;">งานทะเบียน</b></li>
                    <li><a href="<?php echo base_url('/Student/create') ?>" class="nav-link"><i class="fa-solid fa-address-card" style="color: black; font-size: 20px;"> เพิ่มรายชื่อนักศึกษา</i></a></li>


                    <li><a href="<?php echo base_url('/Student/') ?>" class="nav-link"><i class="fa-solid fa-magnifying-glass" style="color: black; font-size: 20px;"> ดูรายชื่อนักศึกษา</i></a></li>
                    <li><a href="register.php"><i class="fa-solid fa-user-plus" style="color: black; font-size: 20px;"> เพิ่มเจ้าหน้าที่</i></a></li>
                </ul>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><b style="font-size: 20px; color: #fff;">งานหลักสูตร</b></li>
                    <li><a href="" class="nav-link"><i class="fa-solid fa-pen-to-square" style="color: black; font-size: 20px;"> เพิ่มรายวิชา</i></a></li>
                    <li><a href="" class="nav-link"><i class="fa-solid fa-magnifying-glass" style="color: black; font-size: 20px;"> ดูรายวิชา</i></a></li>
                </ul>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><b style="font-size: 20px; color: #fff;">งานวัดผล</b></li>
                    <li><a href=""><i class="fa-solid fa-magnifying-glass" style="color: black; font-size: 20px;"> ดูผลการเรียน</i></a></li>
                    <li class="header"><b style="font-size: 20px; color: #fff;"></b></li>
                    <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color: black; font-size: 20px;"> ออกจากระบบ</i></a></li>
                    <li class="header"><b style="font-size: 20px; color: #fff;"></b></li>
                </ul>
            </section>
        </aside>
    </div>
    <div class="content-wrapper">
        <?php $this->renderSection('content'); ?>
    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('public/js/adminlte.min.js') ?> "></script>
    <script src="<?php echo base_url('public/js/dataTables.min.js') ?> "></script>
    <script src="<?php echo base_url('public/js/functioninvoiceprint.js') ?> "></script>
    <script src="<?php echo base_url('public/js/select2.min.js') ?> "></script>
    <script src="<?php echo base_url('public/js/functiondeleteroom.js') ?> "></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <?php $this->renderSection('scripts'); ?>
</body>

</html>