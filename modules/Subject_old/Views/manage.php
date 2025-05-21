<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<form action="<?= base_url('subjects_old/save') ?>" method="POST">
    <input type="hidden" name="id" value="<?= @$data['id'] ?>">
    <div class="p-3 border shadow-sm">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h3>จัดการรายวิชา (โรงเรียนเก่า)</h3>
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
                <input type="text" class="form-control" name="teacher_name" value="<?= @$data['teacher_name'] ?>">
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
            <div class="col-md-3 mb-3">
                <label for="hour">หมายเหตุ</label>
                <div class="input-group">
                    <input type="text" id="hour" name="comment" class="form-control" value="<?= @$data['comment'] ?>">
                </div>
            </div>
            <div class="col-md-12 text-center mb-3">
                <button type="submit" class="btn btn-success">บันทึก</button>
                <a href="<?= base_url('subjects_old') ?>" class="btn btn-danger">กลับ</a>
            </div>
        </div>
    </div>
</form>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>

<?php $this->endSection(); ?>