<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm mb-2">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="mt-0 mb-0"><u><b>รายชื่อนักศึกษา</b></u></h1>
        </div>



        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            PDF
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เลือกบุคลากร</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">หัวหน้าแผนกวิชา</label>
                                <select id="consider_1" class="form-select" aria-label="Default select example">
                                    <option value="0">เลือกหัวหน้าแผนก</option>
                                    <?php
                                    if (!empty($getTeacherListAll)) {
                                        foreach ($getTeacherListAll as $teacher) {
                                    ?>
                                            <option value="<?php echo @$teacher['id'] ?>">
                                                <?php echo @$teacher['firstname'] . ' ' . @$teacher['lastname'] ?>
                                            </option>

                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">รองผู้อำนวยการฝ่ายวิชาการ</label>
                                <select id="consider_2" class="form-select" aria-label="Default select example">
                                    <option value="0">เลือกรองผู้อำนวยการฝ่ายวิชาการ</option>
                                    <?php
                                    if (!empty($getTeacherListAll)) {
                                        foreach ($getTeacherListAll as $teacher) {
                                    ?>
                                            <option value="<?php echo @$teacher['id'] ?>">
                                                <?php echo @$teacher['firstname'] . ' ' . @$teacher['lastname'] ?>
                                            </option>

                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button onclick="RedirectToExport()" class="btn btn-primary">
                            ตกลง
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <h5>
                    วิชา <?php echo $subject['name'] ?>
                </h5>
            </div>

            <div class="col-lg-12">
                <h5>
                    รหัสวิชา <?php echo $subject['subjects_id'] ?>
                </h5>
            </div>
        </div>
    </div>

    <div class="text-start">

        <div class="row mt-3">
            <div class="col-lg-3 ms-auto ">
                <form action="<?php echo base_url("ManageSubjectTeacher/Subject/Term/ListStudent") ?>" method="get">
                    <input type="hidden" name="id" id="subject_id" value="<?php echo $subject_id ?>">
                    <input type="hidden" id="subject_id_plan" value="<?php echo $subject['id'] ?>">
                    <input type="hidden" name="term" id="term" value="<?php echo $term ?>">
                    <select id="year" class="form-select" aria-label="Default select example" name="year" onchange="this.form.submit()">
                        <option value="0">เลือกปีการศึกษา</option>
                        <?php
                        for ($i = date('Y') + 10; $i >= date('Y') - 10; $i--) { ?>
                            <option <?php echo $year == $i ? 'selected' : '' ?> value="<?php echo $i ?>">ปีการศึกษา <?php echo $i + 543 ?></option>
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
                            <input type="text" class="form-control" name="max_affective" value="<?php echo $plan_student['max_affective'] ?>">
                        </td>
                        <td class="text-center" style="width: 10%;">
                            ภาระงาน
                            <input type="text" class="form-control" name="max_work" value="<?php echo $plan_student['max_work'] ?>">
                        </td>
                        <td class="text-center" style="width: 10%;">
                            ทดสอบ
                            <input type="text" class="form-control" name="max_test" value="<?php echo $plan_student['max_test'] ?>">
                        </td>
                        <td class="text-center" style="width: 10%;">
                            คะแนนสอบกลางภาค
                            <input type="text" class="form-control" name="max_midterm_exam" value="<?php echo $plan_student['max_midterm_exam'] ?>">
                        </td>
                        <td class="text-center" style="width: 12%;">
                            คะแนนสอบปลายภาค
                            <input type="text" class="form-control" name="max_final_exam" value="<?php echo $plan_student['max_final_exam'] ?>">
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
                                <input type="text" class="form-control" value="<?php echo $std['affective'] ? $std['affective'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>][affective]">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control" value="<?php echo $std['work'] ? $std['work'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>][work]">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control" value="<?php echo $std['test'] ? $std['test'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>][test]">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control" value="<?php echo $std['midterm_exam'] ? $std['midterm_exam'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>][midterm_exam]">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control" value="<?php echo $std['final_exam'] ? $std['final_exam'] : '' ?>" name="student[<?php echo $std['plan_student_id'] ?>][final_exam]">
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
    const RedirectToExport = () => {
        let consider_1 = $('#consider_1').val();
        let consider_2 = $('#consider_2').val();
        let year = $('#year').val();
        let term = $('#term').val();
        let subject_id = $('#subject_id').val();
        let subject_id_plan = $('#subject_id_plan').val();
        window.open("<?php echo base_url('ManageSubjectTeacher/exportPDFStudent?consider=') ?>" + consider_1 + '&year=' + year + '&term=' + term + '&plan=' + subject_id + '&subject_id_plan=' + subject_id_plan + '&consider_2=' + consider_2, "_blank");
    }
</script>
<?php $this->endSection() ?>