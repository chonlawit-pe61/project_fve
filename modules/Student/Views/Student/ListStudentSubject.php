<?php $this->extend('template/layout') ?>


<?php $this->section('style'); ?>;
<style>
    label {
        margin: 0px;
    }
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="pt-1 px-3">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-end">
                        <a target="_blank" href="<?php echo base_url('Student/exportProfileStudent') ?>" class="btn btn-success">PDF</a>
                    </div>
                    <div class="col-lg-12 text-center">
                        <img class="img-fluid" src="<?php echo base_url('public/files/imgStd/' . $student['student_img']) ?>" alt="">
                    </div>
                    <div class="col-lg-12 ">
                        <div class="container ">
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12 text-start">
                                            ชื่อ-นามสกุล <?php echo @$student['student_name_th'] . ' ' . @$student['student_lname_th'] ?> ชื่อเล่น <?php echo @$student['student_nickname']  ?>
                                        </div>
                                        <div class="col-lg-12 text-start">
                                            ที่อยู่ <?php echo @$student['student_address'] . ' หมู่ ' . @$student['student_moo'] . ' จังหวัด ' . @$student['std_province'] . ' อำเภอ ' . @$student['std_district'] . ' จังหวัด ' . @$student['std_subdistrict']  ?>
                                        </div>
                                        <div class="col-lg-12 text-start">
                                            เบอร์ติดต่อนักศึกษา <?php echo @$student['student_phone'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 text-end">
                                <div class="col-lg-3 ms-auto">
                                    <form action="<?php echo base_url("Student/StudentSubject") ?>" method="get">
                                        <select class="form-select" aria-label="Default select example" name="year" onchange="this.form.submit()">
                                            <option value="<?php echo date('Y') ?>">เลือกปีการศึกษา</option>
                                            <?php
                                            for ($i = date('Y') + 10; $i >= date('Y') - 10; $i--) { ?>
                                                <option <?php echo $_GET['year'] == $i ? 'selected' : '' ?> value="<?php echo $i ?>">ปีการศึกษา <?php echo $i + 543 ?></option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (!empty($student_subject)) {
                    ?>
                        <div class="container">
                            <div class="col-lg-12 mt-2">
                                <b>
                                    รายวิชาที่ศึกษาเทอม 1 (<?php echo $year + 543 ?>)
                                </b>
                            </div>
                            <div class="col-lg-12">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-center">ลำดับ</td>
                                            <td class="text-center">
                                                รหัสวิชา
                                            </td>
                                            <td class="text-center">
                                                ชื่อวิชา
                                            </td>
                                            <td class="text-center">
                                                ทฤษฎี
                                            </td>
                                            <td class="text-center">ปฏิบัติ</td>

                                            <td class="text-center">
                                                ชั่วโมง
                                            </td>

                                            <td class="text-center">
                                                หน่วยกิต
                                            </td>
                                            <td class="text-center">
                                                เกรด
                                            </td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($student_subject as $key => $row) {
                                            @$sum_unit1 += @$row['unit'];
                                            $result = $row['affective'] + $row['work'] + $row['test'] + $row['midterm_exam'] + $row['final_exam'];
                                            $textGrade1 = '';
                                            if (@$result > 80) {
                                                $textGrade1 = '4';
                                            } else if (@$result >= 75) {
                                                $textGrade1 = '3.5';
                                            } else if (@$result >= 70) {
                                                $textGrade1 = '3';
                                            } else if (@$result >= 65) {
                                                $textGrade1 = '2.5';
                                            } else if (@$result >= 60) {
                                                $textGrade1 = '2';
                                            } else if (@$result >= 55) {
                                                $textGrade1 = '1.5';
                                            } else if (@$result >= 50) {
                                                $textGrade1 = '1';
                                            } else if (@$result < 50) {
                                                $textGrade1 = '0';
                                            } else {
                                                $textGrade1 = '-';
                                            }

                                            @$sum_ResutlUnit1 += @$textGrade1 * $row['unit'];
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo @$key + 1 ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['subjects_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo @$row['name'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['lecture_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['practical_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['hour'] ?>
                                                </td>

                                                <td class="text-center">
                                                    <?php echo @$row['unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$textGrade1 ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" class="text-end">
                                                รวม
                                            </td>
                                            <td class="text-center">
                                                <?php echo @$sum_unit1 ?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                เกรดเฉลี่ยประจำภาคเรียน 1/<?php echo $year + 543 ?> = <?php echo @$sum_ResutlUnit1 / @$sum_unit1 ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (!empty($student_subject_old_1)) {
                    ?>
                        <div class="container">
                            <div class="col-lg-12 mt-2">
                                <b>
                                    รายวิชาที่ศึกษาเทอม 1 ปีการศึกษา (<?php echo $year + 543 ?>) สำหรับวิชาเก่าจากโรงเรียนเก่า
                                </b>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-center">ลำดับ</td>
                                            <td class="text-center">
                                                รหัสวิชา
                                            </td>
                                            <td class="text-center">
                                                ชื่อวิชา
                                            </td>
                                            <td class="text-center">
                                                ทฤษฎี
                                            </td>
                                            <td class="text-center">ปฏิบัติ</td>

                                            <td class="text-center">
                                                ชั่วโมง
                                            </td>

                                            <td class="text-center">
                                                หน่วยกิต
                                            </td>
                                            <td class="text-center">
                                                สถานนะ
                                            </td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($student_subject_old_1 as $key => $row) {
                                            @$sum_unit_old_1 += @$row['unit'];
                                            $result = $row['affective'] + $row['work'] + $row['test'] + $row['midterm_exam'] + $row['final_exam'];
                                            $textGrade1 = '';
                                            if (@$result > 80) {
                                                $textGrade1 = '4';
                                            } else if (@$result >= 75) {
                                                $textGrade1 = '3.5';
                                            } else if (@$result >= 70) {
                                                $textGrade1 = '3';
                                            } else if (@$result >= 65) {
                                                $textGrade1 = '2.5';
                                            } else if (@$result >= 60) {
                                                $textGrade1 = '2';
                                            } else if (@$result >= 55) {
                                                $textGrade1 = '1.5';
                                            } else if (@$result >= 50) {
                                                $textGrade1 = '1';
                                            } else if (@$result < 50) {
                                                $textGrade1 = '0';
                                            } else {
                                                $textGrade1 = '-';
                                            }

                                            @$sum_ResutlUnit1 += @$textGrade1 * $row['unit'];
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo @$key + 1 ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['subjects_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo @$row['name'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['lecture_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['practical_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['hour'] ?>
                                                </td>

                                                <td class="text-center">
                                                    <?php echo @$row['unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $textStatus = '';
                                                    if ($row['status'] == 1) {
                                                        $textStatus = 'ผ่าน';
                                                    } else if ($row['status'] == 2) {
                                                        $textStatus = 'ไม่ผ่าน';
                                                    } else  if ($row['status'] == 3) {
                                                        $textStatus = 'รอพิจารณา';
                                                    } else {
                                                        $textStatus = '-';
                                                    }
                                                    ?>
                                                    <?php echo $textStatus ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" class="text-end">
                                                รวม
                                            </td>
                                            <td class="text-center">
                                                <?php echo @$sum_unit_old_1 ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    <?php
                    }
                    ?>


                    <?php
                    if (!empty($student_subject2)) {
                    ?>
                        <div class="container">
                            <div class="col-lg-12 mt-5">
                                <b>
                                    รายวิชาที่ศึกษาเทอม 2 (<?php echo $year + 543 ?>)
                                </b>
                            </div>
                            <div class="col-lg-12">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-center">ลำดับ</td>
                                            <td class="text-center">
                                                รหัสวิชา
                                            </td>
                                            <td class="text-center">
                                                ชื่อวิชา
                                            </td>
                                            <td class="text-center">
                                                ทฤษฎี
                                            </td>
                                            <td class="text-center">ปฏิบัติ</td>

                                            <td class="text-center">
                                                ชั่วโมง
                                            </td>

                                            <td class="text-center">
                                                หน่วยกิต
                                            </td>
                                            <td class="text-center">
                                                สถานนะ
                                            </td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($student_subject2 as $key => $row) {
                                            @$sum_unit += @$row['unit'];

                                            @$textGrade = '';
                                            if (@$row['grade_student'] > 80) {
                                                $textGrade = '4';
                                            } else if (@$row['grade_student'] >= 75) {
                                                $textGrade = '3.5';
                                            } else if (@$row['grade_student'] >= 70) {
                                                $textGrade = '3';
                                            } else if (@$row['grade_student'] >= 65) {
                                                $textGrade = '2.5';
                                            } else if (@$row['grade_student'] >= 60) {
                                                $textGrade = '2';
                                            } else if (@$row['grade_student'] >= 55) {
                                                $textGrade = '1.5';
                                            } else if (@$row['grade_student'] >= 50) {
                                                $textGrade = '1';
                                            } else if (@$row['grade_student'] < 50) {
                                                $textGrade = '0';
                                            } else {
                                                $textGrade = '-';
                                            }
                                            @$sum_ResutlUnit += @$textGrade * @$row['unit'];
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo @$key + 1 ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['subjects_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo @$row['name'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['lecture_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['practical_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['hour'] ?>
                                                </td>

                                                <td class="text-center">
                                                    <?php echo @$row['unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$textGrade ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" class="text-end">
                                                รวม
                                            </td>
                                            <td class="text-center">
                                                <?php echo @$sum_unit ?>
                                            </td>
                                        </tr>

                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (!empty($student_subject_old_2)) {
                    ?>
                        <div class="container">
                            <div class="col-lg-12 mt-2">
                                <b>
                                    รายวิชาที่ศึกษาเทอม 2 ปีการศึกษา (<?php echo $year + 543 ?>) สำหรับวิชาเก่าจากโรงเรียนเก่า
                                </b>
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-center">ลำดับ</td>
                                            <td class="text-center">
                                                รหัสวิชา
                                            </td>
                                            <td class="text-center">
                                                ชื่อวิชา
                                            </td>
                                            <td class="text-center">
                                                ทฤษฎี
                                            </td>
                                            <td class="text-center">ปฏิบัติ</td>

                                            <td class="text-center">
                                                ชั่วโมง
                                            </td>

                                            <td class="text-center">
                                                หน่วยกิต
                                            </td>
                                            <td class="text-center">
                                                เกรด
                                            </td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($student_subject_old_2 as $key => $row) {
                                            @$sum_unit_old2 += @$row['unit'];

                                            $textGrade1 = '';
                                            if (@$row['grade_student'] > 80) {
                                                $textGrade1 = '4';
                                            } else if (@$row['grade_student'] >= 75) {
                                                $textGrade1 = '3.5';
                                            } else if (@$row['grade_student'] >= 70) {
                                                $textGrade1 = '3';
                                            } else if (@$row['grade_student'] >= 65) {
                                                $textGrade1 = '2.5';
                                            } else if (@$row['grade_student'] >= 60) {
                                                $textGrade1 = '2';
                                            } else if (@$row['grade_student'] >= 55) {
                                                $textGrade1 = '1.5';
                                            } else if (@$row['grade_student'] >= 50) {
                                                $textGrade1 = '1';
                                            } else if (@$row['grade_student'] < 50) {
                                                $textGrade1 = '0';
                                            } else {
                                                $textGrade1 = '-';
                                            }

                                            @$sum_ResutlUnit1 += @$textGrade1 * $row['unit'];
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo @$key + 1 ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['subjects_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo @$row['name'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['lecture_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['practical_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$row['hour'] ?>
                                                </td>

                                                <td class="text-center">
                                                    <?php echo @$row['unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $textStatus = '';
                                                    if ($row['status'] == 1) {
                                                        $textStatus = 'ผ่าน';
                                                    } else if ($row['status'] == 2) {
                                                        $textStatus = 'ไม่ผ่าน';
                                                    } else if ($row['status'] == 3) {
                                                        $textStatus = 'รอพิจารณา';
                                                    } else {
                                                        $textStatus = '-';
                                                    }
                                                    ?>
                                                    <?php echo $textStatus ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" class="text-end">
                                                รวม
                                            </td>
                                            <td class="text-center">
                                                <?php echo @$sum_unit_old2 ?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                เกรดเฉลี่ยประจำภาคเรียน 1/<?php echo $year + 543 ?> = <?php echo @$sum_ResutlUnit1 / @$sum_unit1 ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>



    </div>
</div>


<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>

</script>



<?php $this->endSection() ?>