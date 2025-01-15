<div class="modal-body">
    @csrf
    <div class="form-group">
        <label for="eventName">Nama Jadwal</label>
        <input type="text" class="form-control" id="eventName" name="name" required>
    </div>
    <div class="form-group">
        <label for="startDate">Tanggal Mulai</label>
        <input type="date" class="form-control" id="startDate" name="start" required>
    </div>
    <div class="form-group">
        <label for="endDate">Tanggal Selesai</label>
        <input type="date" class="form-control" id="endDate" name="end" required>
    </div>
</div>
