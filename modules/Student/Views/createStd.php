<?php $this->extend('template/layout') ?>


<?php $this->section('style'); ?>;
<style>
    label {
        margin: 0px;
    }
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="pt-1 px-3">
    <h1 class="mt-0">เพิ่มรายชื่อนักเรียนนักศึกษา Pre-Ved Fve</h1>
    <div class="">
        <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
            <div class="">
                <form id="saveForm" action="<?php echo base_url('/Student/createStd') ?>" method="post" enctype="multipart/form-data">
                    <!-- ส่วนที่ 1 -->
                    <input type="hidden" name="id_users" value="<?php echo !empty($student['id']) ? $student['id'] : '' ?>">
                    <input type="hidden" name="student_id" value="<?php echo !empty($student['student_id']) ? $student['student_id'] : ''  ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3><u><b>ส่วนที่ 1</b></u> ข้อมูลนักศึกษา</h3>
                        </div>
                        <div class="col-lg-12">
                            <hr style="border: none; height: 2px; background-color: #030100;">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>เลขบัตรประจำตัวประชาชน</label>
                                <input id="numberpeople" class="form-control" type="text" maxlength="13" placeholder="กรุณากรอกเลขบัตร 13 หลัก" name="numberpeople" required value="<?php echo !empty($student['student_id_card']) ? $student['student_id_card'] : '' ?>">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>เลือกประเภทบัตร</label>
                            <select id="type_card_id" id="type_card_id" class="form-select" style="text-align: start;" name="type_card_id">
                                <option value="0">กรุณาเลือกบัตรประชน</option>
                                <?php
                                foreach ($type_card as $type) {
                                ?>
                                    <option <?php echo $student['student_type_card'] == $type['type_card_id'] ? 'selected' : '' ?> value="<?php echo $type['type_card_id'] ?>"><?php echo $type['type_card_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>คำนำหน้า</label>
                            <select id="typepeopleguardian" class="form-select" style="text-align: start;" name="prename">
                                <option value="0"></option>
                                <?php
                                foreach ($prenames as $prename) {
                                ?>
                                    <option <?php echo $student['prename_id'] ==  $prename['prename_id'] ? 'selected' : '' ?> value="<?php echo $prename['prename_id'] ?>"><?php echo $prename['prename_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>ชื่อ</label>
                            <input value="<?php echo !empty($student['student_name_th']) ? $student['student_name_th'] : '' ?>" id="thainamestd" type="text" class="form-control" placeholder="ชื่อไทย" name="thainamestd">
                        </div>
                        <div class="col-lg-3">
                            <label>นามสกุล</label>
                            <input value="<?php echo !empty($student['student_lname_th']) ? $student['student_lname_th'] : '' ?>" id="thailaststd" type="text" class="form-control" placeholder="นามสกุลไทย" name="thailaststd">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ชื่อภาษาอังกฤษ</label>
                                <input value="<?php echo !empty($student['student_name_en']) ? $student['student_name_en'] : '' ?>" id="engnamestd" type="text" class="form-control" placeholder="ชื่ออังกฤษ" name="engnamestd">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>นามสกุลอังกฤษ</label>
                            <input value="<?php echo !empty($student['student_lname_en']) ? $student['student_lname_en'] : '' ?>" id="englaststd" type="text" class="form-control" placeholder="นามสกุลอังกฤษ" name="englaststd">
                        </div>
                        <div class="col-lg-3">
                            <label>ที่อยู่ปัจจุบัน</label>
                            <input value="<?php echo !empty($student['student_address']) ? $student['student_address'] : '' ?>" id="housenumber" type="text" class="form-control" placeholder="ที่อยู๋ปัจจุบัน" name="housenumber">
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>หมู่ที่</label>
                                <input value="<?php echo !empty($student['student_moo']) ? $student['student_moo'] : '' ?>" id="village" type="text" class="form-control" placeholder="หมู่ที่" name="village">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>จังหวัด</label>
                            <select id="province" class="form-select" style="text-align: start;" name="province" onchange="getdistrict('district', this.value)">
                                <option value="0">กรุณาเลือกจังหวัด</option>
                                <?php
                                foreach ($provinces as $province) {
                                ?>
                                    <option <?php echo $student['student_province'] == $province['id'] ? 'selected' : '' ?> value="<?php echo $province['id'] ?>"><?php echo $province['province_th'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>อำเภอ</label>
                            <select class="form-select" style="text-align: start;" name="district" id="district" onchange="getSubdistict('subdistrict', this.value)">
                                <option value="0">กรุณาเลือกอำเภอ</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>ตำบล</label>
                            <select class="form-select" style="text-align: start;" name="subdistrictstd" id="subdistrict">
                                <option value="0">กรุณาเลือกตำบล</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>เพศ</label>
                                <select class="form-select" style="text-align: start;" name="gender" id="gender">
                                    <option value="0">กรุณาเลือกเพศ</option>
                                    <?php
                                    foreach ($genders as $gender) {
                                    ?>
                                        <option <?php echo $student['student_gender'] == $gender['gender_id'] ? 'selected' : ''  ?> value="<?php echo $gender['gender_id'] ?>"><?php echo $gender['gender_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>ศาสนา</label>
                            <select class="form-select" style="text-align: start;" name="religion" id="religion">
                                <option value="0">กรุณาเลือกศาสนา</option>
                                <?php
                                foreach ($religions as $religion) {
                                ?>
                                    <option <?php echo $student['student_religion'] == $religion['religion_id'] ? 'selected' : ''  ?> value="<?php echo $religion['religion_id'] ?>"><?php echo $religion['religion_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-lg-3">
                            <label>หมู่เลือด</label>
                            <select class="form-select" style="text-align: start;" name="blood_type" id="blood_type">
                                <option value="0">กรุณาเลือกหมู่เลือด</option>
                                <?php
                                foreach ($bloods as $blood) {
                                ?>
                                    <option <?php echo $student['student_blood'] == $blood['blood_id'] ? 'selected' : ''  ?> value="<?php echo $blood['blood_id'] ?>"><?php echo $blood['blood_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>โรคประจำตัว</label>
                            <input value="<?php echo !empty($student['student_congenital_disease']) ? $student['student_congenital_disease'] : '' ?>" type="text" class="form-control" placeholder="กรุณณากรอกโรคประจำตัว" name="chronic_disease">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>เบอร์ติดต่อนักศึกษา</label>
                                <input value="<?php echo !empty($student['student_phone']) ? $student['student_phone'] : '' ?>" id="student_phone_number" type="number" class="form-control" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของนักศึกษา" name="student_phone_number">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>สถานศึกษาเดิม</label>
                            <input value="<?php echo !empty($student['student_original_educational']) ? $student['student_original_educational'] : '' ?>" id="schoolName" class="form-control" type="text" placeholder="กรุณณากรอกชื่อสถานศึกษาเดิม" name="schoolName">
                        </div>
                        <div class="col-lg-3">
                            <label>จบการศึกษาระดับ</label>
                            <select class="form-select" style="text-align: start;" name="level" id="level">
                                <option value="0">กรุณาเลือกจบการศึกษาระดับ</option>
                                <?php
                                foreach ($education_levels as $education_level) {
                                ?>
                                    <option <?php echo $student['student_graduated_level'] == $education_level['education_level_id'] ? 'selected' : ''  ?> value="<?php echo $education_level['education_level_id'] ?>"><?php echo $education_level['education_level_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>แผนกวิชา</label>
                            <select id="department" class="form-select" style="text-align: start;" name="department">
                                <option value="0">กรุณาเลือกแผนกวิชา</option>
                                <?php
                                foreach ($departments as $department) {
                                ?>
                                    <option <?php echo $student['student_department'] == $department['department_id'] ? 'selected' : ''  ?> value="<?php echo $department['department_id'] ?>"><?php echo $department['department_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label>ชั้นปี</label>
                            <input value="<?php echo !empty($student['student_level']) ?  $student['student_level'] : '' ?>" id="schoolName" class="form-control" type="text" placeholder="กรุณณากรอกชื่อสถานศึกษาเดิม" name="student_level">
                        </div>
                        <div class="col-lg-3">
                            <label>ห้อง</label>
                            <input value="<?php echo !empty($student['student_room']) ? $student['student_room'] : '' ?>" id="schoolName" class="form-control" type="text" placeholder="กรุณณากรอกชื่อสถานศึกษาเดิม" name="student_room">
                        </div>
                        <div class="col-lg-3">
                            <label>ครูที่ปรึกษา</label>
                            <select id="teacherTitle" class="form-select" style="text-align: start;" name="teacherTitle">
                                <option value="0">กรุณาเลือกครูที่ปรึกษา</option>
                                <?php
                                foreach ($users as $user) {
                                ?>
                                    <option <?php echo $student['student_teacher_id'] == $user['id'] ? 'selected' : ''  ?> value="<?php echo $user['id'] ?>"><?php echo $user['firstname'] . ' ' . $user['lastname'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-lg-3 ">
                            <label for="formFileLg" class="form-label">รูปภาพของนักศึกษา</label>
                            <input class="form-control " type="file" name="file1">
                        </div>
                        <div class="col-lg-3 ">
                            <label for="formFileLg" class="form-label">username</label>
                            <input value="<?php echo !empty($student['username']) ? $student['username'] : '' ?>" class="form-control" type="text" name="username" placeholder="กรุณากรอก username สำหรับใช้ในการเข้าสู่ระบบ">
                        </div>
                        <div class="col-lg-3 ">
                            <label for="formFileLg" class="form-label">password</label>
                            <input class="form-control" type="text" name="password" placeholder="กรุณากรอก password สำหรับใช้ในการเข้าสู่ระบบ">
                        </div>

                        <!-- ส่วนที่ 3 -->
                        <div class="col-lg-12 mt-3">
                            <h3><u><b>ส่วนที่ 2</b></u> ข้อมูลผู้ปกครอง</h3>
                        </div>
                        <div class="col-lg-12">
                            <hr style="border: none; height: 2px; background-color: #030100;">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ชื่อผู้ปกครอง</label>
                                <input value="<?php echo !empty($student['student_guardian_name']) ? $student['student_guardian_name'] : '' ?>" id="firstnameguardian" type="text" class="form-control" placeholder="ชื่อผู้ปกครอง" name="firstnameguardian">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>นามสกุลผู้ปกครอง</label>
                            <input value="<?php echo !empty($student['student_guardian_lname']) ? $student['student_guardian_lname'] : '' ?>" id="lastnameguardian" type="text" class="form-control" placeholder="นามสกุลผู้ปกครอง" name="lastnameguardian">
                        </div>
                        <div class="col-lg-3">
                            <label>เลขบัตรประจำตัวประชาชนของผู้ปกครอง</label>
                            <input value="<?php echo !empty($student['student_guardian_id_card']) ? $student['student_guardian_id_card'] : '' ?>" id="numberpeopleguardian" class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeopleguardian">
                        </div>
                        <div class="col-lg-3">
                            <label>เลือกประเภทบัตร</label>
                            <select id="typepeopleguardian" class="form-select" style="text-align: start;" name="typepeopleguardian">
                                <option value="0">กรุณาเลือกประเภทบัตร</option>
                                <?php
                                foreach ($type_card as $type) {
                                ?>
                                    <option <?php echo $student['student_guardian_type_card'] ==  $type['type_card_id'] ? 'selected' : '' ?> value="<?php echo $type['type_card_id'] ?>"><?php echo $type['type_card_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ความสัมพันธ์</label>
                                <input value="<?php echo !empty($student['student_guardian_relationship']) ? $student['student_guardian_relationship'] : '' ?>" id="parentguardian" class="form-control" type="text" class="t1" placeholder="กรุณณากรอกความสัมพันธ์" name="parentguardian">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>อาชีพของผู้ปกครอง</label>
                            <input value="<?php echo !empty($student['student_guardian_job']) ? $student['student_guardian_job'] : '' ?>" id="guardian_occupation" class="form-control" type="text" placeholder="อาชีพของผู้ปกครอง" name="guardian_occupation">
                        </div>
                        <div class="col-lg-3">

                            <label>ที่อยู่ปัจจุบันของผู้ปกครอง</label>
                            <input value="<?php echo !empty($student['student_guardian_address']) ? $student['student_guardian_address'] : '' ?>" id="housenumberguardian" type="text" class="form-control" placeholder="ที่อยู่ปัจจุบัน" name="housenumberguardian">
                        </div>
                        <div class="col-lg-3">
                            <label>หมู่ที่</label>
                            <input value="<?php echo !empty($student['student_guardian_moo']) ? $student['student_guardian_moo'] : '' ?>" id="villageguardian" type="text" class="form-control" placeholder="หมู่ที่" name="villageguardian">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>จังหวัด</label>
                                <select id="provinceguardian" class="form-select" style="text-align: start;" name="provinceguardian" onchange="getdistrict('isnamedistrict', this.value)">
                                    <option value="0">กรุณาเลือกจังหวัด</option>
                                    <?php
                                    foreach ($provinces as $province) {
                                    ?>
                                        <option <?php echo $student['student_guardian_province'] == $province['id'] ? 'selected' : '' ?> value="<?php echo $province['id'] ?>"><?php echo $province['province_th'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>อำเภอ</label>
                            <select class="form-select" style="text-align: start;" name="districtguardian" id="isnamedistrict" onchange="getsubdistrictisname(this.value)">
                                <option value="0">กรุณาเลือกอำเภอ</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>ตำบล</label>
                            <select class="form-select" style="text-align: start;" name="subdistrictguardian" id="isnamesubdistrict">
                                <option value="0">กรุณาเลือกตำบล</option>

                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>เบอร์ติดต่อผู้ปกครอง</label>
                            <input value="<?php echo $student['student_guardian_phone'] ? $student['student_guardian_phone'] : '' ?>" id="phoneguardian" class="form-control" type="number" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของผู้ปกครอง" name="phoneguardian">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center my-2">
                            <button type="button" class="btn btn-success" onclick="saveData()">
                                บันทึก
                            </button>
                            <input type="reset" value="ยกเลิก" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#typepeople').select2({});
        <?php
        if (!empty($id)) {
        ?>
            getdistrict('district', '<?php echo $student['student_province'] ?>', '<?php echo $student['student_district'] ?>');
            getSubdistict('subdistrict', '<?php echo $student['student_district'] ?>', '<?php echo $student['student_subdistrict'] ?>');
            getdistrict('isnamedistrict', '<?php echo $student['student_guardian_province'] ?>', '<?php echo $student['student_guardian_district'] ?>');

            getSubdistict('isnamesubdistrict', '<?php echo $student['student_guardian_district'] ?>', '<?php echo $student['student_guardian_subdistrict'] ?>');



        <?php
        }
        ?>

    })


    const getdistrict = (element, id, select_id = '') => {
        $.ajax({
            url: '<?php echo base_url('Student/getDistrict') ?>',
            type: 'post',
            data: {
                province_id: id
            },
            success: function(msg) {
                let data = JSON.parse(msg);
                //console.log(data);
                $(`#${element}`).empty();
                $(`#${element}`).removeAttr("disabled");
                $(`#${element}`).append(`<option value="">เลือกอำเภอ</option>`);
                for (let index = 0; index < data.length; index++) {
                    if (select_id == data[index].id) {
                        selected = 'selected';
                    } else {
                        selected = '';
                    }
                    $(`#${element}`).append(`<option value="${data[index].id}" ${selected}>${data[index].district_th}</option>`)
                }
            }
        })
    }

    const getSubdistict = (element, id, select_id = '') => {
        $.ajax({
            url: '<?php echo base_url('Student/getSubdistrict') ?>',
            type: 'post',
            data: {
                subdistrict_id: id
            },
            success: function(msg) {
                let data = JSON.parse(msg);
                //console.log(data);
                $(`#${element}`).empty();
                $(`#${element}`).removeAttr("disabled");
                $(`#${element}`).append(`<option value="">เลือกตำบล</option>`);
                for (let index = 0; index < data.length; index++) {
                    if (select_id == data[index].id) {
                        selected = 'selected';
                    } else {
                        selected = '';
                    }
                    $(`#${element}`).append(`<option value ="${data[index].id}" ${selected}>${data[index].subdistrict_th}</option>`);
                }
            }
        })
    }

    // จัดหวัดมาอำเภอของผู้ปกครอง
    function getdistrictisname(id) {
        $.ajax({
            url: '<?php echo base_url('Student/getDistrict') ?>',
            type: 'post',
            data: {
                province_id: id
            },
            success: function(res) {
                // console.log(res);
                let respon = JSON.parse(res);
                // console.log(respon);
                $('#isnamedistrict').empty();
                // $('#isnamesubdistrict').empty();
                $('#isnamedistrict').append(`<option value="0">กรุณาเลือกอำเภอ</option>`)
                for (const key in respon) {
                    $('#isnamedistrict').append(`<option value='${respon[key].id}'>${respon[key].district_th}</option>`)
                }
            }
        })
    }

    function getsubdistrictisname(id) {
        $.ajax({
            url: '<?php echo base_url('Student/getSubdistrict') ?>',
            type: 'post',
            data: {
                subdistrict_id: id
            },
            success: function(res) {
                // console.log(res);
                let respon = JSON.parse(res);
                // console.log(respon);
                $('#isnamesubdistrict').empty();
                $('#isnamesubdistrict').append(`<option value="0">กรุณาเลือกตำบล</option>`);
                for (const key in respon) {
                    $('#isnamesubdistrict').append(`<option value='${respon[key].id}'>${respon[key].subdistrict_th}</option>`)
                }

            }
        })
    }

    function saveData(value) {
        text_alert = '';
        if ($('#numberpeople')) {
            if ($('#numberpeople').val() == '') {
                text_alert = text_alert + '- เลขบัตรประจำตัวประชาชน <br/>';
            }
        }
        if ($('#typepeople')) {
            if ($('#typepeople').val() == 0) {
                text_alert = text_alert + '- เลือกประเภทบัตร <br/>';
            }
        }
        if ($('#thainamestd')) {
            if ($('#thainamestd').val() == 0) {
                text_alert = text_alert + '- ชื่อไทย <br/>';
            }
        }
        if ($('#thailaststd')) {
            if ($('#thailaststd').val() == 0) {
                text_alert = text_alert + '- นามสกุลไทย <br/>';
            }
        }
        if ($('#engnamestd')) {
            if ($('#engnamestd').val() == 0) {
                text_alert = text_alert + '- ชื่ออังกฤษ <br/>';
            }
        }
        if ($('#englaststd')) {
            if ($('#englaststd').val() == 0) {
                text_alert = text_alert + '- นามสกุลอังกฤษ <br/>';
            }
        }
        if ($('#nicknamestd')) {
            if ($('#nicknamestd').val() == 0) {
                text_alert = text_alert + '- กรุณณากรอกชื่อเล่น <br/>';
            }
        }
        if ($('#housenumber')) {
            if ($('#housenumber').val() == 0) {
                text_alert = text_alert + '- ที่อยู๋ปัจจุบัน <br/>';
            }
        }
        if ($('#village')) {
            if ($('#village').val() == 0) {
                text_alert = text_alert + '- หมู่ที่ <br/>';
            }
        }
        if ($('#province')) {
            if ($('#province').val() == 0) {
                text_alert = text_alert + '- จังหวัด <br/>';
            }
        }
        if ($('#district')) {
            if ($('#district').val() == 0) {
                text_alert = text_alert + '- อำเภอ  <br/>';
            }
        }
        if ($('#subdistrict')) {
            if ($('#subdistrict').val() == 0) {
                text_alert = text_alert + '- ตำบล  <br/>';
            }
        }
        if ($('#gender')) {
            if ($('#gender').val() == 0) {
                text_alert = text_alert + '- เพศ  <br/>';
            }
        }
        if ($('#religion')) {
            if ($('#religion').val() == 0) {
                text_alert = text_alert + '- ศาสนา  <br/>';
            }
        }
        if ($('#weight_kg')) {
            if ($('#weight_kg').val() == 0) {
                text_alert = text_alert + '- น้ำหนัก  <br/>';
            }
        }
        if ($('#height_cm')) {
            if ($('#height_cm').val() == 0) {
                text_alert = text_alert + '- ส่วนสูง  <br/>';
            }
        }
        if ($('#blood_type')) {
            if ($('#blood_type').val() == 0) {
                text_alert = text_alert + '- หมู่เลือด  <br/>';
            }
        }
        if ($('#student_phone_number')) {
            if ($('#student_phone_number').val() == 0) {
                text_alert = text_alert + '- เบอร์ติดต่อนักศึกษา  <br/>';
            }
        }
        if ($('#schoolName')) {
            if ($('#schoolName').val() == 0) {
                text_alert = text_alert + '- สถานศึกษาเดิม  <br/>';
            }
        }
        if ($('#level')) {
            if ($('#level').val() == 0) {
                text_alert = text_alert + '- จบการศึกษาระดับ  <br/>';
            }
        }
        if ($('#department')) {
            if ($('#department').val() == 0) {
                text_alert = text_alert + '- แผนกวิชา  <br/>';
            }
        }
        if ($('#year')) {
            if ($('#year').val() == 0) {
                text_alert = text_alert + '- ชั้นปี  <br/>';
            }
        }
        if ($('#classroom')) {
            if ($('#classroom').val() == 0) {
                text_alert = text_alert + '- ห้อง  <br/>';
            }
        }
        if ($('#teacherTitle')) {
            if ($('#teacherTitle').val() == 0) {
                text_alert = text_alert + '- คำนำหน้าครูที่ปรึกษา  <br/>';
            }
        }
        if ($('#teacherName')) {
            if ($('#teacherName').val() == 0) {
                text_alert = text_alert + '- ชื่อครูที่ปรึกษา  <br/>';
            }
        }

        if ($('#fnamefather')) {
            if ($('#fnamefather').val() == 0) {
                text_alert = text_alert + '- ชื่อบิดา  <br/>';
            }
        }
        if ($('#lnamefather')) {
            if ($('#lnamefather').val() == 0) {
                text_alert = text_alert + '- นามสกุลบิดา  <br/>';
            }
        }
        if ($('#numberpeoplefather')) {
            if ($('#numberpeoplefather').val() == 0) {
                text_alert = text_alert + '- เลขบัตรประจำตัวประชาชนของบิดา  <br/>';
            }
        }
        if ($('#typepeoplefather')) {
            if ($('#typepeoplefather').val() == 0) {
                text_alert = text_alert + '-  เลือกประเภทบัตรของบิดา <br/>';
            }
        }
        if ($('#father_status')) {
            if ($('#father_status').val() == 0) {
                text_alert = text_alert + '- สถานภาพบิดา  <br/>';
            }
        }
        if ($('#father_occupation')) {
            if ($('#father_occupation').val() == 0) {
                text_alert = text_alert + '- อาชีพของบิดา  <br/>';
            }
        }
        if ($('#fnamemother')) {
            if ($('#fnamemother').val() == 0) {
                text_alert = text_alert + '- ชื่อมารดา  <br/>';
            }
        }
        if ($('#lnamemother')) {
            if ($('#lnamemother').val() == 0) {
                text_alert = text_alert + '- นามสกุลมารดา  <br/>';
            }
        }
        if ($('#numberpeoplemother')) {
            if ($('#numberpeoplemother').val() == 0) {
                text_alert = text_alert + '- เลขบัตรประจำตัวประชาชนของมารดา  <br/>';
            }
        }
        if ($('#typepeoplemother')) {
            if ($('#typepeoplemother').val() == 0) {
                text_alert = text_alert + '-  เลือกประเภทบัตรของมารดา <br/>';
            }
        }
        if ($('#mother_status')) {
            if ($('#mother_status').val() == 0) {
                text_alert = text_alert + '- สถานภาพมารดา  <br/>';
            }
        }
        if ($('#mother_occupation')) {
            if ($('#mother_occupation').val() == 0) {
                text_alert = text_alert + '- อาชีพของมารดา  <br/>';
            }
        }
        if ($('#isMarried')) {
            if ($('#isMarried').val() == 0) {
                text_alert = text_alert + '- สถานภาพการสมรสของบิดา-มารดา  <br/>';
            }
        }
        if ($('#firstnameguardian')) {
            if ($('#firstnameguardian').val() == 0) {
                text_alert = text_alert + '- ชื่อผู้ปกครอง  <br/>';
            }
        }
        if ($('#lastnameguardian')) {
            if ($('#lastnameguardian').val() == 0) {
                text_alert = text_alert + '- นามสกุลผู้ปกครอง  <br/>';
            }
        }
        if ($('#numberpeopleguardian')) {
            if ($('#numberpeopleguardian').val() == 0) {
                text_alert = text_alert + '- เลขบัตรประจำตัวประชาชนของผู้ปกครอง  <br/>';
            }
        }
        if ($('#typepeopleguardian')) {
            if ($('#typepeopleguardian').val() == 0) {
                text_alert = text_alert + '- เลือกประเภทบัตรของผู้ปกครอง  <br/>';
            }
        }
        if ($('#parentguardian')) {
            if ($('#parentguardian').val() == 0) {
                text_alert = text_alert + '- ความสัมพันธ์  <br/>';
            }
        }
        if ($('#guardian_occupation')) {
            if ($('#guardian_occupation').val() == 0) {
                text_alert = text_alert + '- อาชีพของผู้ปกครอง  <br/>';
            }
        }
        if ($('#housenumberguardian')) {
            if ($('#housenumberguardian').val() == 0) {
                text_alert = text_alert + '- ที่อยู่ปัจจุบันของผู้ปกครอง  <br/>';
            }
        }
        if ($('#villageguardian')) {
            if ($('#villageguardian').val() == 0) {
                text_alert = text_alert + '- ข้อมูลผู้ปกครอง หมู่ที่  <br/>';
            }
        }
        if ($('#provinceguardian')) {
            if ($('#provinceguardian').val() == 0) {
                text_alert = text_alert + '- ข้อมูลผู้ปกครอง จังหวัด  <br/>';
            }
        }
        if ($('#isnamedistrict')) {
            if ($('#isnamedistrict').val() == 0) {
                text_alert = text_alert + '- ข้อมูลผู้ปกครอง อำเภอ  <br/>';
            }
        }
        if ($('#isnamesubdistrict')) {
            if ($('#isnamesubdistrict').val() == 0) {
                text_alert = text_alert + '- ข้อมูลผู้ปกครอง ตำบล  <br/>';
            }
        }
        if ($('#phoneguardian')) {
            if ($('#phoneguardian').val() == 0) {
                text_alert = text_alert + '- เบอร์ติดต่อผู้ปกครอง  <br/>';
            }
        }
        if (text_alert != '') {
            Swal.fire({
                icon: 'warning',
                title: 'กรุณากรอกข้อมูลต่อไปนี้',
                html: '<div style="text-align:left;">' + text_alert + '</div>',
            });
            return false;
        } else {
            $('#saveForm').submit();
        }
    }
</script>



<?php $this->endSection() ?>