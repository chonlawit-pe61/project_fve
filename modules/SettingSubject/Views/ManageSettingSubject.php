<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm">
    <div class="row">
        <div class="col-md-12">
            <h3 class="float-left">กำหนดรายวิชา</h3>

        </div>
        <div class="col-md-12 mt-3">
            <form class="row" method="post" action="<?php echo base_url('SettingSubject/CreateUpdateSettingSubject') ?>">
                <input type="hidden" name="plan_education_id" value="<?php echo @$plan_education['plan_education_id'] ?>">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ชื่อแผน</label>
                        <input type="text" name="plan_education_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$plan_education['plan_education_name'] ?>">
                    </div>
                </div>
                <div class="col-lg-12 text-end mb-3">
                    <button type="button" class="btn btn-primary" onclick="showModal()">
                        เพิ่มวิชา
                    </button>
                </div>
                <div class="col-lg-12">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td style="width: 10%;" class="text-center">
                                    ลำดับ
                                </td>
                                <td>
                                    รหัสวิชา
                                </td>
                                <td>
                                    วิชา
                                </td>

                                <td>
                                    ชื่อผู้สอน
                                </td>
                                <td style="width: 10%;">
                                    เครื่องมือ
                                </td>
                            </tr>
                        </thead>
                        <tbody id="tbl_body">
                            <?php
                            if (!empty($plan_subjects)) {
                                foreach ($plan_subjects as $key => $subject) {
                            ?>
                                    <tr id="Subject<?php echo $key ?>" class="Subject_len">
                                        <td class="text-center">
                                            <?php echo $key + 1 ?>
                                            <input type="hidden" name="subject_id[<?php echo $key ?>]" value="<?php echo $subject['id_subject'] ?>">
                                        </td>
                                        <td>
                                            <?php echo $subject['subjects_id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $subject['name'] ?>
                                        </td>
                                        <td>
                                            <select class="form-select" name="teacher_id[<?= $subject['id_subject'] ?>]" require aria-label="Default select example">
                                                <option value="">เลือกอาจารย์ผู้สอน</option>
                                                <?php
                                                if (!empty($getTeacherListAll)) {
                                                    foreach ($getTeacherListAll as $teacher) {
                                                ?>
                                                        <option <?php echo @$subject['teacher_id'] == @$teacher['id'] ? 'selected' : '' ?> value="<?php echo @$teacher['id'] ?>">
                                                            <?php echo @$teacher['firstname'] . ' ' . @$teacher['lastname'] ?>
                                                        </option>

                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger" onclick="RemoveSubject(<?php echo $subject['plan_subjects_id'] ?>,<?php echo $key ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-success">
                        บันทึก
                    </button>
                    <a href="<?= base_url('SettingSubject') ?>" class="btn btn-dark">ย้อนกลับ</a>
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
                                        หน่วยกิต
                                    </td>
                                    <td>
                                        ชื่อผู้สอน
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
                                                <input class="form-check-input ck_check" type="checkbox" value="<?php echo $subject['id_subject'] ?>" id="">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $key + 1 ?>
                                        </td>
                                        <td>
                                            <?php echo $subject['name'] ?>
                                        </td>

                                        <td>
                                            <?php echo $subject['unit'] ?>
                                        </td>

                                        <td>
                                            <?php echo $subject['prename_name'] . ' ' . $subject['firstname'] . ' ' . $subject['lastname'] ?>
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


    });
    const showModal = () => {
        $('#exampleModal').modal('show', () => {
            $('#myTable').dataTable();
        });

    }


    const RemoveSubject = (id, idx) => {
        $.ajax({
            url: "<?php echo base_url('SettingSubject/RemoveSubject') ?>",
            type: "post",
            data: {
                'subject_id': id
            },
            success: function(res) {
                $(`#Subject${idx}`).remove();
            }
        });
    }

    const RemoveEl = (idx) => {

        $(`#Subject${idx}`).remove();
    }

    const teacherList = <?php echo json_encode($getTeacherListAll); ?>;
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
                if (res == 1) {
                    Swal.fire({
                        icon: "error",
                        title: "มีบางอย่างผิดพลาด",
                        text: "วิชาที่เลือกซ้ำกับข้อมูลในตาราง",
                    });
                } else {
                    let json_res = JSON.parse(res);
                    $('#tbl_body').empty();
                    json_res.map((val, idx) => {
                        let options = '<option value="">เลือกอาจารย์ผู้สอน</option>';
                        teacherList.forEach(t => {
                            let selected = (t.id == val.teacher_id) ? 'selected' : '';
                            options += `<option value="${t.id}" ${selected}>${t.firstname} ${t.lastname}</option>`;
                        });
                        let len = $('.Subject_len').length;
                        $('#tbl_body').append(`
                        <tr id="Subject${len+1}" class="Subject_len">
                                <td class="text-center">
                                    ${len+1}
                                    <input type="hidden" name="subject_id[${len+1}]" value="${val.id_subject}">
                                </td>
                                <td>
                                ${val.name}
                                </td>
                                <td>${val.subjects_id}</td>
                                <td>
                                <select class="form-select" name="teacher_id[${val.id_subject}]" required>
                                    ${options}
                                </select>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger" onclick="RemoveEl(${len+1})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        `);
                    })
                    $('#exampleModal').modal('hide');
                }

            }
        });
    }
</script>
<?php $this->endSection() ?>