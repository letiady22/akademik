<div class="modal fade modal-danger" id="deleteModal" role="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Hapus Data</h4>
            </div>
            <div class="modal-body">
                Apa anda yakin ?
            </div>
            <div class="modal-footer">
                <form action="{{ $route }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger" value="Hapus">
                    <input type="button" data-dismiss="modal" value="Tutup" class="btn btn-default">
                </form>
            </div>
        </div>
    </div>
</div>