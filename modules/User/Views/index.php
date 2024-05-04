<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm">
    <div class="row">
        <div class="col-md-12">
            <h3 class="float-left">บุคลากร</h3>
            <a href="<?= base_url('users/manage'); ?>" class="btn btn-success float-right">เพิ่ม</a>
        </div>
        <div class="col-md-12 mt-3">
            <table id="users-tbl" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>ชื่อ-นามกสุล</th>
                        <th width="30%">แผนก</th>
                        <th width="10%">สถานะ</th>
                        <th width="20%">เครื่องมือ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    $('#users-tbl').dataTable({
        "language": {
            "lengthMenu": "แสดง _MENU_ รายการ",
            "search": "ค้นหา:",
            "zeroRecords": "ไม่มีข้อมูล",
            "info": "รายการที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "infoFiltered": "(กรองข้อมูลทั้งหมดจาก _MAX_ รายการ)",
            "infoEmpty": "ไม่มีข้อมูล",
            "paginate": {
                "first": "หน้าแรก",
                "last": "หน้าสุดท้าย",
                "next": "ถัดไป",
                "previous": "ก่อนหน้า"
            },
            "processing": "Loading..."
        },
        processing: true,
        serverSide: true,
        ajax: "<?= base_url('users/ajax-users') ?>",
        columnDefs: [{
                targets: 0,
            },
            {
                targets: 1,
            },
            {
                targets: 2,
            },
            {
                targets: 3,
            },
            {
                targets: 4,
            }
        ],
        columns: [{
                data: null,
                render: function(data, type, full, meta) {
                    return meta.row + 1;
                },
            },
            {
                data: '',
                render: function (data, type, row, meta) {
                    return row.firstname + ' ' + row.lastname;
                }
            },
            {
                data: 'lastname'
            },
            {
                data: 'role_name'
            },
            {
                data: 'id',
                render: function(data, row, type, meta) {
                    let btn = `
                        <a href="<?= base_url() ?>/users/manage/${data}" class="btn btn-warning btn-sm">แก้ไข</a>
                    `;
                    return btn;
                }
            }
        ]
    });
</script>
<?php $this->endSection(); ?>