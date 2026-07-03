 <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
#toast-container {
    top: 60px !important;
}
</style>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-top-right",
    timeOut: 3000
};

@if(session('success'))
    toastr.success("{{ session('success') }}");
@endif

@if(session('error'))
    toastr.error("{{ session('error') }}");
@endif

@if(session('warning'))
    toastr.warning("{{ session('warning') }}");
@endif

@if(session('info'))
    toastr.info("{{ session('info') }}");
@endif

</script>