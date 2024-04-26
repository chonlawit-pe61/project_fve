<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>

<div class="pt-3 px-3">
    <h1 class="mt-0"><u><b>เพิ่มรายชื่อ</b></u> นักเรียนนักศึกษา Pre-Ved Fve</h1>
    <br>
    <div style="border:3px solid; padding:10px; border-radius:2rem; background-color:#BAB0AE">
        <div class="px-3">
            <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                <div class="">
                    <form id="saveForm" action="<?php echo base_url('/Student/createStd') ?>" method="post" enctype="multipart/form-data">
                        <!-- ส่วนที่ 1 -->
                        <h3><u><b>ส่วนที่ 1</b></u> ข้อมูลนักศึกษา</h3>
                        <hr style="border: none; height: 2px; background-color: #030100;">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    เลขบัตรประจำตัวประชาชน:
                                    <input id="numberpeople" class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeople" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>เลือกประเภทบัตร</label>
                                <select id="typepeople" id="typepeople" class="form-select" style="text-align: start;" name="typepeople">
                                    <option value="0">กรุณาเลือกบัตรประชน</option>
                                    <?php
                                    foreach ($typepeople as $pe) {
                                    ?>
                                        <option value="<?php echo $pe['typepeople_id'] ?>"><?php echo $pe['typepeople_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                ชื่อ: <input id="thainamestd" type="text" class="form-control" placeholder="ชื่อไทย" name="thainamestd">
                            </div>
                            <div class="col-lg-3">
                                นามสกุล: <input id="thailaststd" type="text" class="form-control" placeholder="นามสกุลไทย" name="thailaststd">
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ชื่อภาษาอังกฤษ: <input id="engnamestd" type="text" class="form-control" placeholder="ชื่ออังกฤษ" name="engnamestd">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                นามสกุลอังกฤษ: <input id="englaststd" type="text" class="form-control" placeholder="นามสกุลอังกฤษ" name="englaststd">
                            </div>
                            <div class="col-lg-3">
                                ชื่อเล่น: <input id="nicknamestd" class="form-control" placeholder="กรุณณากรอกชื่อเล่น" name="nicknamestd">
                            </div>
                            <div class="col-lg-3">
                                ที่อยู่ปัจจุบัน: <input id="housenumber" type="text" class="form-control" placeholder="ที่อยู๋ปัจจุบัน" name="housenumber">
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    หมู่ที่: <input id="village" type="text" class="form-control" placeholder="หมู่ที่" name="village">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>จังหวัด</label>
                                <select id="province" class="form-select" style="text-align: start;" name="province" onchange="getdistrict(this.value)">
                                        <option value="0">กรุณาเลือกจังหวัด</option>
                                    <?php
                                    foreach ($provice as $p) {
                                    ?>
                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['province_th'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>อำเภอ</label>
                                <select  class="form-select" style="text-align: start;" name="district" id="district" onchange="getsubdistrict(this.value)">
                                    <option value="0">กรุณาเลือกอำเภอ</option>
                                    <?php
                                    foreach ($distic as $x) {
                                    ?>
                                        <option value="<?php echo $x['id'] ?>"><?php echo $x['district_th'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>ตำบล</label>
                                <select class="form-select" style="text-align: start;" name="subdistrictstd" id="subdistrict">
                                    <option value="0">กรุณาเลือกตำบล</option>
                                    <?php
                                    foreach ($Subdistic as $y) {
                                    ?>
                                        <option value="<?php echo $y['id'] ?>"><?php echo $y['subdistrict_th'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label>เพศ</label>
                                    <select class="form-select" style="text-align: start;" name="gender" id="gender">
                                    <option value="0">กรุณาเลือกเพศ</option>
                                        <?php
                                        foreach ($typegender as $x) {
                                        ?>
                                            <option value="<?php echo $x['gender_id'] ?>"><?php echo $x['gender_name'] ?></option>
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
                                    foreach ($religion as $x) {
                                    ?>
                                        <option value="<?php echo $x['religion_id'] ?>"><?php echo $x['religion_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                ความสามารถพิเศษ: <input class="form-control" placeholder="ความสามารถพิเศษ" name="special_ability">
                            </div>
                            <div class="col-lg-3">
                                น้ำหนัก: <input id="weight_kg" type="text" class="form-control" maxlength="3" placeholder="กรุณณากรอกน้ำหนัก" name="weight_kg">
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ส่วนสูง: <input id="height_cm" type="text" class="form-control" maxlength="3" placeholder="กรุณณากรอกส่วนสูง" name="height_cm">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>หมู่เลือด</label>
                                <select class="form-select" style="text-align: start;" name="blood_type" id="blood_type">
                                    <option value="0">กรุณาเลือกหมู่เลือด</option>
                                    <?php
                                    foreach ($special_ability as $x) {
                                    ?>
                                        <option value="<?php echo $x['special_ability_id'] ?>"><?php echo $x['special_ability_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                ตำหนิ: <input type="text" class="form-control" placeholder="กรุณณากรอกตำหนิ" name="scar">
                            </div>
                            <div class="col-lg-3">
                                โรคประจำตัว: <input type="text" class="form-control" placeholder="กรุณณากรอกโรคประจำตัว" name="chronic_disease">
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    เบอร์ติดต่อนักศึกษา: <input id="student_phone_number" type="number" class="form-control" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของนักศึกษา" name="student_phone_number">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                สถานศึกษาเดิม: <input id="schoolName" class="form-control" type="text" placeholder="กรุณณากรอกชื่อสถานศึกษาเดิม" name="schoolName">
                            </div>
                            <div class="col-lg-3">
                                <label>จบการศึกษาระดับ</label>
                                <select class="form-select" style="text-align: start;" name="level" id="level">
                                    <option value="0">กรุณาเลือกจบการศึกษาระดับ</option>
                                    <?php
                                    foreach ($level as $x) {
                                    ?>
                                        <option value="<?php echo $x['level_id'] ?>"><?php echo $x['level_name'] ?></option>
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
                                    foreach ($department as $x) {
                                    ?>
                                        <option value="<?php echo $x['department_id'] ?>"><?php echo $x['department_name'] ?></option>
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
                                        foreach ($year as $x) {
                                        ?>
                                            <option value="<?php echo $x['year_id'] ?>"><?php echo $x['year_name'] ?></option>
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
                                    foreach ($classroom as $x) {
                                    ?>
                                        <option value="<?php echo $x['classroom_id'] ?>"><?php echo $x['classroom_name'] ?></option>
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
                                    foreach ($teachertitle as $x) {
                                    ?>
                                        <option value="<?php echo $x['teacherTitle_id'] ?>"><?php echo $x['teacherTitle_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                ชื่อครูที่ปรึกษา: <input id="teacherName" class="form-control" type="text" placeholder="กรุณณากรอกชื่อครูที่ปรึกษา ไม่ต้องใส่คำนำหน้า" name="teacherName">
                            </div>
                            <div class="col-lg-6">
                                <label for="formFileLg" class="form-label"><b><u>รูปภาพของนักศึกษา</u></b></label>
                                <input class="form-control form-control-lg" type="file" name="file1">
                            </div>
                            <!-- ส่วนที่ 2 -->
                            <h3><u><b>ส่วนที่ 2</b></u> ข้อมูลของบิดา-มารดา</h3>
                            <hr style="border: none; height: 2px; background-color: #030100;">
                            <!-- ข้อมูลบิดา -->
                            <h6><u><b>ข้อมูลบิดา</b></u></h6>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ชื่อบิดา: <input id="fnamefather" type="text" class="form-control" placeholder="ชื่อบิดา" name="fnamefather">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                นามสกุลบิดา: <input id="lnamefather" type="text" class="form-control" placeholder="นามสกุลบิดา" name="lnamefather">
                            </div>
                            <div class="col-lg-3">
                            เลขบัตรประจำตัวประชาชนของบิดา: <input id="numberpeoplefather" class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeoplefather">
                            </div>
                            <div class="col-lg-3">
                                <label>เลือกประเภทบัตร</label>
                                <select id="typepeoplefather" class="form-select" style="text-align: start;" name="typepeoplefather">
                                    <option value="0">กรุณาเลือกประเภทบัตร</option>
                                    <?php
                                    foreach ($typepeople as $pe) {
                                    ?>
                                        <option value="<?php echo $pe['typepeople_id'] ?>"><?php echo $pe['typepeople_name'] ?></option>
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
                                        foreach ($isparent as $pe) {
                                        ?>
                                            <option value="<?php echo $pe['isParent_id'] ?>"><?php echo $pe['isParent_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                อาชีพของบิดา: <input id="father_occupation" class="form-control" type="text" placeholder="อาชีพของบิดา" name="father_occupation">
                            </div>
                            <div class="col-lg-3">
                                ประเภทความพิการ: <input class="form-control" placeholder="ประเภทความพิการ" name="father_disability_type">
                            </div>
                            <br>
                            <!-- ข้อมู,มารดา -->
                            <h6><u><b>ข้อมูลมารดา</b></u></h6>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ชื่อมารดา: <input id="fnamemother" type="text" class="form-control" placeholder="ชื่อมารดา" name="fnamemother">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                นามสกุลมารดา: <input id="lnamemother" type="text" class="form-control" placeholder="นามสกุลมารดา" name="lnamemother">
                            </div>
                            <div class="col-lg-3">
                                เลขบัตรประจำตัวประชาชนของมารดา: <input id="numberpeoplemother" class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeoplemother">
                            </div>
                            <div class="col-lg-3">
                                <label>เลือกประเภทบัตร</label>
                                <select class="form-select" style="text-align: start;" name="typepeoplemother" id="typepeoplemother">
                                    <option value="0">กรุณาเลือกประเภทบัตร</option>
                                    <?php
                                    foreach ($typepeople as $pe) {
                                    ?>
                                        <option value="<?php echo $pe['typepeople_id'] ?>"><?php echo $pe['typepeople_name'] ?></option>
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
                                        foreach ($isparent as $pe) {
                                        ?>
                                            <option value="<?php echo $pe['isParent_id'] ?>"><?php echo $pe['isParent_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                อาชีพของมารดา: <input id="mother_occupation" class="form-control" type="text" placeholder="อาชีพของมารดา" name="mother_occupation">
                            </div>
                            <div class="col-lg-3">
                                ประเภทความพิการ: <input class="form-control" placeholder="ประเภทความพิการมารดา" name="mother_disability_type">
                            </div>
                            <div class="col-lg-3">
                                <label>สถานภาพการสมรสของบิดา-มารดา</label>
                                <select class="form-select" style="text-align: start;" name="isMarried" id="isMarried">
                                <option value="0">กรุณาเลือกสถานภาพการสมรสของบิดา-มารดา</option>
                                    <?php
                                    foreach ($ismarried as $pe) {
                                    ?>
                                        <option value="<?php echo $pe['isMarried_id'] ?>"><?php echo $pe['isMarried_name'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <!-- ส่วนที่ 3 -->
                            <h3><u><b>ส่วนที่ 3</b></u> ข้อมูลผู้ปกครอง</h3>
                            <hr style="border: none; height: 2px; background-color: #030100;"><br>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ชื่อผู้ปกครอง: <input id="firstnameguardian" type="text" class="form-control" placeholder="ชื่อผู้ปกครอง" name="firstnameguardian">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                นามสกุลผู้ปกครอง: <input id="lastnameguardian" type="text" class="form-control" placeholder="นามสกุลผู้ปกครอง" name="lastnameguardian">
                            </div>
                            <div class="col-lg-3">
                                เลขบัตรประจำตัวประชาชนของผู้ปกครอง: <input id="numberpeopleguardian" class="form-select" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeopleguardian">
                            </div>
                            <div class="col-lg-3">
                                <label>เลือกประเภทบัตร</label>
                                <select id="typepeopleguardian" class="form-select" style="text-align: start;" name="typepeopleguardian">
                                    <option value="0">กรุณาเลือกประเภทบัตร</option>
                                    <?php
                                    foreach ($typepeople as $pe) {
                                    ?>
                                        <option value="<?php echo $pe['typepeople_id'] ?>"><?php echo $pe['typepeople_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ความสัมพันธ์: <input id="parentguardian" class="form-control" type="text" class="t1" placeholder="กรุณณากรอกความสัมพันธ์" name="parentguardian">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                อาชีพของผู้ปกครอง: <input id="guardian_occupation" class="form-control" type="text" placeholder="อาชีพของผู้ปกครอง" name="guardian_occupation">
                            </div>
                            <div class="col-lg-3">
                                ที่อยู่ปัจจุบันของผู้ปกครอง: <input id="housenumberguardian" type="text" class="form-control" placeholder="ที่อยู่ปัจจุบัน" name="housenumberguardian">
                            </div>
                            <div class="col-lg-3">
                                หมู่ที่: <input id="villageguardian" type="text" class="form-control" placeholder="หมู่ที่" name="villageguardian">
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label>จังหวัด</label>
                                    <select id="provinceguardian" class="form-select" style="text-align: start;" name="provinceguardian" onchange="getdistrictisname(this.value)">
                                        <option value="0">กรุณาเลือกจังหวัด</option>
                                        <?php
                                        foreach ($provice as $p) {
                                        ?>
                                            <option value="<?php echo $p['id'] ?>"><?php echo $p['province_th'] ?></option>
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
                                    <?php
                                    foreach ($distic as $x) {
                                    ?>
                                        <option value="<?php echo $x['id'] ?>"><?php echo $x['district_th'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>ตำบล</label>
                                <select class="form-select" style="text-align: start;" name="subdistrictguardian" id="isnamesubdistrict">
                                    <option value="0">กรุณาเลือกตำบล</option>
                                    <?php
                                    foreach ($Subdistic as $y) {
                                    ?>
                                        <option value="<?php echo $y['id'] ?>"><?php echo $y['subdistrict_th'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                เบอร์ติดต่อผู้ปกครอง: <input id="phoneguardian" class="form-control" type="number" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของผู้ปกครอง" name="phoneguardian">
                            </div>
                        </div>
                        <h3><u><b><input onclick="saveData()" type="button" value="บันทึกข้อมูล" class="btn btn-success">
                                    <h3><u><b><input type="reset" value="ยกเลิก" class="btn btn-danger">
                    </form>
                </div>
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
            url: './district.php',
            type: 'post',
            data: {
                idprovince: id
            },
            success: function(res) {
                console.log(res);
                let respon = JSON.parse(res);
                console.log(respon);
                $('#district').empty();
                $('#subdistrict').empty();
                for (const key in respon) {
                    $('#district').append(`<option value='${respon[key].id}'>${respon[key].district_th}</option>`)
                }
            }
        })
    }
    //อำเภอมาตำบลของนักศึกษา
    function getsubdistrict(id) {
        $.ajax({
            url: './subdistrict.php',
            type: 'post',
            data: {
                iddistrict: id
            },
            success: function(res) {
                console.log(res);
                let respon = JSON.parse(res);
                console.log(respon);
                $('#subdistrict').empty();
                for (const key in respon) {
                    $('#subdistrict').append(`<option value='${respon[key].id}'>${respon[key].subdistrict_th}</option>`)
                }

            }
        })
    }
    // จัดหวัดมาอำเภอของผู้ปกครอง
    function getdistrictisname(id) {
        $.ajax({
            url: './district.php',
            type: 'post',
            data: {
                idprovince: id
            },
            success: function(res) {
                console.log(res);
                let respon = JSON.parse(res);
                console.log(respon);
                $('#isnamedistrict').empty();
                $('#isnamesubdistrict').empty();
                for (const key in respon) {
                    $('#isnamedistrict').append(`<option value='${respon[key].id}'>${respon[key].district_th}</option>`)
                }
            }
        })
    }

    function getsubdistrictisname(id) {
        $.ajax({
            url: './subdistrict.php',
            type: 'post',
            data: {
                iddistrict: id
            },
            success: function(res) {
                console.log(res);
                let respon = JSON.parse(res);
                console.log(respon);
                $('#isnamesubdistrict').empty();
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
        }if ($('#student_phone_number')) {
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