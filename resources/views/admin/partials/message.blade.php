@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        {{ session('error') }}
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        {{ session('success') }}
    </div>
@endif

@if (session()->has('swalSuccess'))
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('swalSuccess') }}",
            icon: "success"
        });
    })
</script>
@endif

@if (session()->has('swalError'))
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        Swal.fire({
            title: "Gagal!",
            text: "{{ session('swalError') }}",
            icon: "error"
        });
    })
</script>
@endif
