<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm">
    <div class="row">
        <div class="col-md-12">
            <h3 class="float-left">รายวิชา</h3>
            <a href="<?= base_url('subjects/manage'); ?>" class="btn btn-success float-right">เพิ่ม</a>
        </div>
        <div class="col-md-12 mt-3">
            <table id="subjects-tbl" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">ลำดับ</th>
                        <th width="15%" class="text-center">หมวดวิชา</th>
                        <th class="text-center">รหัสวิชา</th>
                        <th width="30%" class="text-center">ชื่อวิชา</th>
                        <th width="5%" class="text-center">หน่วยกิต</th>
                        <th class="text-center">ผู้สอน</th>
                        <th width="10%" class="text-center">เครื่องมือ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($Subject)) {

                        foreach ($Subject as $key => $sb) {
                    ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $key + 1 ?>
                                </td>
                                <td>
                                    <?php echo $sb['group_name'] ?>
                                </td>
                                <td>
                                    <?php echo $sb['subjects_id'] ?>
                                </td>
                                <td><?php echo $sb['name'] ?></td>
                                <td class="text-center">
                                    <?php echo $sb['unit'] ?>
                                </td>
                                <td>
                                    <?php echo $sb['prename_name'] . ' ' . $sb['firstname'] . ' ' . $sb['lastname'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="<?php echo base_url('subjects/manage/' . $sb['id_subject']) ?>">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="deleteSubject('<?php echo $sb['id_subject'] ?>')"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    function deleteSubject(id) {
        // console.log(id)
        Swal.fire({
            title: "แจ้งเตือนจากระบบ",
            text: "คุณต้องการลบข้อมูลแถวนี้หรือไม่?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ตกลง",
            cancelButtonText: "ยกเลิก"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>/subjects/delete",
                    data: {
                        id: id
                    },
                    success: function(res) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "ทำรายการสำเร็จ",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        })
                    }
                })
            }
        });
    }
</script>
<?php $this->endSection(); ?>