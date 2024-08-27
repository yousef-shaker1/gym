<div>
    <div wire:ignore.self class="modal fade" id="addpost" tabindex="-1" aria-labelledby="addpostLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addpostLabel">اضافة بوست جديد</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
            </div>
            <form wire:submit.prevent="saveSection">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>عنوان البوست</label>
                        <input type="text" wire:model.live="title" class="form-control">
                        @error('title') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label>تفاصيل البوست</label>
                        <input type="text" wire:model.live="description" class="form-control">
                        @error('description') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label>صورة البوست</label>
                        <input type="file" wire:model.live="img" class="form-control">
                        @error('img') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

    
    <!-- Update Student Modal -->
    <div wire:ignore.self class="modal fade" id="updatepostModal" tabindex="-1" aria-labelledby="updatepostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatepostModalLabel">Edit Student</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="updatePost">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>عنوان البوست</label>
                            <input type="text" wire:model.live="title" class="form-control">
                            @error('title') <div class="error-message">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label>تفاصيل البوست</label>
                            <input type="text" wire:model.live="description" class="form-control">
                            @error('description') <div class="error-message">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="current_img" class="col-form-label">الصورة الحالية للقسم:</label>
                            <br>
                            <a id="current_img_link" href="{{ Storage::url($img) }}"><img id="" src="{{ Storage::url($img) }}"
                                style="width: 80px; height: 50px;"></a>
                                <br>
                            </div>
                        <div class="mb-3">
                            <label>صورة البوست</label>
                            <input type="file" wire:model.live="img" class="form-control">
                            @error('img') <div class="error-message">{{ $message }}</div> @enderror
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Delete Student Modal -->
    <div wire:ignore.self class="modal fade" id="deletepostModal" tabindex="-1" aria-labelledby="deletepostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletepostModalLabel">Delete post</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="destroyStudent">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                        <label>عنوان البوست</label>
                        <input type="text" wire:model.lazy="title" class="form-control" readonly>
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
    