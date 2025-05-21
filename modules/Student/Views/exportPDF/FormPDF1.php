<?php include_once("export_css.php"); ?>

<div class="col-lg-12 text-center" style="text-align: center; margin-bottom: 10px;">
    <img class="img-fluid" style="height: 150px;" src="<?php echo base_url('public/img/icon.jpg') ?>" alt="">
</div>
<div class="col-lg-12 text-center" style="text-align: center;">
    <?php
    if ($student['student_img']) {
    ?>
        <img class="img-fluid" style="height: 100px;" src="<?php echo base_url('public/files/imgStd/' . @$student['student_img']) ?>" alt="">
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
                        ชื่อ-นามสกุล <?php echo @$student['student_name_th'] . ' ' . @$student['student_lname_th'] ?>                     </div>
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
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <td class="text-center" style="text-align: center;">ลำดับ</td>
                        <td class="text-center" style="text-align: center;">
                            รหัสวิชา
                        </td>
                        <td class="text-center" style="text-align: center;">
                            ชื่อวิชา
                        </td>
                        <td class="text-center" style="text-align: center;">
                            ทฤษฎี
                        </td>
                        <td class="text-center" style="text-align: center;">ปฏิบัติ</td>

                        <td class="text-center" style="text-align: center;">
                            ชั่วโมง
                        </td>

                        <td class="text-center" style="text-align: center;">
                            หน่วยกิต
                        </td>
                        <td class="text-center" style="text-align: center;">
                            เกรด
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
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$key + 1 ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['subjects_id'] ?>
                            </td>
                            <td>
                                <?php echo @$row['name'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['lecture_unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['practical_unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['hour'] ?>
                            </td>

                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
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
                        <td colspan="7" class="text-end" style="text-align: center;">
                            รวม
                        </td>
                        <td class="text-center" style="text-align: center;">
                            <?php echo @$sum_unit_old_1 ?>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="8" class="text-center" style="text-align: center;">
                            เกรดเฉลี่ยประจำภาคเรียน 1/<?php echo $year + 543 ?> = <?php echo @$sum_ResutlUnit1 / @$sum_unit_old_1 ?>
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
                        <td class="text-center" style="text-align: center;">ลำดับ</td>
                        <td class="text-center" style="text-align: center;">
                            รหัสวิชา
                        </td>
                        <td class="text-center" style="text-align: center;">
                            ชื่อวิชา
                        </td>
                        <td class="text-center" style="text-align: center;">
                            ทฤษฎี
                        </td>
                        <td class="text-center" style="text-align: center;">ปฏิบัติ</td>

                        <td class="text-center" style="text-align: center;">
                            ชั่วโมง
                        </td>

                        <td class="text-center" style="text-align: center;">
                            หน่วยกิต
                        </td>
                        <td class="text-center" style="text-align: center;">
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
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$key + 1 ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['subjects_id'] ?>
                            </td>
                            <td>
                                <?php echo @$row['name'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['lecture_unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['practical_unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['hour'] ?>
                            </td>

                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$textGrade1 ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="text-end" style="text-align: center;">
                            รวม
                        </td>
                        <td class="text-center" style="text-align: center;">
                            <?php echo @$sum_unit1 ?>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="8" class="text-center" style="text-align: center;">
                            เกรดเฉลี่ยประจำภาคเรียน 2/<?php echo $year + 543 ?> = <?php echo @$sum_ResutlUnit1 / @$sum_unit1 ?>
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
                        <td class="text-center" style="text-align: center;">ลำดับ</td>
                        <td class="text-center" style="text-align: center;">
                            รหัสวิชา
                        </td>
                        <td class="text-center" style="text-align: center;">
                            ชื่อวิชา
                        </td>
                        <td class="text-center" style="text-align: center;">
                            ทฤษฎี
                        </td>
                        <td class="text-center" style="text-align: center;">ปฏิบัติ</td>

                        <td class="text-center" style="text-align: center;">
                            ชั่วโมง
                        </td>

                        <td class="text-center" style="text-align: center;">
                            หน่วยกิต
                        </td>
                        <td class="text-center" style="text-align: center;">
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
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$key + 1 ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['subjects_id'] ?>
                            </td>
                            <td>
                                <?php echo @$row['name'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['lecture_unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['practical_unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <?php echo @$row['hour'] ?>
                            </td>

                            <td class="text-center " style="text-align: center;">
                                <?php echo @$row['unit'] ?>
                            </td>
                            <td class="text-center" style="text-align: center;">
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
                        <td colspan="7" class="text-end" style="text-align: center;">
                            รวม
                        </td>
                        <td class="text-center" style="text-align: center;">
                            <?php echo @$sum_unit_old2 ?>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="8" class="text-center" style="text-align: center;">
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
                            เกรด
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
                        <td colspan="7" class="text-end" style="text-align: center;">
                            รวม
                        </td>
                        <td style="text-align: center;">
                            <?php echo @$sum_unit ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" class="text-center" style="text-align: center;">
                            เกรดเฉลี่ยประจำภาคเรียน 2/<?php echo $year + 543 ?> = <?php echo @$sum_ResutlUnit / @$sum_unit ?>
                        </td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
<?php
}
?>
