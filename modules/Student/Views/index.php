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
                        เบอร์ติดต่อนักศึกษา
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
                // echo '<pre>';
                // print_r($students);
                // echo '</pre>';
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
                            <?php echo $student['student_phone'] ?>
                        </td>
                        <td>
                            <?php echo $student['student_teacher_name'] ?>
                        </td>
                        <td class="text-center">
                            <img style="height: 120px; " class="img-fluid" src="<?php echo base_url('public/files/imgStd' . '/' . $student['student_img']) ?>" alt="">
                        </td>
                        <td>
                            <a class="btn btn-info text-white" href="<?php echo base_url('Student/SubjectStudent?id=' . $student['users_id']) ?>"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                            <a href="<?php echo base_url('Student/manage/' . $student['student_id']) ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button onclick="DeleteSubject(<?php echo $student['users_id'] ?>)" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
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

<?php if (session()->getFlashdata('msg') != null) : ?>
    <script script type="text/javascript">
        Swal.fire({
            icon: 'error',
            title: '<?= session()->getFlashdata('msg') ?>',
            timer: 2000,
        })
    </script>
<?php endif; ?>
<script>
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
                    url: '<?= base_url('/Student/DeleteStudent'); ?>',
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'ลบข้อมูลของนักเรียนสำเร็จ',
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
    $(document).ready(function() {
        $('#myTable').dataTable({});
    })
</script>
<?php $this->endSection() ?>