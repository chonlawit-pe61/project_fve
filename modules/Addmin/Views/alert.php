<link rel="stylesheet" href="">
<?php if (session()->getFlashdata('success') != null) : ?>
    <script type="text/javascript">
        Swal.fire({
  title: "บันทึกข้อมูลสำเร็จ",
  showDenyButton: true,
  confirmButtonText: "Save",
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    window.location.href = '<?php echo base_url('Addmin/life') ?>';
  } 
});
        
    </script>
    
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>