<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm">
    <div class="row">
        <div class="col-md-12">
            <h3 class="float-left">กำหนดรายวิชา</h3>
            <a href="<?= base_url('SettingSubject/manage'); ?>" class="btn btn-success float-right">เพิ่ม</a>
        </div>
        <div class="col-md-12 mt-3">
            <table id="subjects-tbl" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">ชื่อแผน</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>