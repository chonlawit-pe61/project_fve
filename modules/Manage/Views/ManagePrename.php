<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<h1 class="mb-2 mt-0">จัดการคำนำหน้า</h1>
<table class="table">
    <thead>
        <tr>
            <td style="width: 10%;">ลำดับ</td>
            <td>คำนำหน้า</td>
            <td>เครื่องมือ</td>
        </tr>
    </thead>
    <tbody>
        <form action="<?php echo base_url('Manage/SubmitFormPrename') ?>" method="post">
            <?php
            if (!empty($prenames)) {
                foreach ($prenames as $key => $prename) {
            ?>
                    <tr>
                        <td>
                            <?php echo $key + 1 ?>
                        </td>
                        <td>
                            <?php
                            if ($_GET['id'] == $prename['prename_id']) {
                            ?>
                                <input type="hidden" name="prename_id" value="<?php echo $prename['prename_id'] ?>">
                                <input type="text" name="prename" class="form-control" value="<?php echo $prename['prename_name']  ?>">
                            <?php
                            } else {
                            ?>
                                <?php echo $prename['prename_name'] ?>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($_GET['id'] == $prename['prename_id']) {
                            ?>
                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                            <?php
                            }
                            ?>
                            <a href="<?php echo base_url('Manage/ManagePrename?id=' . $prename['prename_id']) ?>" class="btn btn-warning">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </a>
                            <button type="button" onclick="DeletePrename(<?php echo $prename['prename_id'] ?>)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </form>

        <form action="<?php echo base_url('Manage/SubmitFormPrename') ?>" method="post">
            <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    <input type="text" name="prename" class="form-control" value="">
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
                        'prename_id': id
                    },
                    url: '<?= base_url('/Manage/DeletePrename'); ?>',
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'ลบข้อมูลคำนำหน้าสำเร็จ',
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