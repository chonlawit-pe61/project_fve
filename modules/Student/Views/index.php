<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="pt-3 px-3">
    <h1 class="mt-0"><u><b>ค้นหารายชื่อ</b></u> นักเรียนนักศึกษา Pre-Ved Fve</h1>
    <div class="px-3 py-3">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <td class="text-start" style="width: 18%;">
                        ชื่อ
                    </td>
                    <td class="text-start" style="width: 18%;">
                        นามสกุล
                    </td>
                    <td class="text-start" style="width: 19%;">
                        แผนกวิชา
                    </td>
                    <td class="text-start" style="width: 8%;">
                        ชั้นปี
                    </td>
                    <td class="text-start" style="width: 8%;">
                        ห้อง
                    </td>
                    <td class="text-start" style="width: 15%;">
                        ครูที่ปรึษา
                    </td>
                    <td class="text-start">
                        รูป
                    </td>
                    <td>
                        เครื่องมือ
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($students as $student) {
                ?>
                    <tr>
                        <td>
                            <?php echo $student['student_name_th'] ?>
                        </td>
                        <td>
                            <?php echo $student['student_lname_th'] ?>
                        </td>
                        <td>
                            <?php echo $student['department_name'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $student['education_year_name'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $student['education_room_name'] ?>
                        </td>
                        <td>
                            <?php echo $student['prename_student_teacher'] . ' ' . $student['student_teacher_name'] ?>
                        </td>
                        <td class="text-center">
                            <img style="height: 120px; " class="img-fluid" src="<?php echo base_url('public/files/imgStd' . '/' . $student['student_img']) ?>" alt="">
                        </td>
                        <td>
                            <button class="btn btn-warning"><i class="fa fa-pen"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i> </button>

                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>

<script>
    $(document).ready(function() {
        $('#myTable').dataTable({});
    })
</script>
<?php $this->endSection() ?>