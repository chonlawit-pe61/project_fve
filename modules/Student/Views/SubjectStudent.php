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
                        <a target="_blank" href="<?php echo base_url('Student/exportProfileStudent?user_id=' . $_GET['id']) ?>" class="btn btn-success">PDF</a>
                    </div>
                    <div class="col-lg-12 text-center">
                        <?php
                        if ($student['student_img']) {
                        ?>
                            <img class="img-fluid" src="<?php echo base_url('public/files/imgStd/' . @$student['student_img']) ?>" alt="">
                        <?php
                        }
                        ?>


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
                                    <form action="<?php echo base_url("Student/SubjectStudent") ?>" method="get">
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                        <select class="form-select" aria-label="Default select example" name="year" onchange="this.form.submit()">
                                            <option value="<?php echo date('Y') ?>">เลือกปีการศึกษา</option>
                                            <?php
                                            for ($i = date('Y') + 10; $i >= date('Y') - 10; $i--) { ?>
                                                <option <?php echo @$_GET['year'] == $i ? 'selected' : '' ?> value="<?php echo $i ?>">ปีการศึกษา <?php echo $i + 543 ?></option>
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
                            <div class="col-lg-12 mt-5">
                                <b>
                                    รายวิชาที่ศึกษาเทอม 1
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
                                            <!-- <td class="text-center">
                                                คะแนนหน่วยกิต
                                            </td> -->
                                            <td>
                                                เครื่องมือ
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($student_subject as $key => $row) {
                                            $plan1 = $row['plan_student_year'];
                                            @$sum_unit1 += @$row['unit'];
                                            $result = $row['affective'] + $row['work'] + $row['test'] + $row['midterm_exam'] + $row['final_exam'];
                                            $textGrade1 = '';
                                            if (@$result >= 80) {
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
                                                <!-- <td class="text-center">
                                                    <?php echo @$textGrade1 * @$row['unit'] ?>
                                                </td> -->
                                                <td class="text-center">

                                                    <button class="btn btn-danger mx-1" onclick="DeleteSubject(<?php echo $row['plan_student_id'] ?>)">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>

                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <form action="<?php echo base_url('Student/insertSubject') ?>" method="post">
                                            <tr>
                                                <td colspan="3">
                                                    &nbsp;
                                                    <input type="hidden" name="plan_student_term" value="1">
                                                    <input type="hidden" name="plan_student_year" value="<?php echo $plan1 ?>">
                                                    <input type="hidden" name="users_id" value="<?php echo $_GET['id'] ?>">
                                                </td>
                                                <td colspan="3">
                                                    <select name="subjects_id" class="form-select" aria-label="Default select example">
                                                        <?php
                                                        foreach ($subject as $row) {
                                                        ?>
                                                            <option value="<?php echo $row['id'] ?>"><?= $row['name'] ?> <?php
                                                                                                                            if (!empty($row['comment'])) {

                                                                                                                                echo '(' . $row['comment'] . ')';
                                                                                                                            }
                                                                                                                            ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td colspan="3" class="text-center">
                                                    <button class="btn btn-success">บันทึก</button>
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7" class="text-end">
                                                รวม
                                            </td>
                                            <td class="text-center">
                                                <?php echo @$sum_unit1 ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo @$sum_ResutlUnit1 ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                เกรดเฉลี่ยประจำภาคเรียน 1/<?php echo date('Y') + 543 ?> = <?php echo @$sum_ResutlUnit1 / @$sum_unit1 ?>
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
                    if (!empty(@$student_subject_old_1) || $role_id < 5) {
                    ?>
                        <div class="container">
                            <div class="col-lg-12 mt-5">
                                <b>
                                    รายวิชาที่ศึกษาเพิ่มเติม เทอม 1 (<?php echo $year + 543 ?>) สำหรับวิชาเก่าจากโรงเรียนเก่า
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

                                            <td>
                                                เครื่องมือ
                                            </td>
                                            <td>
                                                สถานนะ
                                            </td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($student_subject_old_1)) {
                                            foreach ($student_subject_old_1 as $key => $row) {
                                                $plan1 = $year;
                                                @$sum_unit1_old += $row['unit'];
                                                $result = $row['affective'] + $row['work'] + $row['test'] + $row['midterm_exam'] + $row['final_exam'];
                                                $textGrade1 = '';
                                                if (@$result >= 80) {
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
                                                        <div class="d-flex">
                                                            <select onchange="updateStatus(this.value ,<?php echo $row['plan_student_id'] ?> )" class="form-select" aria-label="Default select example">
                                                                <option value="0" <?php echo $row['status'] == 0 ? 'selected' : '' ?>>เลือกสถานนะ</option>
                                                                <option value="1" <?php echo $row['status'] == 1 ? 'selected' : '' ?>>ผ่าน</option>
                                                                <option value="2" <?php echo $row['status'] == 2 ? 'selected' : '' ?>>ไม่ผ่าน</option>
                                                                <option value="3" <?php echo $row['status'] == 3 ? 'selected' : '' ?>>รอพิจารณา</option>
                                                            </select>
                                                            <button class="btn btn-danger mx-1 " onclick="DeleteSubject_old(<?php echo $row['plan_student_id'] ?>)">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
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
                                        <?php
                                        }

                                        ?>
                                        <form action="<?php echo base_url('Student/InsertSubject_old') ?>" method="post">
                                            <tr>
                                                <td colspan="3">
                                                    &nbsp;
                                                    <input type="hidden" name="plan_student_term" value="1">
                                                    <input type="hidden" name="plan_student_year" value="<?php echo $year ?>">
                                                    <input type="hidden" name="users_id" value="<?php echo $_GET['id'] ?>">
                                                </td>
                                                <td colspan="3">
                                                    <select name="subjects_id" class="form-select" aria-label="Default select example">
                                                        <?php
                                                        foreach ($subject_old as $row) {
                                                        ?>
                                                            <option value="<?php echo $row['id'] ?>"><?= $row['name'] ?> <?php
                                                                                                                            if (!empty($row['comment'])) {

                                                                                                                                echo '(' . $row['comment'] . ')';
                                                                                                                            }
                                                                                                                            ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td colspan="3" class="text-center">
                                                    <button class="btn btn-success">บันทึก</button>
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>
                                    <?php
                                    if (!empty($student_subject_old_1)) {
                                    ?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6" class="text-end">
                                                    รวม
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$sum_unit1_old ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$sum_ResutlUnit1_old ?>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="9" class="text-center">
                                                    เกรดเฉลี่ยประจำภาคเรียน 1/<?php echo @$year + 543  ?> = <?php echo (@intval($sum_ResutlUnit1_old) / @intval($sum_unit1_old))
                                                                                                            ?>
                                                </td>
                                            </tr> -->
                                        </tfoot>
                                    <?php
                                    }
                                    ?>
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
                                    รายวิชาที่ศึกษาเทอม 2
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
                                            <td class="text-center">
                                                เครื่องมือ
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($student_subject2 as $key => $row) {
                                            $plan2 = $row['plan_student_year'];
                                            @$sum_unit2 += @$row['unit'];

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
                                            @$sum_ResutlUnit_2 += @$textGrade * @$row['unit'];
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
                                                <td class="text-center">

                                                    <button class="btn btn-danger mx-1" onclick="DeleteSubject(<?php echo $row['plan_student_id'] ?>)">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <form action="<?php echo base_url('Student/insertSubject') ?>" method="post">
                                            <tr>
                                                <td colspan="3">
                                                    &nbsp;
                                                    <input type="hidden" name="plan_student_term" value="2">
                                                    <input type="hidden" name="plan_student_year" value="<?php echo @$plan2 ?>">
                                                    <input type="hidden" name="users_id" value="<?php echo @$_GET['id'] ?>">
                                                </td>
                                                <td colspan="3">
                                                    <select name="subjects_id" class="form-select" aria-label="Default select example">
                                                        <?php
                                                        foreach ($subject as $row) {
                                                        ?>
                                                            <option value="<?php echo $row['id'] ?>"><?= $row['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td colspan="3" class="text-center">
                                                    <button class="btn btn-success">บันทึก</button>
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="7" class="text-end">
                                                รวม
                                            </td>
                                            <td class="text-center">
                                                <?php echo @$sum_unit2 ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo @$sum_ResutlUnit_2 ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                เกรดเฉลี่ยประจำภาคเรียน 2/<?php echo date('Y') + 543 ?> = <?php echo @$sum_ResutlUnit_2 / @$sum_unit2 ?>
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
                    if (!empty($student_subject_old_2) || $role_id < 5) {
                    ?>
                        <div class="container">
                            <div class="col-lg-12 mt-5">
                                <b>
                                    รายวิชาที่ศึกษาเพิ่มเติมเทอม 2 (<?php echo $year + 543 ?>) สำหรับวิชาเก่าจากโรงเรียนเก่า
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

                                            <td>
                                                เครื่องมือ
                                            </td>
                                            <td>
                                                สถานนะ
                                            </td>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (!empty($student_subject_old_2)) {
                                        ?>
                                            <?php
                                            foreach ($student_subject_old_2 as $key => $row) {

                                                $plan1 = @$row['plan_student_year'];
                                                @$sum_unit2_old += @$row['unit'];
                                                $result = $row['affective'] + $row['work'] + $row['test'] + $row['midterm_exam'] + $row['final_exam'];
                                                $textGrade1 = '';
                                                if (@$result >= 80) {
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

                                                @$sum_ResutlUnit2_old += @$textGrade1 * $row['unit'];
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
                                                        <div class="d-flex">
                                                            <select onchange="updateStatus(this.value ,<?php echo $row['plan_student_id'] ?> )" class="form-select" aria-label="Default select example">
                                                                <option value="0" <?php echo $row['status'] == 0 ? 'selected' : '' ?>>เลือกสถานนะ</option>
                                                                <option value="1" <?php echo $row['status'] == 1 ? 'selected' : '' ?>>ผ่าน</option>
                                                                <option value="2" <?php echo $row['status'] == 2 ? 'selected' : '' ?>>ไม่ผ่าน</option>
                                                                <option value="3" <?php echo $row['status'] == 3 ? 'selected' : '' ?>>รอพิจารณา</option>
                                                            </select>
                                                            <button class="btn btn-danger mx-1 " onclick="DeleteSubject_old(<?php echo $row['plan_student_id'] ?>)">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
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
                                        <?php
                                        }
                                        ?>

                                        <form action="<?php echo base_url('Student/InsertSubject_old') ?>" method="post">
                                            <tr>
                                                <td colspan="3">
                                                    &nbsp;
                                                    <input type="hidden" name="plan_student_term" value="2">
                                                    <input type="hidden" name="plan_student_year" value="<?php echo @$plan1 ?>">
                                                    <input type="hidden" name="users_id" value="<?php echo @$_GET['id'] ?>">
                                                </td>
                                                <td colspan="3">
                                                    <select name="subjects_id" class="form-select" aria-label="Default select example">
                                                        <?php
                                                        foreach ($subject_old as $row) {
                                                        ?>
                                                            <option value="<?php echo $row['id'] ?>"><?= $row['name'] ?> <?php
                                                                                                                            if (!empty($row['comment'])) {

                                                                                                                                echo '(' . $row['comment'] . ')';
                                                                                                                            }
                                                                                                                            ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td colspan="3" class="text-center">
                                                    <button class="btn btn-success">บันทึก</button>
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>
                                    <?php
                                    if (!empty($student_subject_old_2)) {
                                    ?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7" class="text-end">
                                                    รวม
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$sum_unit2_old ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo @$sum_ResutlUnit2_old ?>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="9" class="text-center">
                                                    เกรดเฉลี่ยประจำภาคเรียน 2/<?php echo @$year + 543 ?> = <?php echo @$sum_ResutlUnit2_old / @$sum_unit2_old ?>
                                                </td>
                                            </tr> -->
                                        </tfoot>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                </div>
                <div class="text-center">
                    <a class="btn btn-secondary" href="<?php echo base_url('Student') ?>">ย้อนกลับ</a>
                </div>
            </div>
        </div>



    </div>
</div>


<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>
    const updateStatus = (status, id) => {

        Swal.fire({
            title: 'คุณเปลื่ยนแปลงสถานนะ?',
            text: "คลิกตกลงเพื่อยืนยันการเปลื่ยนแปลงข้อมูล!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    data: {
                        'status': status,
                        'id': id
                    },
                    url: '<?= base_url('/Student/updateStatusPlanStudentOld'); ?>',
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'การเปลื่ยนแปลงข้อมูลสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        })
                    }
                })
            }
        })
    }

    const DeleteSubject = (id) => {
        Swal.fire({
            title: 'คุณต้องการลบข้อมูล?',
            text: "คลิกตกลงเพื่อยืนยันการลบข้อมูล!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    data: {
                        'id': id
                    },
                    url: '<?= base_url('/Student/deleteSubject'); ?>',
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'ลบรายวิชาสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            // window.location.reload();
                        })
                    }
                })
            }
        })
    }
    const DeleteSubject_old = (id) => {
        Swal.fire({
            title: 'คุณต้องการลบข้อมูล?',
            text: "คลิกตกลงเพื่อยืนยันการลบข้อมูล!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    data: {
                        'id': id
                    },
                    url: '<?= base_url('/Student/deleteSubjectOld'); ?>',
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'ลบรายวิชาสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        })
                    }
                })
            }
        })
    }
</script>



<?php $this->endSection() ?>