<table class="table table-schedule">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Start</th>
            <th>End</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->start }}</td>
                <td>{{ $event->end }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#editModal-{{ $event->id }}">Edit</button>
                    <form action="{{ route('event.delete') }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

<!-- Gunakan tag form dibawah ini untuk submit data jadwal yang akan diupdate. Gunakan contoh modal yang sudah dibuat pada nomor 1 dan 2 sebagai referensi -->
<!-- <form class="modal-content" method="POST" action="{{ route('event.update') }}"> </form> -->
