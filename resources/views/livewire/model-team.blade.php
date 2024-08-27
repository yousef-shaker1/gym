<div>
    <div wire:ignore.self class="modal fade" id="addcaptain" tabindex="-1" aria-labelledby="addcaptainLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addcaptainLabel">Create Section</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
            </div>
            <form wire:submit.prevent="saveSection">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>اسم الكابتن</label>
                        <input type="text" wire:model.live="name" class="form-control">
                        @error('name') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label>عمر الكابتن</label>
                        <input type="text" wire:model.live="age" class="form-control">
                        @error('age') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label>القسم الخاص بالكابتن</label>
                        <select name="section_id" wire:model.live="section_id" class="form-control" required>
                            <option value="" selected > -حدد القسم-</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <div class="error-message">{{ $message }}</div> @enderror
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
    <div wire:ignore.self class="modal fade" id="updatecaptenModal" tabindex="-1" aria-labelledby="updatecaptenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatecaptenModalLabel">Edit capten</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="updateStudent">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>اسم الكابتن</label>
                            <input type="text" wire:model.live="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>عمر الكابتن</label>
                            <input type="text" wire:model.live="age" class="form-control">
                            @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>القسم الخاص بالكابتن</label>
                            <select name="section_id" wire:model.live="section_id" class="form-control" required>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="current_img" class="col-form-label">الصورة الحالية للقسم:</label>
                            <br>
                            <a id="current_img_link" href="{{ Storage::url($img) }}"><img id="" src="{{ Storage::url($img) }}"
                                    style="width: 80px; height: 50px;"></a>
                            <br>
                        </div>
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
    <div wire:ignore.self class="modal fade" id="deletecaptionModal" tabindex="-1" aria-labelledby="deletecaptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletecaptionModalLabel">Delete capten</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal">&times;</button>
                </div>
                <form wire:submit.prevent="destroyStudent">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this caption ?</h4>
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
    