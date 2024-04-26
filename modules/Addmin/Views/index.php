<?php

use Modules\Addmin\Controllers\Addmin;

 $this->extend('template/adminlayout') ?>

<?php $this->section('content'); ?>
<div class="pt-3 px-3" style="height:100vh;">
    <div class="px-3 py-3">
    <section class="narbet">
        <nav>
            <div class="container text-center">
                <a class="logo" href="index.php">
                    <!-- logo navber -->
                    <img src="<?php echo base_url("public/img/logofve.png") ?>" style="width: 250px; height:250px;">
                </a>
            </div>
        </nav>
    </section>
    <!-- end Narber -->
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-center">
                <br>
                <div class="card-body">
                    <div class="d-flex justify-content-center" style="margin-top:50px;">
                        <form method="post" action="<?php echo base_url('Addmin/Addadmin') ?>">
                            <div style="margin-top:15px;">
                                <input class="control" type="text" placeholder="Firstname" name="firstname" required>
                                <input class="control" type="text" placeholder="Lastname" name="lastname" required><br><br>
                                <input class="control" type="text" placeholder="Username" name="user" required>
                                <input class="control" type="password" placeholder="Password" name="pass" required><br><br>
                        <label>สถานนะ</label>
                                <select class="t2 btn btn-danger dropdown-toggle" style="text-align: center;" name="statusstd">
                                    <?php  
                                        foreach($userlive as $ul){
                                            ?>
                                        <option value="<?php echo $ul['id'] ?>"><?php echo $ul['userlive_name'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                        <input type="submit" name="submit" value="บันทึกผู้ใช้งานใหม่" class="btn btn-success">
                        <a href="<?php echo base_url("home") ?>" class="btn btn-warning">ย้อนกลับสู่หน้าหลัก</a>
                            </div>   
                    </form>
                    </div>
                </div>     
            </div>
        </div>
    </div>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>


<script>
    $(document).ready(function() {
        $('#myTable').dataTable({});
    })
</script>
<?php $this->endSection() ?>