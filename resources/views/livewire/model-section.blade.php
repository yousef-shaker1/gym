<div>
    <div wire:ignore.self class="modal fade" id="addsection" tabindex="-1" aria-labelledby="addsectionLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addsectionLabel">Create section</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
            </div>
            <form wire:submit.prevent="saveSection">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>اسم القسم</label>
                        <input type="text" wire:model.live="name" class="form-control">
                        @error('name') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label>صورة القسم</label>
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
    <div wire:ignore.self class="modal fade" id="updateSectionModal" tabindex="-1" aria-labelledby="updateSectionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateSectionModalLabel">Edit section</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="updateStudent">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>اسم القسم</label>
                            <input type="text" wire:model.live="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @if ($this->img && is_object($this->img))
                            <div>
                                <img src="{{ $this->img->temporaryUrl() }}" style="width: 80px; height: 50px;">
                            </div>
                        @elseif ($this->img)
                            <a id="current_img_link" href="{{ Storage::url($this->img) }}">
                                <img id="" src="{{ Storage::url($this->img) }}" style="width: 80px; height: 50px;">
                            </a>
                        @endif

                        <div class="mb-3">
                            <label>صورة القسم</label>
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
    <div wire:ignore.self class="modal fade" id="deleteSectionModal" tabindex="-1" aria-labelledby="deleteSectionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSectionModalLabel">Delete section</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="destroyStudent">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                        <label>اسم القسم</label>
                        <input type="text" wire:model.lazy="name" class="form-control" readonly>
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
    