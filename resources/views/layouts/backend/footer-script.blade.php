<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src=" {{ asset('backend/assets/js/main.js') }}"></script>



<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src=" {{ asset('backend/assets/js/init/weather-init.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src=" {{ asset('backend/assets/js/init/fullcalendar-init.js') }}"></script>

{{-- dataTables --}}

<script src="{{ asset('backend/assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/init/datatables-init.js') }}"></script>

<script src=" {{ asset('backend/assets/summernote/summernote-lite.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
<!--Local Stuff-->
<script>
$(document).ready(() => {
    $('#photos').change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('#photosPreview')
                .attr("src",event.target.result);   
            };
            reader.readAsDataURL(file);
        }
    })
});
// Hapus data
function deleteData(id) {
    swal({
        title: "Apakah anda yakin menghapus data ",
        text: "Anda tidak dapat mengembalikan data tersebut !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $('#delete-'+id).submit();
            } else {
                console.log('data salah');
            }
        });
};

</script>
<script>
    // $(document).ready(function() {
    // $('.summernote').summernote();
    // });
    $('#summernote').summernote({
      placeholder: 'exp : Kesehatan Jasmani adalah...',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
        ['height', ['height']],
      ],

    //   callbacks: {
    //     onImageUpload: function(files) {
    //     // upload image to server and create imgNode...
    //     $summernote.summernote('insertNode', imgNode);
    //     }
    // }
    });
  </script>

