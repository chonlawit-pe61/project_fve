<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div>
    <div class="px-3 py-3">
        <table class="table " id="myTable">
            <thead class="table-dark">
                <tr>
                    <td>
                        ชื่อ
                    </td>
                    <td>
                        นามสกุล
                    </td>
                    <td>
                        แผนกวิชา
                    </td>
                    <td>
                        ชั้นปี
                    </td>
                    <td>
                        ห้อง
                    </td>
                    <td>
                        ครูที่ปรึษา
                    </td>
                    <td>
                        รูป
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($std as $st) {
                ?>
                    <tr>
                        <td>
                            <?php echo $st['thainamestd'] ?>
                        </td>
                        <td>
                            <?php echo $st['thailaststd'] ?>
                        </td>
                        <td>
                            <?php echo $st['department_name'] ?>
                        </td>
                        <td>
                            <?php echo $st['level_name'] ?>
                        </td>
                        <td>
                            <?php echo $st['classroom_name'] ?>
                        </td>
                        <td>
                            <?php echo $st['std_teacherTitle'] . ' ' . $st['teacherName'] ?>
                        </td>
                        <td>
                            <img src="" alt="">
                        </td>
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
    $(document).ready(function() {
        $('#myTable').dataTable({});
    })
</script>
<?php $this->endSection() ?>