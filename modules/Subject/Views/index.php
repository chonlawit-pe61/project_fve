<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div class="p-3 border shadow-sm">
    <div class="row">
        <div class="col-md-12">
            <h3 class="float-left">รายวิชา</h3>
            <a href="<?= base_url('subjects/manage'); ?>" class="btn btn-success float-right">เพิ่ม</a>
        </div>
        <div class="col-md-12 mt-3">
            <table id="subjects-tbl" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">หมวดวิชา</th>
                        <th width="30%">ชื่อวิชา</th>
                        <th width="10%">หน่วยกิต</th>
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
    $('#subjects-tbl').dataTable({
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
        ajax: "<?= base_url('subjects/ajax-subjects') ?>",
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
                data: 'group_id',
            },
            {
                data: 'name',
            },
            {
                data: 'unit',
            },
            {
                data: 'id',
                render: function(data, row, type, meta) {
                    let btn = `
                        <a href="<?= base_url() ?>/subjects/manage/${data}" class="btn btn-secondary btn-sm"><i class="fa fa-pen"></i></a>
                        <button class="btn btn-danger btn-sm" onclick="deleteSubject('${data}')"><i class="fa fa-trash"></i></button>
                    `;
                    return btn;
                }
            }
        ]
    });

    function deleteSubject(id) {
        console.log(id)
        Swal.fire({
            title: "แจ้งเตือนจากระบบ",
            text: "คุณต้องการลบข้อมูลแถวนี้หรือไม่?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ตกลง",
            cancelButtonText: "ยกเลิก"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>/subjects/delete",
                    data: {
                        id : id
                    },
                    success: function(res) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "ทำรายการสำเร็จ",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            $('#subjects-tbl').DataTable().ajax.reload(null, false);
                        })
                    }
                })
            }
        });
    }
</script>
<?php $this->endSection(); ?>