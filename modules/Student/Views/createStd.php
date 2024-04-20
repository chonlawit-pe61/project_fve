<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>

<div class="pt-3 px-3">
    <h1 class="mt-0"><u><b>เพิ่มรายชื่อ</b></u> นักเรียนนักศึกษา Pre-Ved Fve</h1>
    <br>
    <div style="border:3px solid; padding:10px; border-radius:2rem; background-color:#BAB0AE">
        <div class="px-3">
            <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                <div class="">
                    <form action="./config/dbaddstd.php" method="post" enctype="multipart/form-data">
                        <!-- ส่วนที่ 1 -->
                        <h3><u><b>ส่วนที่ 1</b></u> ข้อมูลนักศึกษา</h3>
                        <hr style="border: none; height: 2px; background-color: #030100;">
                        <div class="row">
                            <div class="col-lg-3">
                                เลขบัตรประจำตัวประชาชน:
                                <input class="t1 form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeople" required>
                            </div>
                            <div class="col-lg-3">
                                <label>เลือกประเภทบัตร</label>
                                <select id="typepeople" class="form-select" style="text-align: start;" name="typepeople">
                                    <?php
                                    foreach ($typepeople as $pe) {
                                    ?>
                                        <option value="<?php echo $pe['typepeople_id'] ?>"><?php echo $pe['typepeople_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <br>
                        ชื่อ: <input type="text" class="t5" placeholder="ชื่อไทย" name="thainamestd">
                        นามสกุล: <input type="text" class="t5" placeholder="นามสกุลไทย" name="thailaststd">
                        ชื่อภาษาอังกฤษ: <input type="text" class="t5" placeholder="ชื่ออังกฤษ" name="engnamestd">
                        นามสกุลอังกฤษ: <input type="text" class="t5" placeholder="นามสกุลอังกฤษ" name="englaststd"> <br>
                        ชื่อเล่น: <input class="t5" placeholder="กรุณณากรอกชื่อเล่น" name="nicknamestd">
                        ที่อยู่ปัจจุบัน: <input type="text" class="t4" placeholder="ที่อยู๋ปัจจุบัน" name="housenumber">
                        หมู่ที่: <input type="text" class="t4" placeholder="หมู่ที่" name="village">
                        <label>จังหวัด</label>
                        <select class="t4" style="text-align: start;" name="province" onchange="getdistrict(this.value)">
                            <option value="0">-</option>

                        </select>
                        <label>อำเภอ</label>
                        <select class="t4" style="text-align: start;" name="district" id="district" onchange="getsubdistrict(this.value)">
                        </select>
                        <label>ตำบล</label>
                        <select class="t4" style="text-align: start;" name="subdistrictstd" id="subdistrict">
                            <option value="0">-</option>
                        </select>
                        <br>
                        <label>เพศ</label>
                        <select class="t4" style="text-align: start;" name="gender">
                            <option value="0">-</option>

                        </select>
                        <label>ศาสนา</label>
                        <select class="t4" style="text-align: start;" name="religion">
                            <option value="0">-</option>

                        </select>
                        ความสามารถพิเศษ: <input class="t5" placeholder="ความสามารถพิเศษ" name="special_ability"><br>
                        น้ำหนัก: <input type="text" class="t6" maxlength="3" placeholder="กรุณณากรอกน้ำหนัก" name="weight_kg">
                        ส่วนสูง: <input type="text" class="t6" maxlength="3" placeholder="กรุณณากรอกส่วนสูง" name="height_cm">
                        <label>หมู่เลือด</label>
                        <select class="t4" style="text-align: start;" name="blood_type">
                            <option value="0">-</option>

                        </select>
                        ตำหนิ: <input type="text" class="t6" placeholder="กรุณณากรอกตำหนิ" name="scar"><br>
                        โรคประจำตัว: <input type="text" class="t6" placeholder="กรุณณากรอกโรคประจำตัว" name="chronic_disease"><br>
                        เบอร์ติดต่อนักศึกษา: <input type="number" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของนักศึกษา" name="student_phone_number">
                        สถานศึกษาเดิม: <input class="t7" type="text" placeholder="กรุณณากรอกชื่อสถานศึกษาเดิม" name="schoolName">
                        <label>จบการศึกษาระดับ</label>
                        <select class="t4" style="text-align: start;" name="level">
                            <option value="">-</option>

                        </select>
                        <br>
                        <label>แผนกวิชา</label>
                        <select class="t3" style="text-align: start;" name="department">
                            <option value="">-</option>

                        </select>
                        <label>ชั้นปี</label>
                        <select class="t4" style="text-align: start;" name="year">
                            <option value="">-</option>

                        </select>
                        <label>ห้อง</label>
                        <select class="t4" style="text-align: start;" name="classroom">
                            <option value="">-</option>

                        </select><br>
                        <label>คำนำหน้าครูที่ปรึกษา</label>
                        <select class="t4" style="text-align: start;" name="teacherTitle">
                            <option value="">-</option>

                        </select>
                        ครูที่ปรึกษา: <input class="t8" type="text" placeholder="กรุณณากรอกชื่อครูที่ปรึกษา ไม่ต้องใส่คำนำหน้า" name="teacherName">
                        <br>
                        <div>
                            <label for="formFileLg" class="form-label"><b><u>รูปภาพของนักศึกษา</u></b></label>
                            <input class="form-control form-control-lg" type="file" name="file1">
                        </div><br>
                        <!-- ส่วนที่ 2 -->
                        <h3><u><b>ส่วนที่ 2</b></u> ข้อมูลของบิดา-มารดา</h3>
                        <hr style="border: none; height: 2px; background-color: #030100;">
                        <!-- ข้อมูลบิดา -->
                        <h6><u><b>ข้อมูลบิดาร</b></u></h6>
                        ชื่อบิดา: <input type="text" class="t1" placeholder="ชื่อบิดาร" name="fnamefather">
                        นามสกุลบิดา: <input type="text" class="t1" placeholder="นามสกุลบิดาร" name="lnamefather">
                        เลขบัตรประจำตัวประชาชน: <input class="t1" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeoplefather"><br>
                        <label>เลือกประเภทบัตร</label>
                        <select class="t2" style="text-align: start;" name="typepeoplefather">
                            <option value="0">-</option>

                        </select>
                        <label>สถานภาพบิดา</label>
                        <select class="t2" style="text-align: start;" name="father_status">
                            <option value="0">-</option>

                        </select>
                        อาชีพของบิดาร: <input type="text" placeholder="อาชีพของบิดาร" name="father_occupation"> <br>
                        ประเภทความพิการ: <input class="t5" placeholder="ประเภทความพิการ" name="father_disability_type">
                        <br>
                        <!-- ข้อมู,มารดา -->
                        <h6><u><b>ข้อมูลมารดา</b></u></h6>
                        ชื่อมารดา: <input type="text" class="t1" placeholder="ชื่อมารดา" name="fnamemother">
                        นามสกุลมารดา: <input type="text" class="t1" placeholder="นามสกุลมารดา" name="lnamemother">
                        เลขบัตรประจำตัวประชาชน: <input class="t1" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeoplemother"><br>
                        <label>เลือกประเภทบัตร</label>
                        <select class="t2" style="text-align: start;" name="typepeoplemother">
                            <option value="0">-</option>

                        </select>
                        <label>สถานภาพมารดา</label>
                        <select class="t2" style="text-align: start;" name="mother_status">
                            <option value="0">-</option>

                        </select>
                        อาชีพของมารดา: <input type="text" placeholder="อาชีพของมารดา" name="mother_occupation"><br>
                        ประเภทความพิการ: <input class="t5" placeholder="ประเภทความพิการมารดา" name="mother_disability_type">
                        <br>
                        <label>สถานภาพการสมรสของบิดา-มารดา</label>
                        <select class="t2" style="text-align: start;" name="isMarried">
                            <option value="">-</option>


                        </select><br><br>
                        <!-- ส่วนที่ 3 -->
                        <h3><u><b>ส่วนที่ 3</b></u> ข้อมูลผู้ปกครอง</h3>
                        <hr style="border: none; height: 2px; background-color: #030100;"><br>
                        ชื่อผู้ปกครอง: <input type="text" class="t1" placeholder="ชื่อผู้ปกครอง" name="firstnameguardian">
                        นามสกุลผู้ปกครอง: <input type="text" class="t1" placeholder="นามสกุลผู้ปกครอง" name="lastnameguardian">
                        เลขบัตรประจำตัวประชาชน: <input class="t1" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeopleguardian">
                        <label>เลือกประเภทบัตร</label>
                        <select class="t2" style="text-align: start;" name="typepeopleguardian">
                            <option value="">-</option>

                        </select>
                        ความสัมพันธ์: <input type="text" class="t1" placeholder="กรุณณากรอกความสัมพันธ์" name="parentguardian">
                        อาชีพของผู้ปกครอง: <input type="text" placeholder="อาชีพของผู้ปกครอง" name="guardian_occupation"><br>
                        ที่อยู่ปัจจุบันของผู้ปกครอง: <input type="text" class="t4" placeholder="ที่อยู่ปัจจุบัน" name="housenumberguardian">
                        หมู่ที่: <input type="text" class="t4" placeholder="หมู่ที่" name="villageguardian">
                        <label>จังหวัด</label>
                        <select class="t4" style="text-align: start;" name="provinceguardian" onchange="getdistrictisname(this.value)">
                            <option value="0">-</option>

                        </select>
                        <label>อำเภอ</label>
                        <select class="t4" style="text-align: start;" name="districtguardian" id="isnamedistrict" onchange="getsubdistrictisname(this.value)">
                        </select>
                        <label>ตำบล</label>
                        <select class="t4" style="text-align: start;" name="subdistrictguardian" id="isnamesubdistrict">
                            <option value="0">-</option>
                        </select>
                        </select>
                        <br>

                        เบอร์ติดต่อผู้ปกครอง: <input type="number" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของผู้ปกครอง" name="phoneguardian">
                        <br><br>
                        <h3><u><b><input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
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
</script>
<?php $this->endSection() ?>