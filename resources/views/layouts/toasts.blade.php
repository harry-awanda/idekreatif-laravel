<!-- resources/views/toast/_toast.blade.php -->
@if(session('success'))
<div id="toastSuccess" class="bs-toast toast fade bg-primary position-absolute m-3 end-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <i class="bx bx-bell me-2"></i>
    <div class="me-auto fw-semibold">Berhasil!</div>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">{{ session('success') }}</div>
</div>
@endif
@if(session('error'))
<div id="toastError" class="bs-toast toast fade bg-danger position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <i class="bx bx-x me-2"></i>
    <div class="me-auto fw-semibold">Error!</div>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">{{ session('error') }}</div>
</div>
@endif

<script>
  document.addEventListener('DOMContentLoaded', function () {
      let successToast = new bootstrap.Toast(document.getElementById('toastSuccess'));
      successToast.show();
      let errorToast = new bootstrap.Toast(document.getElementById('toastError'));
      errorToast.show();
  });
</script>