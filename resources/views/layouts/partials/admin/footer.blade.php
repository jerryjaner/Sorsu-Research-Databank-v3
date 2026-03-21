<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row flex-stack">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
             <span class="text-muted fw-bold me-1"><span id="year"></span> ©</span>
             <a href="#" class="text-gray-800 text-hover-primary">Sorsogon State University</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->

        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
@push('scripts')
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
@endpush
