<script src="{{ asset('cms/js/core/popper.min.js') }}"></script>
<script src="{{ asset('cms/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('cms/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('cms/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('cms/js/plugins/chartjs.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"
    integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script>
    function toggleDarkMode() {
        var body = document.querySelector('body');
        body.classList.toggle('dark-version');
    }
</script>

<script>
    window.addEventListener("load", function() {
        const loader = document.getElementById("loader");
        loader.style.display = "none";
    });
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('cms/js/argon-dashboard.min.js') }}"></script>
<script src="{{ asset('cms/js/argon-dashboard.js') }}"></script>
