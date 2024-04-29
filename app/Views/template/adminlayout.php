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

<?php $this->renderSection('style'); ?>;

<body class="skin-blue">
    <div class="wrapper">
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
        <div>
            <?php $this->renderSection('content'); ?>
        </div>
    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('public/js/adminlte.min.js') ?> "></script>
    <script src="<?php echo base_url('public/js/dataTables.min.js') ?> "></script>
    <script src="<?php echo base_url('public/js/functioninvoiceprint.js') ?> "></script>
    <script src="<?php echo base_url('public/js/select2.min.js') ?> "></script>
    <script src="<?php echo base_url('public/js/functiondeleteroom.js') ?> "></script>

    <?php $this->renderSection('scripts'); ?>
</body>

</html>