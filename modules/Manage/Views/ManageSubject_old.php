<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<h1 class="mb-2 mt-0">จัดการหมวดหมู่วิชา</h1>
<table class="table">
    <thead>
        <tr>
            <td style="width: 10%;">ลำดับ</td>
            <td>รหัสวิชา</td>
            <td>หมวดวิชา</td>
            <td>เครื่องมือ</td>
        </tr>
    </thead>
    <tbody>
        <form action="<?php echo base_url('Manage/SubmitFormSubject') ?>" method="post">
            <?php
            if (!empty($Subjects)) {
                foreach ($Subjects as $key => $Subject) {
            ?>
                    <tr>
                        <td>
                            <?php echo $key + 1 ?>
                        </td>
                        <td>
                            <?php
                            if ($_GET['id'] == $Subject['id']) {
                            ?>
                                <input type="text" name="group_code" class="form-control" value="<?php echo $Subject['group_code']  ?>">
                            <?php
                            } else {
                            ?>
                                <?php echo $Subject['group_code'] ?>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($_GET['id'] == $Subject['id']) {
                            ?>
                                <input type="hidden" name="id" value="<?php echo $Subject['id'] ?>">
                                <input type="text" name="group_name" class="form-control" value="<?php echo $Subject['group_name']  ?>">
                            <?php
                            } else {
                            ?>
                                <?php echo $Subject['group_name'] ?>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($_GET['id'] == $Subject['id']) {
                            ?>
                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                            <?php
                            }
                            ?>
                            <a href="<?php echo base_url('Manage/SubjectType?id=' . $Subject['id']) ?>" class="btn btn-warning">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </a>
                            <button type="button" onclick="DeletePrename(<?php echo $Subject['id'] ?>)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </form>

        <form action="<?php echo base_url('Manage/SubmitFormSubject') ?>" method="post">
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="text" name="group_code" class="form-control">
                </td>
                <td>
                    <input type="text" name="group_name" class="form-control" value="">
                </td>
                <td>
                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </td>
            </tr>
        </form>


    </tbody>
</table>

</section>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>
    const DeletePrename = (id) => {
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
                    url: '<?= base_url('/Manage/DeleteSubject'); ?>',
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'ลบข้อมูลหมวดวิชาสำเร็จ',
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
        $('#tb').dataTable({});
    })
</script>
<?php $this->endSection() ?>