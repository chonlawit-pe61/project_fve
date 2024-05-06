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
                                <input id="numberpeople" class="form-control" type="text" maxlength="13" placeholder="กรุณากรอกเลขบัตร 13 หลัก" name="numberpeople" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>เลือกประเภทบัตร</label>
                            <select id="type_card_id" id="type_card_id" class="form-select" style="text-align: start;" name="type_card_id">
                                <option value="0">กรุณาเลือกบัตรประชน</option>
                                <?php
                                foreach ($type_card as $type) {
                                ?>
                                    <option value="<?php echo $type['type_card_id'] ?>"><?php echo $type['type_card_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">

                            <label>ชื่อ</label>
                            <input id="thainamestd" type="text" class="form-control" placeholder="ชื่อไทย" name="thainamestd">
                        </div>
                        <div class="col-lg-3">
                            <label>นามสกุล</label>
                            <input id="thailaststd" type="text" class="form-control" placeholder="นามสกุลไทย" name="thailaststd">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ชื่อภาษาอังกฤษ</label>
                                <input id="engnamestd" type="text" class="form-control" placeholder="ชื่ออังกฤษ" name="engnamestd">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>นามสกุลอังกฤษ</label>
                            <input id="englaststd" type="text" class="form-control" placeholder="นามสกุลอังกฤษ" name="englaststd">
                        </div>
                        <div class="col-lg-3">
                            <label>ชื่อเล่น</label>
                            <input id="nicknamestd" class="form-control" placeholder="กรุณณากรอกชื่อเล่น" name="nicknamestd">
                        </div>
                        <div class="col-lg-3">
                            <label>ที่อยู่ปัจจุบัน</label>
                            <input id="housenumber" type="text" class="form-control" placeholder="ที่อยู๋ปัจจุบัน" name="housenumber">
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>หมู่ที่</label>
                                <input id="village" type="text" class="form-control" placeholder="หมู่ที่" name="village">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>จังหวัด</label>
                            <select id="province" class="form-select" style="text-align: start;" name="province" onchange="getdistrict(this.value)">
                                <option value="0">กรุณาเลือกจังหวัด</option>
                                <?php
                                foreach ($provinces as $province) {
                                ?>
                                    <option value="<?php echo $province['id'] ?>"><?php echo $province['province_th'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>อำเภอ</label>
                            <select class="form-select" style="text-align: start;" name="district" id="district" onchange="getsubdistrict(this.value)">
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
                                        <option value="<?php echo $gender['gender_id'] ?>"><?php echo $gender['gender_name'] ?></option>
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
                                    <option value="<?php echo $religion['religion_id'] ?>"><?php echo $religion['religion_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>ความสามารถพิเศษ</label>
                            <input class="form-control" placeholder="ความสามารถพิเศษ" name="special_ability">
                        </div>
                        <div class="col-lg-3">
                            <label>น้ำหนัก</label>
                            <input id="weight_kg" type="text" class="form-control" maxlength="3" placeholder="กรุณณากรอกน้ำหนัก" name="weight_kg">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ส่วนสูง</label>
                                <input id="height_cm" type="text" class="form-control" maxlength="3" placeholder="กรุณณากรอกส่วนสูง" name="height_cm">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>หมู่เลือด</label>
                            <select class="form-select" style="text-align: start;" name="blood_type" id="blood_type">
                                <option value="0">กรุณาเลือกหมู่เลือด</option>
                                <?php
                                foreach ($bloods as $blood) {
                                ?>
                                    <option value="<?php echo $blood['blood_id'] ?>"><?php echo $blood['blood_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>ตำหนิ</label>
                            <input type="text" class="form-control" placeholder="กรุณณากรอกตำหนิ" name="scar">
                        </div>
                        <div class="col-lg-3">
                            <label>โรคประจำตัว</label>
                            <input type="text" class="form-control" placeholder="กรุณณากรอกโรคประจำตัว" name="chronic_disease">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>เบอร์ติดต่อนักศึกษา</label>
                                <input id="student_phone_number" type="number" class="form-control" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของนักศึกษา" name="student_phone_number">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>สถานศึกษาเดิม</label>
                            <input id="schoolName" class="form-control" type="text" placeholder="กรุณณากรอกชื่อสถานศึกษาเดิม" name="schoolName">
                        </div>
                        <div class="col-lg-3">
                            <label>จบการศึกษาระดับ</label>
                            <select class="form-select" style="text-align: start;" name="level" id="level">
                                <option value="0">กรุณาเลือกจบการศึกษาระดับ</option>
                                <?php
                                foreach ($education_levels as $education_level) {
                                ?>
                                    <option value="<?php echo $education_level['education_level_id'] ?>"><?php echo $education_level['education_level_name'] ?></option>
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
                                    <option value="<?php echo $department['department_id'] ?>"><?php echo $department['department_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ชั้นปี</label>
                                <select id="year" class="form-select" style="text-align: start;" name="year">
                                    <option value="0">กรุณาเลือกชั้นปี</option>
                                    <?php
                                    foreach ($education_years as $education_year) {
                                    ?>
                                        <option value="<?php echo $education_year['education_year_id'] ?>"><?php echo $education_year['education_year_name'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>ห้อง</label>
                            <select id="classroom" class="form-select" style="text-align: start;" name="classroom">
                                <option value="0">กรุณาเลือกห้อง</option>
                                <?php
                                foreach ($education_rooms as $education_room) {
                                ?>
                                    <option value="<?php echo $education_room['education_room_id'] ?>"><?php echo $education_room['education_room_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>คำนำหน้าครูที่ปรึกษา</label>
                            <select id="teacherTitle" class="form-select" style="text-align: start;" name="teacherTitle">
                                <option value="0">กรุณาเลือกคำนำหน้าครูที่ปรึกษา</option>
                                <?php
                                foreach ($prenames as $prename) {
                                ?>
                                    <option value="<?php echo $prename['prename_id'] ?>"><?php echo $prename['prename_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>ชื่อครูที่ปรึกษา</label>
                            <input id="teacherName" class="form-control" type="text" placeholder="กรุณากรอกชื่อครูที่ปรึกษา ไม่ต้องใส่คำนำหน้า" name="teacherName">
                        </div>
                        <div class="col-lg-3">
                            <label for="formFileLg" class="form-label">รูปภาพของนักศึกษา</label>
                            <input class="form-control " type="file" name="file1">
                        </div>
                        <div class="col-lg-3">
                            <label for="formFileLg" class="form-label">username</label>
                            <input class="form-control" type="text" name="username" placeholder="กรุณากรอก username สำหรับใช้ในการเข้าสู่ระบบ">
                        </div>
                        <div class="col-lg-3">
                            <label for="formFileLg" class="form-label">password</label>
                            <input class="form-control" type="text" name="password" placeholder="กรุณากรอก password สำหรับใช้ในการเข้าสู่ระบบ">
                        </div>
                        <!-- ส่วนที่ 2 -->
                        <div class="col-lg-12">
                            <div class="mt-4">
                                <h3><u><b>ส่วนที่ 2</b></u> ข้อมูลของบิดา-มารดา</h3>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr style="border: none; height: 2px; background-color: #030100;">
                        </div>
                        <!-- ข้อมูลบิดา -->
                        <h6><u><b>ข้อมูลบิดา</b></u></h6>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="">
                                    ชื่อบิดา
                                </label>
                                <input id="fnamefather" type="text" class="form-control" placeholder="ชื่อบิดา" name="fnamefather">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="">
                                นามสกุลบิดา
                            </label>
                            <input id="lnamefather" type="text" class="form-control" placeholder="นามสกุลบิดา" name="lnamefather">
                        </div>
                        <div class="col-lg-3">
                            <label for="">
                                เลขบัตรประจำตัวประชาชนของบิดา
                            </label>
                            <input id="numberpeoplefather" class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeoplefather">
                        </div>
                        <div class="col-lg-3">
                            <label>เลือกประเภทบัตร</label>
                            <select id="typepeoplefather" class="form-select" style="text-align: start;" name="typepeoplefather">
                                <option value="0">กรุณาเลือกประเภทบัตร</option>
                                <?php
                                foreach ($type_card as $type) {
                                ?>
                                    <option value="<?php echo $type['type_card_id'] ?>"><?php echo $type['type_card_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>สถานภาพบิดา</label>
                                <select id="father_status" class="form-select" style="text-align: start;" name="father_status">
                                    <option value="0">กรุณาเลือกสถานภาพบิดา</option>
                                    <?php
                                    foreach ($status_types as $status_type) {
                                    ?>
                                        <option value="<?php echo $status_type['status_type_id'] ?>"><?php echo $status_type['status_type_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>อาชีพของบิดา</label>
                            <input id="father_occupation" class="form-control" type="text" placeholder="อาชีพของบิดา" name="father_occupation">
                        </div>
                        <div class="col-lg-3">
                            <label>ประเภทความพิการ</label>
                            <input class="form-control" placeholder="ประเภทความพิการ" name="father_disability_type">
                        </div>
                        <br>
                        <!-- ข้อมู,มารดา -->
                        <h6><u><b>ข้อมูลมารดา</b></u></h6>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ชื่อมารดา</label>
                                <input id="fnamemother" type="text" class="form-control" placeholder="ชื่อมารดา" name="fnamemother">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>นามสกุลมารดา</label>
                            <input id="lnamemother" type="text" class="form-control" placeholder="นามสกุลมารดา" name="lnamemother">
                        </div>
                        <div class="col-lg-3">
                            <label>เลขบัตรประจำตัวประชาชนของมารดา</label>
                            <input id="numberpeoplemother" class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeoplemother">
                        </div>
                        <div class="col-lg-3">
                            <label>เลือกประเภทบัตร</label>
                            <select class="form-select" style="text-align: start;" name="typepeoplemother" id="typepeoplemother">
                                <option value="0">กรุณาเลือกประเภทบัตร</option>
                                <?php
                                foreach ($type_card as $type) {
                                ?>
                                    <option value="<?php echo $type['type_card_id'] ?>"><?php echo $type['type_card_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>สถานภาพมารดา</label>
                                <select class="form-select" style="text-align: start;" name="mother_status" id="mother_status">
                                    <option value="0">กรุณาเลือกสถานภาพมารดา</option>
                                    <?php
                                    foreach ($status_types as $status_type) {
                                    ?>
                                        <option value="<?php echo $status_type['status_type_id'] ?>"><?php echo $status_type['status_type_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>อาชีพของมารดา</label>
                            <input id="mother_occupation" class="form-control" type="text" placeholder="อาชีพของมารดา" name="mother_occupation">
                        </div>
                        <div class="col-lg-3">
                            <label>ประเภทความพิการ</label>
                            <input class="form-control" placeholder="ประเภทความพิการมารดา" name="mother_disability_type">
                        </div>
                        <div class="col-lg-3">
                            <label>สถานภาพการสมรสของบิดา-มารดา</label>
                            <select class="form-select" style="text-align: start;" name="isMarried" id="isMarried">
                                <option value="0">กรุณาเลือกสถานภาพการสมรสของบิดา-มารดา</option>
                                <?php
                                foreach ($status_types as $status_type) {
                                ?>
                                    <option value="<?php echo $status_type['status_type_id'] ?>"><?php echo $status_type['status_type_name'] ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <!-- ส่วนที่ 3 -->
                        <div class="col-lg-12">
                            <h3><u><b>ส่วนที่ 3</b></u> ข้อมูลผู้ปกครอง</h3>
                        </div>
                        <div class="col-lg-12">
                            <hr style="border: none; height: 2px; background-color: #030100;">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ชื่อผู้ปกครอง</label>
                                <input id="firstnameguardian" type="text" class="form-control" placeholder="ชื่อผู้ปกครอง" name="firstnameguardian">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>นามสกุลผู้ปกครอง</label>
                            <input id="lastnameguardian" type="text" class="form-control" placeholder="นามสกุลผู้ปกครอง" name="lastnameguardian">
                        </div>
                        <div class="col-lg-3">
                            <label>เลขบัตรประจำตัวประชาชนของผู้ปกครอง</label>
                            <input id="numberpeopleguardian" class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeopleguardian">
                        </div>
                        <div class="col-lg-3">
                            <label>เลือกประเภทบัตร</label>
                            <select id="typepeopleguardian" class="form-select" style="text-align: start;" name="typepeopleguardian">
                                <option value="0">กรุณาเลือกประเภทบัตร</option>
                                <?php
                                foreach ($type_card as $type) {
                                ?>
                                    <option value="<?php echo $type['type_card_id'] ?>"><?php echo $type['type_card_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>ความสัมพันธ์</label>
                                <input id="parentguardian" class="form-control" type="text" class="t1" placeholder="กรุณณากรอกความสัมพันธ์" name="parentguardian">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>อาชีพของผู้ปกครอง</label>
                            <input id="guardian_occupation" class="form-control" type="text" placeholder="อาชีพของผู้ปกครอง" name="guardian_occupation">
                        </div>
                        <div class="col-lg-3">

                            <label>ที่อยู่ปัจจุบันของผู้ปกครอง</label>
                            <input id="housenumberguardian" type="text" class="form-control" placeholder="ที่อยู่ปัจจุบัน" name="housenumberguardian">
                        </div>
                        <div class="col-lg-3">
                            <label>หมู่ที่</label>
                            <input id="villageguardian" type="text" class="form-control" placeholder="หมู่ที่" name="villageguardian">
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>จังหวัด</label>
                                <select id="provinceguardian" class="form-select" style="text-align: start;" name="provinceguardian" onchange="getdistrictisname(this.value)">
                                    <option value="0">กรุณาเลือกจังหวัด</option>
                                    <?php
                                    foreach ($provinces as $province) {
                                    ?>
                                        <option value="<?php echo $province['id'] ?>"><?php echo $province['province_th'] ?></option>
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
                            <input id="phoneguardian" class="form-control" type="number" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของผู้ปกครอง" name="phoneguardian">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center my-2">
                            <button class="btn btn-success" onclick="saveData()">
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
    })

    function getdistrict(id) {
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
                $('#district').empty();
                $('#subdistrict').empty();
                $('#district').append(`<option value="0">กรุณาเลือกอำเภอ</option>`);
                for (const key in respon) {
                    $('#district').append(`<option value='${respon[key].id}'>${respon[key].district_th}</option>`);
                }
            }
        })
    }
    //อำเภอมาตำบลของนักศึกษา
    function getsubdistrict(id) {
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
                $('#subdistrict').empty();
                $('#subdistrict').append(`<option value="0">กรุณาเลือกตำบล</option>`);
                for (const key in respon) {
                    $('#subdistrict').append(`<option value='${respon[key].id}'>${respon[key].subdistrict_th}</option>`)
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
<?php if (session()->getFlashdata('success') != null) : ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: '<?= session()->getFlashdata('success') ?>',
            timer: 2000,
        }).then(() => {
            setTimeout(() => {
                window.location.href = '<?php echo base_url('Student') ?>';
            }, 2000)
        })
    </script>
<?php endif; ?>



<?php $this->endSection() ?>