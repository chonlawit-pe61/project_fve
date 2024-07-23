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
                        <th width="5%">#</th>
                        <th width="15%">หมวดวิชา</th>
                        <th width="30%">ชื่อวิชา</th>
                        <th width="10%">หน่วยกิต</th>
                        <th width="20%">เครื่องมือ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        foreach ($data as $key => $row) {
                    ?>
                            <tr>
                                <td class="text-center">
                                    <?php
                                    echo $key + 1 // echo  
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['group_id'] ?>
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <a href="http://localhost:8888/project_fve/subjects/manage/1" class="btn btn-secondary btn-sm"><i class="fa fa-pen"></i></a>
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
        console.log(id)
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
                            $('#subjects-tbl').DataTable().ajax.reload(null, false);
                        })
                    }
                })
            }
        });
    }
</script>
<?php $this->endSection(); ?>