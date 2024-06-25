<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>

<div class="p-3 border shadow-sm mb-2">
    <h1 class="mt-0"><u><b>รายวิชา</b></u></h1>
    <div class="my-3">
        <table class="table">
            <thead>
                <tr>
                    <td class="text-center">
                        ลำดับ
                    </td>
                    <td class="text-center">
                        รหัสวิชา
                    </td>
                    <td>
                        ชื่อวิชา
                    </td>
                    <td class="text-center">
                        ทฤษฎี
                    </td>
                    <td class="text-center">
                        ปฎิบัติ
                    </td>
                    <td class="text-center">
                        หน่วยกิต
                    </td>
                    <td class="text-center">
                        ชั่วโมง
                    </td>
                    <td class="text-center">
                        เครื่องมือ
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <a href="">
                            <td class="text-center">
                                <?php echo $key + 1 ?>
                            </td>
                            <td class="text-center">
                                <?php echo $subject['subjects_id'] ?>
                            </td>
                            <td>
                                <?php echo $subject['name'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $subject['lecture_unit'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $subject['practical_unit'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $subject['unit'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $subject['hour'] ?>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo base_url('ManageSubjectTeacher/Subject/Term?id=' . $subject['id']) ?>" class="btn btn-success">แสดงรายละเอียดเพิ่มเติม</a>
                            </td>
                        </a>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts') ?>
<script>

</script>
<?php $this->endSection() ?>