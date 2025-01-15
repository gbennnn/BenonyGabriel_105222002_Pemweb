<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.submit') }}">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i> Tuliskan Inputan Form untuk tambah jadwal </i>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </form>
    </div>
</div>
