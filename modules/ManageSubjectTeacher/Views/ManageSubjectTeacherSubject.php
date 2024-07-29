<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm mb-2">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="mt-0 mb-0"><u><b>รายชื่อนักศึกษา</b></u></h1>
        </div>
        <a href="<?php echo base_url('ManageSubjectTeacher/exportPDFStudent') ?>" target="_blank" class="btn btn-secondary">
            PDF
        </a>
    </div>

    <div class="text-start">

        <div class="row mt-3">
            <div class="col-lg-3 ms-auto ">
                <form action="<?php echo base_url("ManageSubjectTeacher/Subject/Term/ListStudent") ?>" method="get">
                    <input type="hidden" name="id" value="<?php echo $subject_id ?>">
                    <input type="hidden" name="term" value="<?php echo $term ?>">
                    <select class="form-select" aria-label="Default select example" name="year" onchange="this.form.submit()">
                        <option value="0">เลือกปีการศึกษา</option>
                        <?php
                        for ($i = date('Y') + 10; $i >= date('Y') - 10; $i--) { ?>
                            <option <?php echo $_GET['year'] == $i ? 'selected' : '' ?> value="<?php echo $i ?>">ปีการศึกษา <?php echo $i + 543 ?></option>
                        <?php } ?>
                    </select>
                </form>
            </div>
        </div>
    </div>
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
                        <td class="text-center" style="width: 10%;">
                            จิตพิสัย
                        </td>
                        <td class="text-center" style="width: 10%;">
                            ภาระงาน
                        </td>
                        <td class="text-center" style="width: 10%;">
                            ทดสอบ
                        </td>
                        <td class="text-center" style="width: 10%;">
                            คะแนนสอบกลางภาค
                        </td>
                        <td class="text-center" style="width: 12%;">
                            คะแนนสอบปลายภาค
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
                            <td class="text-center">
                                <input type="text" class="form-control" value="<?php echo $std['grade_student'] ? $std['grade_student'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>]">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control" value="<?php echo $std['grade_student'] ? $std['grade_student'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>]">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control" value="<?php echo $std['grade_student'] ? $std['grade_student'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>]">
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