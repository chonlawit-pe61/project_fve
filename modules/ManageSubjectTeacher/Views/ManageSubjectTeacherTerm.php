<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm mb-2">
    <h1 class="mt-0"><u><b>เทอม</b></u></h1>
    <div class="my-3">
        <div class="row text-center justify-content-center">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        เทอมที่ 1
                        <div>
                            <a href="<?php echo base_url('ManageSubjectTeacher/Subject/Term/ListStudent?id=' . $_GET['id'] . '&term=1') ?>" class="btn btn-primary">ดูรายละเอียดเพิ่มเติม</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        เทอมที่ 2
                        <div>
                            <a href="<?php echo base_url('ManageSubjectTeacher/Subject/Term/ListStudent?id=' . $_GET['id'] . '&term=2') ?>" class="btn btn-primary">ดูรายละเอียดเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 my-3 mb-0">
                <a href="<?php echo base_url('ManageSubjectTeacher') ?>" class="btn btn-secondary">ย้อนกลับ</a>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>

</script>
<?php $this->endSection() ?>