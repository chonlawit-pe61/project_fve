<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm mb-2">
    <h1 class="mt-0"><u><b>รายชื่อนักศึกษา</b></u></h1>
    <div class="my-3">
        <form action="<?php echo base_url('ManageSubjectTeacher/ManageGradeStudent') ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input type="hidden" name="term" value="<?php echo $_GET['term'] ?>">
            <table class="table">
                <thead>
                    <tr>
                        <td class="text-center">
                            ลำดับ
                        </td>
                        <td class="text-center">
                            ชื่อ-นามสกุล
                        </td>
                        <td>
                            ชั้นปีที่
                        </td>
                        <td>
                            สาขาวิชา
                        </td>
                        <td class="text-center">
                            คะแนน
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($student as $key => $std) {
                    ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $key + 1 ?>
                            </td>
                            <td class="text-center">
                                <?php
                                echo $std['student_name_th'] . ' ' . $std['student_lname_th'];
                                ?>
                            </td>
                            <td>
                                <?php echo $std['student_level'] ?>
                            </td>
                            <td>
                                <?php echo $std['department_name'] ?>
                            </td>
                            <td class="text-center">

                                <input type="text" class="form-control" value="<?php echo $std['grade_student'] ? $std['grade_student'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>]">
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button class="btn btn-success">บันทึก</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>

</script>
<?php $this->endSection() ?>