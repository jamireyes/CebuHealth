<div class="modal fade" id="RestoreEntry" tabindex="-1" role="dialog" aria-labelledby="RestoreEntryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="RestoreEntryLabel">Restore Entry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to restore this entry?</p>
        </div>
        <div class="modal-footer">
            <form id="restoreEntryForm" method="POST">
                @csrf
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
            </form>
        </div>
        </div>
    </div>
</div>