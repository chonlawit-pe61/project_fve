<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm mb-2">
    <h1 class="mt-0"><u><b>ค้นหานักเรียน</b></u></h1>
    <div class="my-3">
        <form action="" method="get">
            <div class="row">
                <div class="col-lg-2">
                    <label for="">แผนกวิชา</label>
                    <select class="form-select" name="department" aria-label="Default select example">
                        <option value="0">แสดงทั้งหมด</option>
                        <?php
                        foreach ($department as $dp) {
                        ?>
                            <option <?php echo @$dp['department_id'] == @$_GET['department'] ? 'selected' : '' ?> value="<?php echo $dp['department_id'] ?>"><?php echo $dp['department_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="">เลขบัตรประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="id_card" value="<?php echo @$_GET['id_card'] ? $_GET['id_card'] : '' ?>">
                </div>

                <div class="col-lg-2">
                    <label for="">ชั้นปี</label>

                    <select class="form-select" aria-label="Default select example" name="year">
                        <option value="0">เลือกชั้นปี</option>
                        <?php
                        foreach ($education_year as $ey) {
                        ?>
                            <option <?php echo @$ey['education_year_id'] == @$_GET['year'] ? 'selected' : '' ?> value="<?php echo $ey['education_year_id'] ?>"><?php echo $ey['education_year_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="col-lg-2">
                    <label for="">ห้อง</label>
                    <select class="form-select" aria-label="Default select example" name="room">
                        <option value="0">เลือกห้อง</option>
                        <?php
                        foreach ($education_room as $er) {
                        ?>
                            <option <?php echo @$er['education_room_id'] == @$_GET['room'] ? 'selected' : '' ?> value="<?php echo $er['education_room_id'] ?>"><?php echo $er['education_room_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="col-lg-3 ">
                    <label for="" class="form-label" style="margin-bottom:28px"></label>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-success w-100 mx-1">ค้นหา</button>
                        <a href="<?php echo base_url('ManageSubjectStd') ?>" class="btn btn-danger w-100 mx-1">ล้างค่า</a>
                    </div>
                </div>

            </div>
        </form>
    </div>

</div>
<div class="p-3 border shadow-sm">
    <h1 class="mt-0"><u><b>รายชื่อนักเรียน</b></u></h1>
    <div class="px-3 py-3">
        <div class="">
            <table class="table table-bordered" id="tblData">
                <thead>
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" class="largerCheckbox" id="chkAll" />
                        </td>
                        <td class="text-start">
                            ชื่อ-นามสกุล
                        </td>
                        <td>
                            เลขบัตรประจำตัวประชาชน
                        </td>
                        <td class="text-start">
                            แผนกวิชา
                        </td>
                        <td>
                            ชั้นปี
                        </td>
                        <td>
                            ห้อง
                        </td>
                        <td class="text-start">
                            เบอร์ติดต่อนักศึกษา
                        </td>

                        <td class="text-start">
                            ครูที่ปรึษา
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listStudent as $key => $student) {
                        $textCheckSubject = '';
                        $textStatusSubject = '';
                        if ($student['plan_student_id'] != '') {
                            $textStatusSubject = 'text-success';
                            $textCheckSubject = 'ลงทะเบียนเรียบร้อย';
                        } else {
                            $textStatusSubject = 'text-danger';
                            $textCheckSubject = 'ยังไม่ได้ลงทะเบียน';
                        }
                    ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" id="<?php echo $student['student_id'] ?>" value="<?php echo $student['users_id'] ?>" class="largerCheckbox tblChk chk<?php echo $key ?>">
                            </td>
                            <td>
                                <?php echo $student['student_name_th'] . ' ' . $student['student_lname_th'] ?>
                            </td>
                            <td>
                                <?php echo $student['student_id_card'] ?>
                            </td>


                            <td>
                                <?php echo $student['department_name'] ?>
                            </td>
                            <td>
                                <?php echo $student['student_level'] ?>
                            </td>
                            <td>
                                <?php echo $student['student_room'] ?>
                            </td>
                            <td>
                                <?php echo $student['student_phone'] ?>
                            </td>

                            <td>
                                <?php echo $student['firstname'] . ' ' . $student['lastname'] ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <form action="<?php echo base_url('ManageSubjectStd/ManageSubjectStdList') ?>" method="post">
            <div class="row">
                <div class="col-lg-3">
                    <label for="">แผนรายวิชา</label>
                    <select class="form-select" aria-label="Default select example" name="plan_education_id">
                        <option value="0">เลือกแผนรายวิชา</option>
                        <?php
                        foreach ($plan_education as $plan) {
                        ?>
                            <option value="<?php echo @$plan['plan_education_id'] ?>"><?php echo $plan['plan_education_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="">ปีการศึกษา</label>
                    <select class="form-select" aria-label="Default select example" name="plan_student_year">
                        <option value="0">เลือกปีการศึกษา</option>
                        <?php
                        for ($i = date('Y') + 10; $i >= date('Y') - 10; $i--) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i + 543 ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="">เทอม</label>
                    <select class="form-select" aria-label="Default select example" name="plan_student_term">
                        <option value="0">เลือกเทอม</option>
                        <option value="1">1</option>
                        <option value="2">2</option>

                    </select>
                </div>
                <div class="col-lg-12 mt-3 text-center">
                    <button class="btn btn-success">
                        บันทึกข้อมูล
                    </button>
                </div>
            </div>
            <div class="selectedDiv"></div>
        </form>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>
    $('#tblData').on('change', '.tblChk', function() {
        if ($('.tblChk:checked').length == $('.tblChk').length) {
            $('#chkAll').prop('checked', true);
        } else {
            $('#chkAll').prop('checked', false);
        }
        getCheckRecords();
    });
    $("#chkAll").change(function() {
        if ($(this).prop('checked')) {
            $('.tblChk').not(this).prop('checked', true);
        } else {
            $('.tblChk').not(this).prop('checked', false);
        }
        getCheckRecords();
    })

    function getCheckRecords() {
        $(".selectedDiv").html("");
        $('.tblChk:checked').each(function() {
            // debugger;
            if ($(this).prop('checked')) {
                console.log(this.value);
                if ($(".selectedDiv").children().length == 0) {
                    const rec = `<input type="text" name="id_student[]" value="${this.value}" />`;
                    $(".selectedDiv").append(rec);
                } else {
                    const rec = `<input type="text" name="id_student[]" value="${this.value}" />`;
                    $(".selectedDiv").append(rec);
                }
            }
            // console.log(this.value);
        });
    }
</script>
<?php $this->endSection() ?>