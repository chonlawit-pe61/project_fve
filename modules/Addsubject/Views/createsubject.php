<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>

<div class="pt-3 px-3">
    <h1 class="mt-0"><u><b>เพิ่มรายชื่อ11</b></u> นักเรียนนักศึกษา Pre-Ved Fve</h1>
    <br>
    <div style="border:3px solid; padding:10px; border-radius:2rem; background-color:#BAB0AE">
        <div class="px-3">
            <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                <div class="">
                    <form action="<?php echo base_url('') ?>" method="post" enctype="multipart/form-data">
                        
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