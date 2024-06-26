<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<form action="<?= base_url('subjects/save') ?>" method="POST">
    <input type="hidden" name="id" value="<?= @$data['id'] ?>">
    <div class="p-3 border shadow-sm">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h3>จัดการรายวิชา</h3>
            </div>
            <div class="col-md-3 mb-3">
                <label for="group_id">หมวดวิชา</label>
                <select name="group_id" id="group_id" class="form-select">
                    <option value="">เลือก</option>
                    <?php foreach ($subject_group as $group) { ?>
                        <option value="<?= $group['id'] ?>" <?= (!empty($data) && $data['group_id'] == $group['id']) ? 'selected' : '' ?>><?= $group['group_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="">รหัสวิชา</label>
                <input type="text" id="name" name="subjects_id" class="form-control" value="<?= @$data['subjects_id'] ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="">ชื่อวิชา</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= @$data['name'] ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="">อาจารย์ผู้สอน</label>
                <select class="form-select" name="teacher_id" aria-label="Default select example">
                    <option value="0">เลือกอาจารย์ผู้สอน</option>
                    <?php
                    if (!empty($getTeacherListAll)) {
                        foreach ($getTeacherListAll as $teacher) {
                    ?>
                            <option <?php echo $data['teacher_id'] == $teacher['id'] ? 'selected' : '' ?> value="<?php echo $teacher['id'] ?>">
                                <?php echo $teacher['firstname'] . ' ' . $teacher['lastname'] ?>
                            </option>

                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="">หน่วยกิต</label>
                <div class="input-group">
                    <input type="text" id="unit" name="unit" class="form-control" value="<?= @$data['unit'] ?>">
                    <span class="input-group-text">หน่วยกิต</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="lecture_unit">ทฤษฏี (หน่วยกิต)</label>
                <div class="input-group">
                    <input type="text" id="lecture_unit" name="lecture_unit" class="form-control" value="<?= @$data['lecture_unit'] ?>">
                    <span class="input-group-text">หน่วยกิต</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="practical_unit">ปฏิบัติ (หน่วยกิต)</label>
                <div class="input-group">
                    <input type="text" id="practical_unit" name="practical_unit" class="form-control" value="<?= @$data['practical_unit'] ?>">
                    <span class="input-group-text">หน่วยกิต</span>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="hour">ชั่วโมง</label>
                <div class="input-group">
                    <input type="text" id="hour" name="hour" class="form-control" value="<?= @$data['hour'] ?>">
                    <span class="input-group-text">ชั่วโมง</span>
                </div>
            </div>
            <div class="col-md-12 text-center mb-3">
                <button type="submit" class="btn btn-success">บันทึก</button>
                <a href="<?= base_url('subjects') ?>" class="btn btn-danger">กลับ</a>
            </div>
        </div>
    </div>
</form>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>

<?php $this->endSection(); ?>