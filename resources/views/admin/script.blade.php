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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdownToggle = document.getElementById("websiteContentDropdown");
        var dropdownMenu = document.getElementById("websiteContentCollapse");

        dropdownToggle.addEventListener('click', function () {
            var isOpen = dropdownMenu.classList.contains('show');
            if (!isOpen) {
                dropdownMenu.classList.add('show');
            } else {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdownToggle = document.getElementById("marketingDropdown");
        var dropdownMenu = document.getElementById("marketingCollapse");

        dropdownToggle.addEventListener('click', function () {
            var isOpen = dropdownMenu.classList.contains('show');
            if (!isOpen) {
                dropdownMenu.classList.add('show');
            } else {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdownToggle = document.getElementById("settingDropdown");
        var dropdownMenu = document.getElementById("settingCollapse");

        dropdownToggle.addEventListener('click', function () {
            var isOpen = dropdownMenu.classList.contains('show');
            if (!isOpen) {
                dropdownMenu.classList.add('show');
            } else {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdownToggle = document.getElementById("productDropdown");
        var dropdownMenu = document.getElementById("productCollapse");

        dropdownToggle.addEventListener('click', function () {
            var isOpen = dropdownMenu.classList.contains('show');
            if (!isOpen) {
                dropdownMenu.classList.add('show');
            } else {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>

<script>
    function submitInnerForm(event) {
        event.stopPropagation(); // Prevent the outer form submission
        // Handle inner form submission here
        document.getElementById('SizeForm').submit();
    }
</script>
