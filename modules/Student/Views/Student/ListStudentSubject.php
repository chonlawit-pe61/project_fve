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
                    <div class="col-lg-12 text-center">
                        <img class="img-fluid" src="<?php echo base_url('public/files/imgStd/' . $student['student_img']) ?>" alt="">
                    </div>
                    <div class="col-lg-12 ">
                        <div class="container ">
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12 text-start">
                                            ชื่อ-นามสกุล <?php echo $student['student_name_th'] . ' ' . $student['student_lname_th'] ?> ชื่อเล่น <?php echo $student['student_nickname']  ?>
                                        </div>
                                        <div class="col-lg-12 text-start">
                                            ที่อยู่ <?php echo $student['student_address'] . ' หมู่ ' . $student['student_moo'] . ' จังหวัด ' . $student['std_province'] . ' อำเภอ ' . $student['std_district'] . ' จังหวัด ' . $student['std_subdistrict']  ?>
                                        </div>
                                        <div class="col-lg-12 text-start">
                                            เบอร์ติดต่อนักศึกษา <?php echo $student['student_phone'] ?>
                                        </div>
                                    </div>
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
                                                ทศดี
                                            </td>
                                            <td class="text-center">ปฎ</td>

                                            <td class="text-center">
                                                ชั่วโมง
                                            </td>
                                            <td class="text-center">
                                                เกรด
                                            </td>
                                            <td class="text-center">
                                                หน่วยกิต
                                            </td>
                                            <td class="text-center">
                                                คะแนนหน่วยกิต
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($student_subject as $key => $row) {
                                            $sum_unit1 += $row['unit'];

                                            $textGrade1 = '';
                                            if ($row['grade_student'] > 80) {
                                                $textGrade1 = '4';
                                            } else if ($row['grade_student'] >= 75) {
                                                $textGrade1 = '3.5';
                                            } else if ($row['grade_student'] >= 70) {
                                                $textGrade1 = '3';
                                            } else if ($row['grade_student'] >= 65) {
                                                $textGrade1 = '2.5';
                                            } else if ($row['grade_student'] >= 60) {
                                                $textGrade1 = '2';
                                            } else if ($row['grade_student'] >= 55) {
                                                $textGrade1 = '1.5';
                                            } else if ($row['grade_student'] >= 50) {
                                                $textGrade1 = '1';
                                            } else if ($row['grade_student'] < 50) {
                                                $textGrade1 = '0';
                                            } else {
                                                $textGrade1 = '-';
                                            }

                                            $sum_ResutlUnit1 += $textGrade1 * $row['unit'];
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $key + 1 ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['subjects_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['lecture_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['practical_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['hour'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $textGrade1 ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $textGrade1 * $row['unit'] ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7" class="text-end">
                                                รวม
                                            </td>
                                            <td class="text-center">
                                                <?php echo $sum_unit1 ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $sum_ResutlUnit1 ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                เกรดเฉลี่ยประจำภาคเรียน 1/<?php echo date('Y') + 543 ?> = <?php echo $sum_ResutlUnit1 / $sum_unit1 ?>
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
                                                ทศดี
                                            </td>
                                            <td class="text-center">ปฎ</td>

                                            <td class="text-center">
                                                ชั่วโมง
                                            </td>
                                            <td class="text-center">
                                                เกรด
                                            </td>
                                            <td class="text-center">
                                                หน่วยกิต
                                            </td>
                                            <td class="text-center">
                                                คะแนนหน่วยกิต
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($student_subject2 as $key => $row) {
                                            $sum_unit += $row['unit'];

                                            $textGrade = '';
                                            if ($row['grade_student'] > 80) {
                                                $textGrade = '4';
                                            } else if ($row['grade_student'] >= 75) {
                                                $textGrade = '3.5';
                                            } else if ($row['grade_student'] >= 70) {
                                                $textGrade = '3';
                                            } else if ($row['grade_student'] >= 65) {
                                                $textGrade = '2.5';
                                            } else if ($row['grade_student'] >= 60) {
                                                $textGrade = '2';
                                            } else if ($row['grade_student'] >= 55) {
                                                $textGrade = '1.5';
                                            } else if ($row['grade_student'] >= 50) {
                                                $textGrade = '1';
                                            } else if ($row['grade_student'] < 50) {
                                                $textGrade = '0';
                                            } else {
                                                $textGrade = '-';
                                            }
                                            $sum_ResutlUnit += $textGrade * $row['unit'];
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $key + 1 ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['subjects_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['lecture_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['practical_unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['hour'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $textGrade ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['unit'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $textGrade * $row['unit'] ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7" class="text-end">
                                                รวม
                                            </td>
                                            <td class="text-center">
                                                <?php echo $sum_unit ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $sum_ResutlUnit ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                เกรดเฉลี่ยประจำภาคเรียน 2/<?php echo date('Y') + 543 ?> = <?php echo $sum_ResutlUnit / $sum_unit ?>
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