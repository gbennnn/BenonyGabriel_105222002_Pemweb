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

    document.addEventListener('DOMContentLoaded', function() {
        // Handler ketika tombol edit diklik
        $('.edit-btn').on('click', function() {
            let id = $(this).data('id');

            // Ambil data menggunakan endpoint yang sudah ada
            $.get('{{ route('event.get-selected-data') }}', {
                    id: id
                })
                .done(function(data) {
                    $('#edit_id').val(data.id);
                    $('#edit_nama').val(data.name);
                    $('#edit_start').val(data.start);
                    $('#edit_end').val(data.end);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                    alert('Terjadi kesalahan saat mengambil data. Silakan coba lagi.');
                });
        });

        // Handler untuk tombol delete
        $('.delete-btn').on('click', function() {
            let id = $(this).data('id');

            if (confirm('Apakah Anda yakin ingin menghapus event ini?')) {
                $.ajax({
                    url: '{{ route('event.delete') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Event berhasil dihapus');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menghapus event');
                    }
                });
            }
        });
    });
</script>
