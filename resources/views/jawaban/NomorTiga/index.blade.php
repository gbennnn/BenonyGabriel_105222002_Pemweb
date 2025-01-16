<table class="table table-schedule">
    @if (Auth::user())
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
                            <button type="submit" class="btn btn-danger btn-sm"
                                data-id="{{ $event->id }}">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @endif
</table>

{{-- Modal Edit --}}

<!-- Gunakan tag form dibawah ini untuk submit data jadwal yang akan diupdate. Gunakan contoh modal yang sudah dibuat pada nomor 1 dan 2 sebagai referensi -->
@foreach ($events as $event)
    <div class="modal fade" id="editModal-{{ $event->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel-{{ $event->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST" action="{{ route('event.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $event->id }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel-{{ $event->id }}">Edit Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Event</label>
                    <input type="text" class="form-control" name="name" required value="{{ $event->name }}">
                    <label class="mt-2">Start</label>
                    <input type="date" class="form-control" name="start" required value="{{ $event->start }}">
                    <label class="mt-2">End</label>
                    <input type="date" class="form-control" name="end" required value="{{ $event->end }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endforeach
