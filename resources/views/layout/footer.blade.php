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

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert simpan data -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const saveButtons = document.querySelectorAll('.saveButton');

        saveButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = button.closest('form');

                if (!form) {
                    console.error("Form tidak ditemukan!");
                    return;
                }

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data akan disimpan!',
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Tidak, batalkan!',
                    confirmButtonText: 'Ya, simpan!',
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#dc3545',
                    reverseButtons: true
                }).then((willSave) => {
                    if (willSave.isConfirmed) {
                        form.submit(); // Form langsung disubmit tanpa SweetAlert kedua
                    }
                });
            });
        });
    });
</script>

<!-- SweetAlert hapus data -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.deleteButton');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                const formId = this.id.replace('swal-delete-', 'deleteForm-');
                const form = document.getElementById(formId);

                if (!form) {
                    console.error('Form not found:', formId);
                    return;
                }

                // Menampilkan konfirmasi SweetAlert dengan warna tombol yang disesuaikan
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33', // Merah untuk tombol hapus
                    cancelButtonColor: '#28a745', // Hijau untuk tombol batal (atau ganti dengan #007bff untuk biru)
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Data Berhasil Dihapus!',
                            icon: 'success',
                            confirmButtonColor: '#28a745' // Hijau untuk konfirmasi sukses
                        }).then(() => {
                            form.submit();
                        });
                    } else {
                        Swal.fire({
                            title: 'Data Anda aman!',
                            icon: 'info',
                            confirmButtonColor: '#007bff' // Biru untuk konfirmasi batal
                        });
                    }
                });
            });
        });
    });
</script>

<!-- Fungsi untuk menghitung total 3 lembar -->
<script>
    function calculateTotal3() {
        const tag = parseInt(document.getElementById('rptag3lembar').value) || 0;
        const bk = parseInt(document.getElementById('rpbk3lembar').value) || 0;

        const total = tag + bk;

        document.getElementById('rptot3lembar').value = total;
    }
</script>

<!-- Fungsi untuk menghitung total 1 lembar -->
<script>
    function calculateTotal1() {
        const tag = parseInt(document.getElementById('rptag1lembar').value) || 0;
        const bk = parseInt(document.getElementById('rpbk1lembar').value) || 0;

        const total = tag + bk;

        document.getElementById('rptot1lembar').value = total;
    }
</script>

<!-- Fungsi untuk bulan -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bulanAwal = document.getElementById('bulanawal');
        const bulanAkhir = document.getElementById('bulanakhir');

        bulanAwal.addEventListener('change', function () {
            const selectedValue = bulanAwal.value.split('-'); // Format: MM-YYYY
            const startMonth = parseInt(selectedValue[0]); // Bulan awal sebagai angka (1-12)

            // Aktifkan semua opsi bulan akhir terlebih dahulu
            Array.from(bulanAkhir.options).forEach(option => {
                option.disabled = false;
            });

            // Nonaktifkan opsi bulan akhir yang kurang dari atau sama dengan bulan awal
            Array.from(bulanAkhir.options).forEach(option => {
                if (option.value) {
                    const optionValue = option.value.split('-'); // Format: MM-YYYY
                    const optionMonth = parseInt(optionValue[0]); // Bulan akhir sebagai angka (1-12)

                    if (optionMonth <= startMonth) {
                        option.disabled = true;
                    }
                }
            });

            // Reset pilihan bulan akhir ke default jika opsi yang dipilih tidak valid
            if (bulanAkhir.value && bulanAkhir.options[bulanAkhir.selectedIndex].disabled) {
                bulanAkhir.value = '';
            }
        });
    });
</script>

<!-- Fungsi untuk logout -->
<script>
    document.getElementById('logout-btn').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Anda yakin ingin logout?',
            text: "Anda akan keluar dari sesi saat ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33', // Merah untuk tombol logout
            cancelButtonColor: '#3085d6', // Biru untuk tombol batal
            confirmButtonText: 'Ya, Logout!',
            cancelButtonText: 'Batal',
            reverseButtons: true // Menukar posisi tombol
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout') }}";
            }
        });
    });
</script>

</body>
</html>
