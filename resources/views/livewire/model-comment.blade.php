<div>
    <!-- Delete Student Modal -->
    <div wire:ignore.self class="modal fade" id="deleteCommentModal" tabindex="-1" aria-labelledby="deleteCommentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCommentModalLabel">Delete Student</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                wire:click="closeModal">&times;</button>
            </div>
            <form wire:submit.prevent="destroyComment">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this data ?</h4>
                    <label>الرسالة</label>
                    <input type="text" wire:model.lazy="comment" class="form-control" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
