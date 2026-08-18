<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('admins/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('admins/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('admins/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('admins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('admins/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('admins/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('admins/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('admins/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


   <script>
$(document).ready(function () {

    const searchInput = document.getElementById('adminSearch');
    const clearBtn = document.getElementById('clearSearch');
    const searchResult = document.getElementById('searchResult');

    $('#adminSearch').keyup(function () {

        let search = $(this).val();

        if (search.length == 0) {
            $('#searchResult').html('');
            clearBtn.style.display = 'none';
            return;
        }

        clearBtn.style.display = 'flex';

        $.get("{{ route('admin.search') }}", {
            search: search
        }, function (data) {

            let html = '';

            data.forEach(function (item) {

                html += `
                    <a href="${item.url}" class="list-group-item list-group-item-action">
                        ${item.name}
                    </a>
                `;

            });

            $('#searchResult').html(html);

        });

    });

    clearBtn.addEventListener('click', function () {

        searchInput.value = '';
        searchResult.innerHTML = '';
        clearBtn.style.display = 'none';
        searchInput.focus();

    });

});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






<script>
document.querySelector('input[name="name"]').addEventListener('keyup', function(){

    let slug = this.value
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');

    document.getElementById('slug').value = slug;

});
</script>

