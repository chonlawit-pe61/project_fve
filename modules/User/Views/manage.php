<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<form action="<?= base_url('users/save') ?>" method="POST">
    <input type="hidden" name="id" value="<?= @$data['id'] ?>">
    <div class="p-3 border shadow-sm">
        <div class="row">
            <div class="col-md-12">
                <h3>เพิ่มข้อมูลบุคลากร</h3>
            </div>
            <div class="col-md-3">
                <label for="">ประเภท</label>
                <select name="role_id" id="" class="form-select">
                    <option value="">เลือก</option>
                    <?php
                    foreach ($roles as $key => $role) {
                    ?>
                        <option value="<?= $role['id'] ?>" <?= (@$data['role_id'] == $role['id']) ? 'selected' : '' ?>><?= $role['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">คำนำหน้า</label>
                <select name="prename_id" id="prename_id" class="form-select">
                    <option value="">เลือก</option>
                    <?php foreach($prenames as $row) { ?>
                        <option value="<?= $row['prename_id'] ?>" <?= (@$data['prename_id'] == $row['prename_id']) ? 'selected' : '' ?>><?= $row['prename_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">ชื่อ</label>
                <input type="text" name="firstname" id="" class="form-control" value="<?= @$data['firstname'] ?>">
            </div>
            <div class="col-md-3">
                <label for="">นามสกุล</label>
                <input type="text" name="lastname" id="" class="form-control" value="<?= @$data['lastname'] ?>">
            </div>
            <div class="col-md-3">
                <label for="">แผนก</label>
                <select name="department_id" id="department_id" class="form-select">
                    <option value="">เลือก</option>
                    <?php foreach($departments as $key => $dep) { ?>
                        <option value="<?= $dep['department_id'] ?>" <?= (@$data['department_id'] == $dep['department_id']) ? 'selected' : '' ?>><?= $dep['department_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">ชื่อผู้ใช้งาน</label>
                <input type="text" name="username" id="" class="form-control" value="<?= @$data['username'] ?>">
            </div>
            <div class="col-md-3">
                <label for="">รหัสผ่าน</label>
                <input type="password" name="password" id="" class="form-control" value="<?= @$data['password'] ?>" >
            </div>
            <div class="col-md-12 pt-3 text-center">
                <button type="submit" class="btn btn-primary">
                    บันทึก
                </button>
                <a href="<?= base_url('users') ?>" class="btn btn-danger">
                    กลับ
                </a>
            </div>
        </div>
    </div>
</form>
<?php $this->endSection() ?>