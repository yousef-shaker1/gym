<div>

    <div wire:ignore.self class="modal fade" id="addimg" tabindex="-1" aria-labelledby="addimgLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addimgLabel">add photo</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="saveImg">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>الصورة</label>
                            <input type="file" wire:model="img" class="form-control">
                            @error('img') <div class="error-message">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <!-- Update Student Modal -->
    <div wire:ignore.self class="modal fade" id="updateimgModal" tabindex="-1" aria-labelledby="updateimgModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateimgModalLabel">Edit photo</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="updateImg">
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="current_img" class="col-form-label">الصورة الحالية للقسم:</label>
                            <br>
                            <a id="current_img_link" href="{{ Storage::url($img) }}"><img id="" src="{{ Storage::url($img) }}"
                                    style="width: 80px; height: 50px;"></a>
                            <br>
                        </div>
                        <div class="mb-3">
                            <label>ارفع صورة</label>
                            <input type="file" wire:model.live="img" class="form-control">
                            @error('img') <span class="text-danger">{{ $message }}</span> @enderror
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
     <div wire:ignore.self class="modal fade" id="deleteImgModal" tabindex="-1" aria-labelledby="deleteImgModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteImgModalLabel">Delete photo</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="destroyImage">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this img ?</h4>
                        <br>
                        <a id="current_img_link" href="{{ Storage::url($img) }}"><img id="" src="{{ Storage::url($img) }}"
                            style="width: 80px; height: 50px;"></a>
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
    