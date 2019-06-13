<div class="modal fade" id="DeleteEntry" tabindex="-1" role="dialog" aria-labelledby="DeleteEntryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="DeleteEntryLabel">Delete Entry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this entry?</p>
        </div>
        <div class="modal-footer">
            <form id="deleteEntryForm" method="POST">
                <input type="hidden" name="_method" value="delete"/>
                @csrf
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-danger">Confirm</button>
            </form>
        </div>
        </div>
    </div>
</div>