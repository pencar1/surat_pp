<footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; <span id="currentYear"></span> <div class="bullet"></div> PLN ULP Banjarbaru
    </div>
    <div class="footer-right">

    </div>
</footer>

<script>
    // Mendapatkan tahun saat ini
    const currentYear = new Date().getFullYear();
    // Menampilkan tahun di elemen dengan id "currentYear"
    document.getElementById('currentYear').textContent = currentYear;
</script>

    <!-- General JS Scripts -->
    <script src="{{ asset ('stisla/dist/assets/modules/jquery.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/popper.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/tooltip.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/moment.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset ('stisla/dist/assets/modules/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/chart.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/datatables/datatables.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset ('stisla/dist/assets/js/page/index.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset ('stisla/dist/assets/js/page/modules-datatables.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{ asset ('stisla/dist/assets/js/scripts.js')}}"></script>
    <script src="{{ asset ('stisla/dist/assets/js/custom.js')}}"></script>
</body>
</html>
