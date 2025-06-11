<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<h1 class="mb-2 mt-0">หมวดสาขาวิชา</h1>
<table class="table">
    <thead>
        <tr>
            <td style="width: 15%;" class="text-center">ลำดับ</td>
            <td>หมวดสาขาวิชา</td>
            <td>เครื่องมือ</td>
        </tr>
    </thead>
    <tbody>
        <form action="<?php echo base_url('Manage/SubmitSubjectCatagory') ?>" method="post">
            <?php
            if (!empty($subjectCatagory)) {
                foreach ($subjectCatagory as $key => $row) {
            ?>
                    <tr>
                        <td class="text-center">
                            <?php
                            if (@$_GET['id'] == $row['subject_catagory_id']) {
                            ?>
                                <select class="form-select" aria-label="Default select example" name="subject_group_id">
                                    <?php
                                    if (!empty($getSubjectGroup)) {
                                        foreach ($getSubjectGroup as $rowGrop) {
                                    ?>
                                            <option value="<?php echo $rowGrop['id'] ?>"><?php echo $rowGrop['group_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            <?php
                            } else {
                                echo $key + 1;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (@$_GET['id'] == $row['subject_catagory_id']) {
                            ?>
                                <input type="hidden" name="subject_catagory_id" value="<?php echo $row['subject_catagory_id'] ?>">
                                <input type="text" name="subject_catagory_name" class="form-control" value="<?php echo $row['subject_catagory_name']  ?>">
                            <?php
                            } else {
                            ?>
                                <?php echo $row['subject_catagory_name'] ?>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (@$_GET['id'] == $row['subject_catagory_id']) {
                            ?>
                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                            <?php
                            } else {
                            ?>
                                <a type="button" href="<?php echo base_url('Manage/ManagesubjectCatagory?id=' . $row['subject_catagory_id']) ?>" class="btn btn-warning">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                </a>

                                <button type="button" onclick="DeletePrename(<?php echo $row['subject_catagory_id'] ?>)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <?php
                            }
                            ?>

                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </form>
        <?php
        if (empty($_GET['id'])) {
        ?>
            <form action="<?php echo base_url('Manage/SubmitSubjectCatagory') ?>" method="post">
                <tr>
                    <td>
                        <select class="form-select" aria-label="Default select example" name="subject_group_id">
                            <?php
                            if (!empty($getSubjectGroup)) {
                                foreach ($getSubjectGroup as $row) {
                            ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['group_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="subject_catagory_name" class="form-control" value="">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </form>
        <?php
        }
        ?>



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
                    url: '<?= base_url('/Manage/DeleteSubjectCatagory'); ?>',
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'ลบประเภทหมวดสาขาวิชาสำเร็จ',
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