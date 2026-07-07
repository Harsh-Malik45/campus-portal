 <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>

 #toast-container{
    top:60px !important;
}

 #toast-container>.toast{
    width:280px;
    padding:14px 14px;
    border-radius:10px;
    font-size:14px;
    background-image:none !important;
    box-shadow:0 6px 18px rgba(0,0,0,.2);
}

 .toast-success{
    background:#2E7D32 !important;
    color:#fff !important;
}

 .toast-error{
    background:#C62828 !important;
    color:#fff !important;
}

 .toast-warning{
    background:#F9A825 !important;
    color:#fff !important;
}

 .toast-info{
    background:#1565C0 !important;
    color:#fff !important;
}

 .toast-success,
.toast-error,
.toast-warning,
.toast-info{
    background-image:none !important;
}

 .toast-message{
    font-size:14px;
    line-height:1.4;
}

 .toast-close-button{
    color:#fff !important;
    opacity:1;
    font-size:18px;
    right:8px !important;
}

.toast-close-button:hover{
    color:#ddd !important;
}

</style>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

toastr.options = {
    closeButton: true,
    progressBar: false,
    newestOnTop: true,
    preventDuplicates: true,
    positionClass: "toast-top-right",
    showDuration: 300,
    hideDuration: 300,
    timeOut: 3000,
    extendedTimeOut: 1000,
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
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