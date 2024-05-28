<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm">
    <div class="row">
        <div class="col-md-12">
            <h3 class="float-left">กำหนดรายวิชา</h3>

        </div>
        <div class="col-md-12 mt-3">
            <form class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ชื่อแผน</label>
                        <input type="text" name="plan_education_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-lg-12 text-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        เพิ่มวิชา
                    </button>
                </div>
                <div class="col-lg-12">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td style="width: 20%;" class="text-center">
                                    ลำดับ
                                </td>
                                <td>
                                    วิชา
                                </td>
                                <td style="width: 10%;">
                                    เครื่องมือ
                                </td>
                            </tr>
                        </thead>
                        <tbody id="tbl_body">
                        </tbody>
                    </table>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    เลือกวิชา
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered w-100" id="myTable">
                            <thead>
                                <tr>
                                    <td>

                                    </td>
                                    <td class="text-center">
                                        ลำดับ
                                    </td>
                                    <td>
                                        ชื่อวิชา
                                    </td>
                                    <td>
                                        ทฤษฎี
                                    </td>
                                    <td>
                                        ปฎิบัติ
                                    </td>
                                    <td>
                                        หน่วยกิต
                                    </td>
                                    <td>
                                        ชั่วโมง
                                    </td>
                                </tr>
                            </thead>
                            <tbody id="">
                                <?php
                                foreach ($subjects as  $key => $subject) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input ck_check" type="checkbox" value="<?php echo $subject['id'] ?>" id="flexCheckDefault">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $key + 1 ?>
                                        </td>
                                        <td>
                                            <?php echo $subject['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $subject['lecture_unit'] ?>
                                        </td>
                                        <td>
                                            <?php echo $subject['practical_unit'] ?>
                                        </td>
                                        <td>
                                            <?php echo $subject['unit'] ?>
                                        </td>
                                        <td>
                                            <?php echo $subject['hour'] ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="CheckSubject()">เลือกวิชา</button>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });

    const RemoveEl = (idx) => {

        $(`#Subject${idx}`).remove();
    }

    const CheckSubject = () => {
        let arrayCheck = [];
        $('.ck_check:checked').each(function(idx) {
            arrayCheck.push(this.value)
        });
        $.ajax({
            url: "<?php echo base_url('SettingSubject/getSubjectToTable') ?>",
            type: "post",
            data: {
                'subject': arrayCheck
            },
            success: function(res) {
                $('#tbl_body').empty();
                $('#tbl_body').html(res);
                // $('#exampleModal').modal().hide();
                $('#exampleModal').modal('hide');
                // console.log(res);
            }
        });
    }
</script>
<?php $this->endSection() ?>