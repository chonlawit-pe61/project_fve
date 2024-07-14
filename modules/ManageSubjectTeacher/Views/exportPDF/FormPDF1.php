<?php include_once("export_css.php"); ?>

<table style="width: 100%;">
    <tr>
        <td style="text-align: center;">
            <h1>
                รายชื่อนักศึกษา
            </h1>
        </td>
    </tr>
</table>
<table class="table table-bordered">
    <tr>
        <td style="text-align: center;">
            ลำดับ
        </td>
        <td style="text-align: center;">
            ชื่อ-นามสกุล
        </td>
        <td style="text-align: center;">
            แผนก
        </td>
        <td style="text-align: center;">
            คะแนนนักศึกษา
        </td>
        <td style="text-align: center;">
            เกรดนักศึกษา
        </td>
    </tr>
    <?php
    foreach ($students as $key => $student) {
    ?>
        <tr>
            <td style="text-align: center;">
                <?php echo $key + 1 ?>
            </td>
            <td>
                <?php echo $student['prename_name'] .  ' ' . $student['student_name_th'] . ' ' . $student['student_name_en'] ?>
            </td>
            <td style="text-align: center;">
                <?php echo $student['department_name'] ?>
            </td>
            <td style="text-align: center;">
                <?php echo $student['grade_student'] ?>
            </td>
            <td style="text-align: center;">
                <?php
                if (@$student['grade_student'] > 80) {
                    $textGrade1 = '4';
                } else if (@$student['grade_student'] >= 75) {
                    $textGrade1 = '3.5';
                } else if (@$student['grade_student'] >= 70) {
                    $textGrade1 = '3';
                } else if (@$student['grade_student'] >= 65) {
                    $textGrade1 = '2.5';
                } else if (@$student['grade_student'] >= 60) {
                    $textGrade1 = '2';
                } else if (@$student['grade_student'] >= 55) {
                    $textGrade1 = '1.5';
                } else if (@$student['grade_student'] >= 50) {
                    $textGrade1 = '1';
                } else if (@$student['grade_student'] < 50) {
                    $textGrade1 = '0';
                } else {
                    $textGrade1 = '-';
                }
                ?>
                <?php
                echo $textGrade1;
                ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>