<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>

<div class="pt-3 px-3">
    <h1 class="mt-0"><u><b>เพิ่มรายชื่อ</b></u> นักเรียนนักศึกษา Pre-Ved Fve</h1>
    <br>
    <div style="border:3px solid; padding:10px; border-radius:2rem; background-color:#BAB0AE">
        <div class="px-3">
            <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                <div class="">
                    <form action="<?php echo base_url('/Student/createStd') ?>" method="post" enctype="multipart/form-data">
                        <!-- ส่วนที่ 1 -->
                        <h3><u><b>ส่วนที่ 1</b></u> ข้อมูลนักศึกษา</h3>
                        <hr style="border: none; height: 2px; background-color: #030100;">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    เลขบัตรประจำตัวประชาชน:
                                    <input class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeople" required>
                                </div>
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
                            <div class="col-lg-3">
                                ชื่อ: <input type="text" class="form-control" placeholder="ชื่อไทย" name="thainamestd">
                            </div>
                            <div class="col-lg-3">
                                นามสกุล: <input type="text" class="form-control" placeholder="นามสกุลไทย" name="thailaststd">
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ชื่อภาษาอังกฤษ: <input type="text" class="form-control" placeholder="ชื่ออังกฤษ" name="engnamestd">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                นามสกุลอังกฤษ: <input type="text" class="form-control" placeholder="นามสกุลอังกฤษ" name="englaststd">
                            </div>
                            <div class="col-lg-3">
                                ชื่อเล่น: <input class="form-control" placeholder="กรุณณากรอกชื่อเล่น" name="nicknamestd">
                            </div>
                            <div class="col-lg-3">
                                ที่อยู่ปัจจุบัน: <input type="text" class="form-control" placeholder="ที่อยู๋ปัจจุบัน" name="housenumber">
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    หมู่ที่: <input type="text" class="form-control" placeholder="หมู่ที่" name="village">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>จังหวัด</label>
                                <select class="form-select" style="text-align: start;" name="province" onchange="getdistrict(this.value)">

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
                                <select class="form-select" style="text-align: start;" name="district" id="district" onchange="getsubdistrict(this.value)">

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
                                    <select class="form-select" style="text-align: start;" name="gender">
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
                                <select class="form-select" style="text-align: start;" name="religion">
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
                                น้ำหนัก: <input type="text" class="form-control" maxlength="3" placeholder="กรุณณากรอกน้ำหนัก" name="weight_kg">
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ส่วนสูง: <input type="text" class="form-control" maxlength="3" placeholder="กรุณณากรอกส่วนสูง" name="height_cm">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>หมู่เลือด</label>
                                <select class="form-select" style="text-align: start;" name="blood_type">
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
                                    เบอร์ติดต่อนักศึกษา: <input type="number" class="form-control" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของนักศึกษา" name="student_phone_number">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                สถานศึกษาเดิม: <input class="form-control" type="text" placeholder="กรุณณากรอกชื่อสถานศึกษาเดิม" name="schoolName">
                            </div>
                            <div class="col-lg-3">
                                <label>จบการศึกษาระดับ</label>
                                <select class="form-select" style="text-align: start;" name="level">
                                    <option value="">-</option>
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
                                <select class="form-select" style="text-align: start;" name="department">
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
                                    <select class="form-select" style="text-align: start;" name="year">
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
                                <select class="form-select" style="text-align: start;" name="classroom">
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
                                <select class="form-select" style="text-align: start;" name="teacherTitle">
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
                                ครูที่ปรึกษา: <input class="form-control" type="text" placeholder="กรุณณากรอกชื่อครูที่ปรึกษา ไม่ต้องใส่คำนำหน้า" name="teacherName">
                            </div>
                            <div class="col-lg-6">
                                <label for="formFileLg" class="form-label"><b><u>รูปภาพของนักศึกษา</u></b></label>
                                <input class="form-control form-control-lg" type="file" name="file1">
                            </div>
                            <!-- ส่วนที่ 2 -->
                            <h3><u><b>ส่วนที่ 2</b></u> ข้อมูลของบิดา-มารดา</h3>
                            <hr style="border: none; height: 2px; background-color: #030100;">
                            <!-- ข้อมูลบิดา -->
                            <h6><u><b>ข้อมูลบิดาร</b></u></h6>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ชื่อบิดา: <input type="text" class="form-control" placeholder="ชื่อบิดาร" name="fnamefather">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                นามสกุลบิดา: <input type="text" class="form-control" placeholder="นามสกุลบิดาร" name="lnamefather">
                            </div>
                            <div class="col-lg-3">
                                เลขบัตรประจำตัวประชาชน: <input class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeoplefather">
                            </div>
                            <div class="col-lg-3">
                                <label>เลือกประเภทบัตร</label>
                                <select class="form-select" style="text-align: start;" name="typepeoplefather">
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
                                    <select class="form-select" style="text-align: start;" name="father_status">
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
                                อาชีพของบิดาร: <input class="form-control" type="text" placeholder="อาชีพของบิดาร" name="father_occupation">
                            </div>
                            <div class="col-lg-3">
                                ประเภทความพิการ: <input class="form-control" placeholder="ประเภทความพิการ" name="father_disability_type">
                            </div>
                            <br>
                            <!-- ข้อมู,มารดา -->
                            <h6><u><b>ข้อมูลมารดา</b></u></h6>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    ชื่อมารดา: <input type="text" class="form-control" placeholder="ชื่อมารดา" name="fnamemother">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                นามสกุลมารดา: <input type="text" class="form-control" placeholder="นามสกุลมารดา" name="lnamemother">
                            </div>
                            <div class="col-lg-3">
                                เลขบัตรประจำตัวประชาชน: <input class="form-control" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeoplemother">
                            </div>
                            <div class="col-lg-3">
                                <label>เลือกประเภทบัตร</label>
                                <select class="form-select" style="text-align: start;" name="typepeoplemother">
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
                                    <select class="form-select" style="text-align: start;" name="mother_status">
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
                                อาชีพของมารดา: <input class="form-control" type="text" placeholder="อาชีพของมารดา" name="mother_occupation">
                            </div>
                            <div class="col-lg-3">
                                ประเภทความพิการ: <input class="form-control" placeholder="ประเภทความพิการมารดา" name="mother_disability_type">
                            </div>
                            <div class="col-lg-3">
                                <label>สถานภาพการสมรสของบิดา-มารดา</label>
                                <select class="form-select" style="text-align: start;" name="isMarried">
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
                                    ชื่อผู้ปกครอง: <input type="text" class="form-control" placeholder="ชื่อผู้ปกครอง" name="firstnameguardian">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                นามสกุลผู้ปกครอง: <input type="text" class="form-control" placeholder="นามสกุลผู้ปกครอง" name="lastnameguardian">
                            </div>
                            <div class="col-lg-3">
                                เลขบัตรประจำตัวประชาชน: <input class="form-select" type="text" maxlength="13" placeholder="กรุณณากรอกเลขบัตร 13 หลัก" name="numberpeopleguardian">
                            </div>
                            <div class="col-lg-3">
                                <label>เลือกประเภทบัตร</label>
                                <select class="form-select" style="text-align: start;" name="typepeopleguardian">
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
                                    ความสัมพันธ์: <input class="form-control" type="text" class="t1" placeholder="กรุณณากรอกความสัมพันธ์" name="parentguardian">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                อาชีพของผู้ปกครอง: <input class="form-control" type="text" placeholder="อาชีพของผู้ปกครอง" name="guardian_occupation">
                            </div>
                            <div class="col-lg-3">
                                ที่อยู่ปัจจุบันของผู้ปกครอง: <input type="text" class="form-control" placeholder="ที่อยู่ปัจจุบัน" name="housenumberguardian">
                            </div>
                            <div class="col-lg-3">
                                หมู่ที่: <input type="text" class="form-control" placeholder="หมู่ที่" name="villageguardian">
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label>จังหวัด</label>
                                    <select class="form-select" style="text-align: start;" name="provinceguardian" onchange="getdistrictisname(this.value)">
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
                                เบอร์ติดต่อผู้ปกครอง: <input class="form-control" type="number" maxlength="13" placeholder="กรุณณากรอกเบอร์โทรของผู้ปกครอง" name="phoneguardian">
                            </div>
                        </div>
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