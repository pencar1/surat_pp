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
        const saveButtons = document.querySelectorAll('.saveButton'); // Mencari tombol dengan kelas .saveButton

        saveButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Mencegah form submit langsung
                const form = button.closest('form'); // Mendapatkan form terdekat dari tombol

                if (!form) {
                    console.error("Form tidak ditemukan!"); // Debugging jika form tidak ditemukan
                    return;
                }

                // Menampilkan konfirmasi SweetAlert
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Data akan disimpan!`,
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Tidak, batalkan!',
                    confirmButtonText: 'Ya, simpan!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    reverseButtons: true
                }).then((willSave) => {
                    if (willSave.isConfirmed) {
                        // Jika pengguna mengonfirmasi, form akan disubmit
                        Swal.fire({
                            title: 'Data Berhasil Disimpan!',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-success'
                        }).then(() => {
                            form.submit(); // Mengirimkan form untuk menyimpan data
                        });
                    } else {
                        // Jika pengguna membatalkan, tampilkan info
                        Swal.fire({
                            title: 'Data Anda aman!',
                            icon: 'info',
                            confirmButtonClass: 'btn btn-info'
                        });
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
                event.preventDefault(); // Mencegah aksi default (submit form)

                // Mengambil ID form yang sesuai
                const formId = this.id.replace('swal-delete-', 'deleteForm-');
                const form = document.getElementById(formId);

                if (!form) {
                    console.error('Form not found:', formId); // Untuk debug jika form tidak ditemukan
                    return;
                }

                // Menampilkan konfirmasi SweetAlert menggunakan SweetAlert2
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    dangerMode: true, // Menandakan bahwa ini adalah aksi yang berisiko
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Menampilkan konfirmasi setelah penghapusan
                        Swal.fire('Data Berhasil Dihapus!', {
                            icon: 'success',
                        }).then(() => {
                            form.submit(); // Kirim form setelah konfirmasi hapus
                        });
                    } else {
                        // Menampilkan informasi bahwa data aman
                        Swal.fire('Data Anda aman!', {
                            icon: 'info',
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

</body>
</html>
