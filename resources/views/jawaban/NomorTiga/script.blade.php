<script type="text/javascript">
    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        const url = `{{ route('event.get-selected-data') }}?id=${id}`;

        $.get(url, function(data) {
            if (data) {
                $('#editModal [name="id"]').val(data.id);
                $('#editModal [name="name"]').val(data.name);
                $('#editModal [name="start"]').val(data.start);
                $('#editModal [name="end"]').val(data.end);
                $('#editModal').modal('show');
            }
        }).fail(function() {
            alert('Gagal memuat data!');
        });
    });


    // $('.table-schedule').DataTable({
    //     language: {
    //         paginate: {
    //             next: '<i class="bi bi-arrow-right"></i>',
    //             previous: '<i class="bi bi-arrow-left"></i>'
    //         },
    //         emptyTable: "Data tidak ditemukan",
    //     },
    // });

    // Tuliskan trigger saat menekan tombol edit
    // Di dalam trigger tersebut, tambahkan API untuk meload data 1 jadwal
</script>
