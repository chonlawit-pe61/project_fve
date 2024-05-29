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
                        <th width="">ชื่อแผน</th>
                        <td style="width: 20%;">
                            เครื่องมือ
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($plan_education as $key => $plan) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $key + 1 ?>
                            </td>
                            <td>
                                <?php echo $plan['plan_education_name'] ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('SettingSubject/manage/' . $plan['plan_education_id']) ?>" class="btn btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>