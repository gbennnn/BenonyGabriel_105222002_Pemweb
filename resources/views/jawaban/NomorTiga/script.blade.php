<script type="text/javascript">
    $('.table-schedule').DataTable({
        language: {
            paginate: {
                next: '<i class="bi bi-arrow-right"></i>',
                previous: '<i class="bi bi-arrow-left"></i>'
            },
            emptyTable: "Data tidak ditemukan",
        },
    });

    // Tuliskan trigger saat menekan tombol edit
    // Di dalam trigger tersebut, tambahkan API untuk meload data 1 jadwal
</script>
