<script type="text/javascript">
    $(document).ready(function() {
        // URL endpoint API
        const apiUrl = "{{ route('api.events') }}"; // Sesuaikan dengan route API Anda

        // Mengambil data dari API
        $.getJSON(apiUrl, function(data) {
            // Contoh menampilkan data di console
            console.log(data);

            // Jika Anda menggunakan FullCalendar, inisialisasi kalender
            $('#calendar').fullCalendar({
                events: data, // Data dari API
                eventColor: function(event) {
                    return event.color; // Menentukan warna dari API
                }
            });
        }).fail(function() {
            alert('Gagal mengambil data jadwal.');
        });
    });
</script>
