<?php include_once("export_css.php"); ?>

<style>
    .dot {
        border-bottom: 1px dotted #000;
        /* font-size: 14pt; */
        padding-bottom: 0px;
    }

    .vl {
        border-left: 1px solid black;
        height: 100%;
        margin: 0px 15px;
    }

    .rotate {
        transform: rotate(-90deg)
    }
</style>
<table style="width: 100%; margin-bottom: 10px;">
    <tr>
        <td style="text-align: center;">
            <h5>
                <b>แบบบันทึกผลการเรียนและประเมินผล</b>
            </h5>
        </td>

    </tr>
    <tr>
        <td style="text-align: center;">
            <h5>
                <b>วิทยาลัยการอาชีพฝาง สำนักงานคณะกรรมการการอาชีวศึกษา กระทรวงศึกษาธิการ</b>
            </h5>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <h5>
                <b>ภาคเรียนที่ <?php echo $_GET['term'] ?> ปีการศึกษา <?php echo $_GET['year'] + 543 ?></b>
            </h5>
        </td>
    </tr>

</table>
<table style="width: 100%; text-align: center; margin-bottom: 12px;">
    <tr>
        <td style="width: 6%;">
            รหัสวิชา
        </td>
        <td class="dot" style="text-align: start;">
            <?php echo $subject['subjects_id'] ?>
        </td>
        <td style="width: 6%;">
            ชื่อวิชา
        </td>
        <td class="dot" style="text-align: start;">
            <?php echo $subject['name'] ?>
        </td>
        <td style="width: 7%;">
            หน่วยกิต
        </td>
        <td class="dot">
            <?php echo $subject['unit'] ?>
        </td>

    </tr>
</table>
<table style="width: 100%; margin-bottom: 10px;">
    <tr>
        <td style="width: 11%;">
            ระดับชั้นที่สอน
        </td>
        <td class="dot" style="text-align: start;">

        </td>
        <td style="width: 8%;">
            แผนกวิชา
        </td>
        <td class="dot" style="text-align: start;">

        </td>
    </tr>
</table>
<table style="width: 100%; margin-bottom:  10px;">
    <tr>
        <td style="width: 7%;">
            ชื่อผู้สอน
        </td>
        <td class="dot" style="text-align: start;">
            <?php echo $teacher['firstname'] . ' ' . $teacher['lastname'] ?>
        </td>
        <td style="width: 16%;">
            เป็นครูประจำแผนกวิชา
        </td>
        <td class="dot" style="text-align: center;">
            <?php echo $teacher_org['department_name'] ?>
        </td>
    </tr>
</table>
<table style="width: 100%;">
    <tr>
        <td style="text-align: center;">
            <b>อนุมัติผลการเรียน</b>
        </td>
    </tr>
</table>
<div class="row" style="margin: 0; padding:0;">
    <div class="column-6" style="margin: 0; padding:0; ">
        <b>เสนอ ผู้อำนวยการวิทยาลัยการอาชีพฝาง</b>
        <div style="text-indent: 75px;">
            ตามที่วิทยาลัยฯ ได้มอบหมายให้ดำเนินการสอนให้วิชานี้นั้น บัดนี้ได้ดำเนินการสอนและทำการประเมินผลการเรียนของนักเรียน นักศึกษา ให้วิชานี้เสร็จเรียบร้อยแล้ว ดังปรากฎผลรายละเอียดข้างล่างนี้
        </div>
        <div>
            <table class="table table-bordered" border="1" style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <td style="text-align: center;">เกรด</td>
                        <td style="text-align: center;">ช่วงคะแนน</td>
                        <td style="text-align: center;">จำนวน</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">
                            4.0
                        </td>
                        <td style="text-align: center;">
                            80-99
                        </td>
                        <td style="text-align: center;">
                            <?php
                            $idx_4 = 0;
                            foreach ($students as $key => $student) {
                                $sum_4 = 0;
                                $sum_4 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                                if (@$sum_4 > 80) {
                                    $idx_4++;
                                }
                                echo $idx_4;
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            3.5
                        </td>
                        <td style="text-align: center;">
                            75-79
                        </td>
                        <td style="text-align: center;">
                            <?php
                            $idx_3_5 = 0;
                            foreach ($students as $key => $student) {
                                $sum_3_5 = 0;
                                $sum_3_5 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                                if (@$sum_3_5 > 75 && @$sum_3_5 < 79) {
                                    $idx_3_5++;
                                }
                                echo $idx_3_5;
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            3.0
                        </td>
                        <td style="text-align: center;">
                            70-74
                        </td>
                        <td style="text-align: center;">
                            <?php
                            $idx_3 = 0;
                            foreach ($students as $key => $student) {
                                $sum_3 = 0;
                                $sum_3 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                                if (@$sum_3 > 70 && @$sum_3 < 74) {
                                    $idx_3++;
                                }
                                echo $idx_3;
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            2.5
                        </td>
                        <td style="text-align: center;">
                            65-69
                        </td>
                        <td style="text-align: center;">
                            <?php
                            $idx_2_5 = 0;
                            foreach ($students as $key => $student) {
                                $sum_2_5 = 0;
                                $sum_2_5 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                                if (@$sum_2_5 > 65 && @$sum_2_5 < 69) {
                                    $idx_2_5++;
                                }
                                echo $idx_2_5;
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            2.0
                        </td>
                        <td style="text-align: center;">
                            60-64
                        </td>
                        <td style="text-align: center;">

                            <?php
                            $idx_2 = 0;
                            foreach ($students as $key => $student) {
                                $sum_2 = 0;
                                $sum_2 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                                if (@$sum_2 > 60 && @$sum_2 < 64) {
                                    $idx_2++;
                                }
                                echo $idx_2;
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            1.5
                        </td>
                        <td style="text-align: center;">
                            55-59
                        </td>
                        <td style="text-align: center;">
                            <?php
                            $idx_1_5 = 0;
                            foreach ($students as $key => $student) {
                                $sum_1_5 = 0;
                                $sum_1_5 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                                if (@$sum_1_5 > 55 && @$sum_1_5 < 59) {
                                    $idx_1_5++;
                                }
                                echo $idx_1_5;
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            1.0
                        </td>
                        <td style="text-align: center;">
                            50-54
                        </td>
                        <td style="text-align: center;">
                            <?php
                            $idx_1 = 0;
                            foreach ($students as $key => $student) {
                                $sum_1 = 0;
                                $sum_1 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                                if (@$sum_1 > 50 && @$sum_1 < 54) {
                                    $idx_1++;
                                }
                                echo $idx_1;
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            0
                        </td>
                        <td style="text-align: center;">
                            ต่ำกว่า 50
                        </td>
                        <td style="text-align: center;">
                            <?php
                            $idx_0 = 0;
                            foreach ($students as $key => $student) {
                                $sum_0 = 0;
                                $sum_0 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                                if (@$sum_0 < 50) {
                                    $idx_0++;
                                }
                                echo $idx_0;
                            } ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="text-align: center;">
                            ขาดเรียนไม่มีสิทธิ์สอบ (ขร.)
                        </td>
                        <td style="text-align: center;">
                            -
                        </td>

                    </tr>
                    <tr>

                        <td colspan="2" style="text-align: center;">
                            ไม่สมบูรณ์ (มส.)
                        </td>
                        <td style="text-align: center;">
                            -
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            ขาดสอบ (ขส.)
                        </td>
                        <td style="text-align: center;">
                            -
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            อื่นๆ
                        </td>
                        <td style="text-align: center;">
                            -
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            รวม
                        </td>
                        <td style="text-align: center;">
                            -
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center" style="margin-top: 10px;">
            <table class="table" style="width: 100%;">
                <tr>
                    <td class="text-center">จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 100px;">
            <table class="table" style="width: 100%;">
                <tr>
                    <td style="width: 4%;">
                        ลงชื่อ
                    </td>
                    <td class="dot" style="width: 70%;">

                    </td>
                    <td style="width: 16%;">
                        อาจารย์ผู้สอน
                    </td>
                </tr>
                <tr>
                    <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                        ( <?php echo $teacher['firstname'] . ' ' . $teacher['lastname'] ?> )
                    </td>

                </tr>
                <tr>
                    <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                        วันที่ ................/................/................
                    </td>

                </tr>
            </table>
        </div>
    </div>
    <div class="column-1 " style="margin: 0; padding:0;  text-align: center;">
        <div class="vl"></div>
    </div>
    <div class="column-5" style="margin: 0; padding:0;">
        <div style="margin-bottom: 15px;">
            <b>ความเห็นของหัวหน้างานวัดผลและประเมินผล</b>
            <div style="margin-top: 20px;">
                <table style="margin-bottom: 40px;width: 100%;">
                    <tr>
                        <td colspan="3" class="text-center" style="text-align: center;">
                            .....................................................................
                        </td>
                    </tr>
                </table>
                <table class="table" style="width: 100%;">

                    <tr>
                        <td style="width: 4%;">
                            ลงชื่อ
                        </td>
                        <td class="dot" style="width: 96%;">

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                            ( <?php echo  $teacher_prename_consider['prename_name']  . $teacher_consider['firstname'] . ' ' . $teacher_consider['lastname'] ?> )
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                            วันที่ ................/................/................
                        </td>

                    </tr>
                </table>
            </div>
        </div>
        <div style="margin-bottom: 15px;">
            <b>ความเห็นของหัวหน้าแผนกวิชา</b>
            <div style="margin-top: 20px;">
                <table style="margin-bottom: 40px;width: 100%;">
                    <tr>
                        <td colspan="3" class="text-center" style="text-align: center;">
                            .....................................................................
                        </td>
                    </tr>
                </table>
                <table class="table" style="width: 100%;">

                    <tr>
                        <td style="width: 4%;">
                            ลงชื่อ
                        </td>
                        <td class="dot" style="width: 96%;">

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                            ( นายสราวุธ ปันทะนะ )
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                            วันที่ ................/................/................
                        </td>

                    </tr>
                </table>
            </div>
        </div>
        <div style="margin-bottom: 15px;">
            <b> ความเห็นของรองผู้อำนวยการฝ่ายวิชาการ</b>
            <div style="margin-top: 20px;">
                <table style="margin-bottom: 40px;width: 100%;">
                    <tr>
                        <td colspan="3" class="text-center" style="text-align: center;">
                            .....................................................................
                        </td>
                    </tr>
                </table>
                <table class="table" style="width: 100%;">

                    <tr>
                        <td style="width: 4%;">
                            ลงชื่อ
                        </td>
                        <td class="dot" style="width: 96%;">

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                            ( นางสายนที ดำดิบ )
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                            วันที่ ................/................/................
                        </td>

                    </tr>
                </table>
            </div>
        </div>
        <div style="margin-bottom: 15px;">
            <b> ความเห็นผู้อำนวยการ</b>
            <div style="margin-top: 20px;">
                <table style="margin-bottom: 40px;width: 100%;">
                    <tr>
                        <td colspan="3" class="text-center" style="text-align: center;">
                            .....................................................................
                        </td>
                    </tr>
                </table>
                <table class="table" style="width: 100%;">

                    <tr>
                        <td style="width: 4%;">
                            ลงชื่อ
                        </td>
                        <td class="dot" style="width: 96%;">

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                            ( นายปัญญา ช่างงาน )
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" style="width: 100%; text-align: center;">
                            วันที่ ................/................/................
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<pageBreak />
<div class="text-center">
    <h5 style="text-align: center;">
        <b>วิทยาลัยการอาชีพฝาง</b>
    </h5>
</div>
<div>
    <table class="table" style="vertical-align: middle;">
        <tr>
            <td style="width: 20%;">
                แบบประเมินผลการเรียน
            </td>
            <td style="width: 20%;">
                <div class="d-flex align-items-center">
                    <span style=" font-size: 16px;">&#9744;</span>
                    ปกติ
                </div>
            </td>
            <td style="width: 20%;">
                <span style=" font-size: 16px;">&#9744;</span>
                ฝึกงาน
            </td>
            <td style="width: 20%;">
                <span style=" font-size: 16px;">&#9744;</span>
                เรียนเพิ่ม
            </td>
        </tr>
    </table>
</div>

<div>
    <div class="row" style="margin: 0; padding: 0;">
        <div class="column-1" style="margin: 0; padding: 0;">
            รหัสวิชา
        </div>
        <div class="column-2" style="margin: 0; padding: 0;">
            <?php echo $subject['subjects_id'] ?>
        </div>
        <div class="column-1" style="margin: 0; padding: 0;">
            ชื่อวิชา
        </div>
        <div class="column-3" style="margin: 0; padding: 0;text-align: left;">
            <?php echo $subject['name'] ?>
        </div>
        <div class="column-1" style="margin: 0; padding: 0;">
            ภาคเรียนที่
        </div>
        <div class="column-2" style="margin: 0; padding: 0;">
            <?php echo $_GET['term']  ?> ปีการศึกษา <?php echo $_GET['year'] + 543 ?>
        </div>
    </div>
    <div class="row" style="margin: 0; padding: 0;">
        <div class="column-3" style="margin: 0; padding: 0;">
            จำนวนชั่วโมงเรียน/สัปดาห์
        </div>
        <div class="column-1" style="margin: 0; padding: 0;">
            &nbsp;
        </div>
        <div class="column-1" style="margin: 0; padding: 0;">
            ชั่วโมง
        </div>
        <div class="column-1" style="margin: 0; padding: 0;text-align: left;">
            หน่วยกิต
        </div>
        <div class="column-3" style="margin: 0; padding: 0;">
            <?php echo $subject['unit'] ?> &nbsp;&nbsp;หน่วย
        </div>
    </div>
    <div class="row" style="margin: 0; padding: 0;">
        <div class="column-1" style="margin: 0; padding: 0;">
            ระดับชั้น
        </div>
        <div class="column-1 " style="margin: 0; padding: 0;">
            &nbsp;
        </div>
        <div class="column-1" style="margin: 0; padding: 0;">
            ปีที่
        </div>
        <div class="column-1 " style="margin: 0; padding: 0;text-align: left;">
            &nbsp;
        </div>
        <div class="column-1" style="margin: 0; padding: 0;">
            แผนกวิชา
        </div>
        <div class="column-2 " style="margin: 0; padding: 0;text-align: left;">
            &nbsp;
        </div>
        <div class="column-2" style="margin: 0; padding: 0;">
            เวลาเรียนเต็ม
        </div>
        <div class="column-2" style="margin: 0; padding: 0;text-align: right;">
            ชั่วโมง
        </div>
    </div>
    <div class="row" style="margin: 0; padding: 0;">
        <div class="column-1" style="margin: 0; padding: 0;">
            ผู้สอน
        </div>
        <div class="column-3" style="margin: 0; padding: 0;">
            <?php echo $teacher['firstname'] . ' ' . $teacher['lastname'] ?>
        </div>
        <div class="column-3" style="margin: 0; padding: 0;">
            อาจารย์ที่ปรึกษา
        </div>
        <div class="column-1" style="margin: 0; padding: 0;text-align: left;">
            &nbsp;
        </div>

    </div>

</div>
<table border="1" style="width: 100%; vertical-align: middle;border-collapse: collapse; font-size: 16px;">


    <tr style="text-align: center;">
        <td rowspan="3" style="text-align: center;">ที่</td>
        <td rowspan="3" style="text-align: center;">รหัสประจำตัว</td>
        <td rowspan="3" style="text-align: center;">ชื่อ-นามสกุล</td>
        <td rowspan="3" style="text-rotate: 90;text-align: center;">รวมเวลาเรียน(ชั่วโมง)</td>
        <td colspan="6" style="text-align: center;">คะแนนประเมินตามสภาพจริง</td>
        <td rowspan="2" style="text-align: center;">รวมทั้งหมด</td>
        <td rowspan="3" style="text-align: center;">ระดับผลการเรียน</td>
        <td rowspan="3" style="text-align: center;">หมายเหตุ</td>
    </tr>
    <tr style="text-align: center;">
        <td style="text-rotate: 90;text-align: center; ">จิตพิสัย</td>
        <td style="text-rotate: 90;text-align: center;">ทดสอบ</td>
        <td style="text-rotate: 90;text-align: center;">ภาระงาน</td>
        <td style="text-rotate: 90;text-align: center;">&nbsp;</td>
        <td style="text-rotate: 90;text-align: center;">&nbsp;</td>
        <td style="text-rotate: 90;text-align: center;">สอบปลายภาค</td>
    </tr>
    <tr style="text-align: center;">
        <td style="text-align: center;"><?php echo $plan_student['max_affective'] ?></td>
        <td style="text-align: center;"><?php echo $plan_student['max_work'] ?></td>
        <td style="text-align: center;"><?php echo $plan_student['max_test'] ?></td>
        <td style="text-align: center;"></td>
        <td style="text-align: center;"></td>
        <td style="text-align: center;"><?php echo $plan_student['max_final_exam'] ?></td>
        <td style="text-align: center;">100</td>
    </tr>
    <?php
    // e($students);
    // die();
    foreach ($students as $key => $student) {
    ?>
        <tr>
            <td style="text-align: center;">
                <?php echo $key + 1 ?>
            </td>
            <td>
                <?php echo $student['student_id_conlage'] ?>
            </td>
            <td style="text-align: left;">
                <?php echo $student['prename_name'] .  ' ' . $student['student_name_th'] . ' ' . $student['student_name_en'] ?>
            </td>
            <td style="text-align: center;">
                &nbsp;
            </td>
            <td style="text-align: center;">
                <?php echo $student['affective'] ?>
            </td>
            <td style="text-align: center;">
                <?php echo $student['test'] ?>
            </td>
            <td style="text-align: center;">
                <?php echo $student['work'] ?>
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td style="text-align: center;">
                <?php echo $student['final_exam'] ?>
            </td>
            <td style="text-align: center;">
                <?php
                $sum = 0;
                $sum += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
                echo $sum;
                ?>
            </td>
            <td style="text-align: center;">
                <?php
                if (@$sum > 80) {
                    $textGrade1 = '4';
                } else if (@$sum >= 75) {
                    $textGrade1 = '3.5';
                } else if (@$sum >= 70) {
                    $textGrade1 = '3';
                } else if (@$sum >= 65) {
                    $textGrade1 = '2.5';
                } else if (@$sum >= 60) {
                    $textGrade1 = '2';
                } else if (@$sum >= 55) {
                    $textGrade1 = '1.5';
                } else if (@$sum >= 50) {
                    $textGrade1 = '1';
                } else if (@$sum < 50) {
                    $textGrade1 = '0';
                } else {
                    $textGrade1 = '-';
                }
                ?>
                <?php
                echo $textGrade1;
                ?>
            </td>

            <td style="text-align: center;">
                -
            </td>
        </tr>
    <?php
    }
    ?>

</table>
<pageBreak />
<div>
    สรุประดับผลการเรียน

</div>
<div class="row">
    <div class="column-2" style="margin: 0; padding: 0;">
        ระดับผลการเรียน 4.0
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        =
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        <?php
        $idx_4 = 0;
        foreach ($students as $key => $student) {
            $sum_4 = 0;
            $sum_4 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
            if (@$sum_4 > 80) {
                $idx_4++;
            }
            echo $idx_4 . ' คน';
        } ?>
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">

    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        ม.ส&nbsp;&nbsp;&nbsp;&nbsp;=
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        0 คน
    </div>
    <div class="column-4" style="margin: 0; padding: 0;">
        .................................................. ผู้สอน
    </div>
</div>
<div class="row">
    <div class="column-2" style="margin: 0; padding: 0;">
        ระดับผลการเรียน 3.5
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        =
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        <?php
        $idx_3_5 = 0;
        foreach ($students as $key => $student) {
            $sum_3_5 = 0;
            $sum_3_5 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
            if (@$sum_3_5 > 75 && @$sum_3_5 < 79) {
                $idx_3_5++;
            }
            echo $idx_3_5 . ' คน';
        } ?>
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">

    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        ข.ร&nbsp;&nbsp;&nbsp;&nbsp;=
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        0 คน
    </div>

</div>
<div class="row">
    <div class="column-2" style="margin: 0; padding: 0;">
        ระดับผลการเรียน 3.0
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        =
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        <?php
        $idx_3 = 0;
        foreach ($students as $key => $student) {
            $sum_3 = 0;
            $sum_3 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
            if (@$sum_3 > 70 && @$sum_3 < 74) {
                $idx_3++;
            }
            echo $idx_3 . ' คน';
        } ?>
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">

    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        ข.ส&nbsp;&nbsp;&nbsp;&nbsp;=
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        0 คน
    </div>
    <div class="column-4" style="margin: 0; padding: 0;">
        .................................................. หัวหน้าแผนกวิชา
    </div>
</div>
<div class="row">
    <div class="column-2" style="margin: 0; padding: 0;">
        ระดับผลการเรียน 2.5
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        =
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        <?php
        $idx_2_5 = 0;
        foreach ($students as $key => $student) {
            $sum_2_5 = 0;
            $sum_2_5 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
            if (@$sum_2_5 > 65 && @$sum_2_5 < 69) {
                $idx_2_5++;
            }
            echo $idx_2_5 . ' คน';
        } ?>
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">

    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        ผ.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        0 คน
    </div>

</div>
<div class="row">
    <div class="column-2" style="margin: 0; padding: 0;">
        ระดับผลการเรียน 2.0
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        =
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        <?php
        $idx_2 = 0;
        foreach ($students as $key => $student) {
            $sum_2 = 0;
            $sum_2 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
            if (@$sum_2 > 60 && @$sum_2 < 64) {
                $idx_2++;
            }
            echo $idx_2 . ' คน';
        } ?>
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">

    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        ม.ผ&nbsp;&nbsp;&nbsp;&nbsp;=
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        0 คน
    </div>
    <div class="column-5" style="margin: 0; padding: 0;">
        .................................................. หัวหน้างานวัดผลและประเมินผล
    </div>
</div>
<div class="row">
    <div class="column-2" style="margin: 0; padding: 0;">
        ระดับผลการเรียน 1.5
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        =
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        <?php
        $idx_1_5 = 0;
        foreach ($students as $key => $student) {
            $sum_1_5 = 0;
            $sum_1_5 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
            if (@$sum_1_5 > 55 && @$sum_1_5 < 59) {
                $idx_1_5++;
            }
            echo $idx_1_5 . ' คน';
        } ?>
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">

    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        อื่นๆ&nbsp;&nbsp;&nbsp;=
    </div>

    <div class="column-1" style="margin: 0; padding: 0;">
        0 คน
    </div>

</div>
<div class="row">
    <div class="column-2" style="margin: 0; padding: 0;">
        ระดับผลการเรียน 1.0
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        =
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        0 คน
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">

    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        ม.ส &nbsp;&nbsp;&nbsp;=
    </div>

    <div class="column-1" style="margin: 0; padding: 0;">
        <?php
        $idx_1 = 0;
        foreach ($students as $key => $student) {
            $sum_1 = 0;
            $sum_1 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
            if (@$sum_1 > 50 && @$sum_1 < 54) {
                $idx_1++;
            }
            echo $idx_1 . ' คน';
        } ?>
    </div>
    <div class="column-5" style="margin: 0; padding: 0;">
        .................................................. รองผู้อำนวยการฝ่ายวิชาการ
    </div>
</div>
<div class="row">
    <div class="column-2" style="margin: 0; padding: 0;">
        ระดับผลการเรียน 0
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        =
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        <?php
        $idx_0 = 0;
        foreach ($students as $key => $student) {
            $sum_0 = 0;
            $sum_0 += $student['affective'] + $student['test'] + $student['work'] + $student['final_exam'];
            if (@$sum_0 < 50) {
                $idx_0++;
            }
            echo $idx_0 . ' คน';
        } ?>
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">

    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        ม.ส&nbsp;&nbsp;&nbsp;&nbsp;=
    </div>
    <div class="column-1" style="margin: 0; padding: 0;">
        0 คน
    </div>

</div>