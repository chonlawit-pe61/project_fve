<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('public/img/logofve.png') ?>">
    <title>Pre-Ved Fve Home Page</title>
    <link rel="stylesheet" href="<?php echo base_url('public/css/css.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css.map') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/font-awesome.min.css') ?>">

    <link rel="icon" href="img/logofve.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/dataTables.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/select2.min.css') ?>">
</head>
<style>
    .app-brand a {
        height: 90px;
    }

    .form-select {
        line-height: 1.9;
    }

    .sidebar {
        overflow: scroll;
    }

    .child {
        padding: 1rem 1.5rem;
        line-height: 20px;
        color: #bfc7d9;
        display: block;
        text-decoration: none;
        text-transform: capitalize;
        font-size: 1rem;
        font-weight: 400;
        white-space: nowrap;
    }
</style>
<?php
$Setting_1 =  array('ManageTypePerson', 'ManagePrename');

?>

<body class="navbar-fixed sidebar-fixed" id="body">
    <div class="wrapper">
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?php echo base_url('home') ?>">
                            <img class="img-fluid" src="<?php echo base_url('public/img/Header.png') ?>" alt="Mono">
                        </a>

                    </div>

                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <ul class="nav sidebar-inner " id="sidebar-menu">
                        <?php
                        if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
                        ?>
                            <li class="section-title text-white">
                                งานทะเบียน
                            </li>
                            <li class="<?php echo uri_string() == 'Student/create' ? 'active' : '' ?>">
                                <a class="sidenav-item-link" href="<?php echo base_url('/Student/create') ?>">
                                    <!-- <i class="mdi mdi-wechat"></i> -->
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    <span class="nav-text">เพิ่มรายชื่อนักศึกษา </span>
                                </a>
                            </li>
                            <li class="<?php echo uri_string() == 'Student' ? 'active' : '' ?>">
                                <a class="sidenav-item-link" href="<?php echo base_url('Student/') ?>">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="nav-text">ดูรายชื่อนักศึกษา</span>
                                </a>
                            </li>
                            <li class="<?= uri_string() == 'users' ? 'active' : '' ?>">
                                <a class="sidenav-item-link" href="<?= base_url('users') ?>">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    <span class="nav-text">บุคลากร</span>
                                </a>
                            </li>
                            <li class="<?= uri_string() == 'subjects' ? 'active' : '' ?>">
                                <a class="dropdown-link-item" href="<?php echo base_url('subjects') ?>">
                                    <i class="fa-solid fa-book"></i>
                                    <span>รายวิชา</span>
                                </a>
                            </li>
                            <li class="<?= uri_string() == 'subjects_old' ? 'active' : '' ?>">
                                <a class="dropdown-link-item" href="<?php echo base_url('subjects_old') ?>">
                                    <i class="fa-solid fa-book"></i>
                                    <span>รายวิชา(จากโรงเรียนเก่า)</span>
                                </a>
                            </li>
                            <li class="<?= uri_string() == 'SettingSubject' ? 'active' : '' ?>">
                                <a class="dropdown-link-item" href="<?php echo base_url('SettingSubject') ?>">
                                    <!-- <i class="fa-solid fa-book"></i> -->
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <span>กำหนดรายวิชา</span>
                                </a>
                            </li>
                            <li class="<?= uri_string() == 'ManageSubjectStd' ? 'active' : '' ?>">
                                <a class="dropdown-link-item" href="<?php echo base_url('ManageSubjectStd') ?>">
                                    <!-- <i class="fa-solid fa-book"></i> -->
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <span>กำหนดรายวิชาให้นักเรียน</span>
                                </a>
                            </li>
                            <li class="<?= uri_string() == 'ManageSubjectTeacher' ? 'active' : '' ?>">
                                <a class="dropdown-link-item" href="<?php echo base_url('ManageSubjectTeacher') ?>">
                                    <!-- <i class="fa-solid fa-book"></i> -->
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <span>กรอกคะแนนในรายวิชา</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#submenu1" role="button" aria-expanded="false" aria-controls="submenu1">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="nav-text">เครื่องมือ</span>
                                </a>
                                <div class="collapse" id="submenu1">
                                    <ul class="nav flex-column submenu">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('Manage/ManageTypePerson') ?>" class="nav-link dropdown-link-item text-white child">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                                <span class="mx-1">ประเภทบุคลากร</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('Manage/ManagePrename') ?>" class="nav-link dropdown-link-item text-white child">
                                                <i class="fa fa-tag" aria-hidden="true"></i>
                                                <span class="mx-1">คำนำหน้า</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('Manage/SubjectType') ?>" class="nav-link dropdown-link-item text-white child">
                                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                <span class="mx-1">หมวดวิชา</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('Manage/ManagesubjectCatagory') ?>" class="nav-link dropdown-link-item text-white child">
                                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                <span class="mx-1">หมวดสาขาวิชา</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        <?php
                        } else {
                        ?>
                            <?php
                            if ($_SESSION['role_id'] == 3) {
                            ?>
                                <li class="<?php echo uri_string() == 'Student' ? 'active' : '' ?>">
                                    <a class="sidenav-item-link" href="<?php echo base_url('Student/') ?>">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="nav-text">ดูรายชื่อนักศึกษา</span>
                                    </a>
                                </li>
                                <li class="<?= uri_string() == 'ManageSubjectTeacher' ? 'active' : '' ?>">
                                    <a class="dropdown-link-item" href="<?php echo base_url('ManageSubjectTeacher') ?>">
                                        <!-- <i class="fa-solid fa-book"></i> -->
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <span>กรอกคะแนนในรายวิชา</span>
                                    </a>
                                </li>
                            <?php
                            } else if ($_SESSION['role_id'] == 4) {
                            ?>
                                <li class="<?= uri_string() == 'ManageSubjectTeacher' ? 'active' : '' ?>">
                                    <a class="dropdown-link-item" href="<?php echo base_url('ManageSubjectTeacher') ?>">
                                        <!-- <i class="fa-solid fa-book"></i> -->
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <span>กรอกคะแนนในรายวิชา</span>
                                    </a>
                                </li>
                            <?php
                            } else if ($_SESSION['role_id'] == 5) {
                            ?>
                                <li class="<?php echo uri_string() == 'Student/create' ? 'active' : '' ?>">
                                    <a class="sidenav-item-link" href="<?php echo base_url('Student/StudentSubject') ?>">
                                        <!-- <i class="mdi mdi-wechat"></i> -->
                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                        <span class="nav-text"> รายวิชาที่ศึกษา</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                        <?php
                        }
                        ?>
                        <li>
                            <a class="dropdown-link-item" href="<?php echo base_url('logout') ?>">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <span class="nav-text">ออกจากระบบ</span>
                            </a>
                        </li>
                    </ul>

                </div>


            </div>
        </aside>
        <div class="page-wrapper">
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <div class="p-3">
                        <i class="fa fa-align-justify" onclick="ShowNav()" style="font-size: 25px; cursor: pointer;" aria-hidden="true"></i>
                    </div>
                    <span class="page-title"></span>
                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user-menu">
                                <div class="text-center">
                                    <img src="<?php echo base_url('public/img/User.png') ?>" class="user-image rounded-circle" alt="User Image" />
                                    <span class="d-none d-lg-inline-block"><?= session()->get('name') . ' ' . session()->get('lname') ?></span>
                                </div>

                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper">
                <div class="content">
                    <?php $this->renderSection('content'); ?>
                </div>

            </div>
        </div>
    </div>



    <!-- <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo base_url('home') ?>" class="logo">
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
                    <li><a href="<?php echo base_url('/Addmin/') ?>"><i class="fa-solid fa-user-plus" style="color: black; font-size: 20px;"> เพิ่มเจ้าหน้าที่</i></a></li>
                </ul>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><b style="font-size: 20px; color: #fff;">งานหลักสูตร</b></li>
                    <li><a href="<?php echo base_url('/Addsubject/') ?>" class="nav-link"><i class="fa-solid fa-pen-to-square" style="color: black; font-size: 20px;"> เพิ่มรายวิชา</i></a></li>
                    <li><a href="" class="nav-link"><i class="fa-solid fa-magnifying-glass" style="color: black; font-size: 20px;"> ดูรายวิชา</i></a></li>
                </ul>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><b style="font-size: 20px; color: #fff;">งานวัดผล</b></li>
                    <li><a href="" class="nav-link"><i class="fa-solid fa-pen-to-square" style="color: black; font-size: 20px;"> เพิ่มผลการเรียน</i></a></li>
                    <li><a href=""><i class="fa-solid fa-magnifying-glass" style="color: black; font-size: 20px;"> ดูผลการเรียน</i></a></li>
                    <li class="header"><b style="font-size: 20px; color: #fff;"></b></li>
                    <li><a href="<?= base_url('/logout') ?>"><i class="fa-solid fa-arrow-right-from-bracket" style="color: black; font-size: 20px;"> ออกจากระบบ</i></a></li>
                    <li class="header"><b style="font-size: 20px; color: #fff;"></b></li>
                </ul>
            </section>
        </aside>
    </div> -->
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('public/js/adminlte.min.js') ?> "></script>
    <script src="<?php echo base_url('public/js/dataTables.min.js') ?> "></script>
    <script src="<?php echo base_url('public/js/select2.min.js') ?> "></script>

    <?php $this->renderSection('scripts'); ?>
    <script>
        let show = false;
        const ShowNav = () => {
            if (show) {
                $('#body').removeClass();
                $('#body').addClass('navbar-fixed sidebar-fixed sidebar-minified-out');

                show = false;
            } else {
                $('#body').removeClass();
                $('#body').addClass('navbar-fixed sidebar-fixed sidebar-minified');
                show = true;
            }
        }
        const HidNav = () => {
            $('#body').removeClass();
            $('#body').addClass('navbar-fixed sidebar-fixed sidebar-minified');
        }
    </script>
</body>

</html>