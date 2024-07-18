<div>
    @include('livewire.model-photo')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        @can('اضافة صورة')
                          <button type="button" class="modal-effect btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#addimg">
                            اضافة صورة جديدة
                          </button>
                        @endcan
                    </div>
    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">صورة الاعضاء</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($photos as $photo)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a href="{{ Storage::url($photo->img) }}"><img
                                            src="{{ Storage::url($photo->img) }}"
                                            style="width: 80px; height: 50px;"></a></td>
                                        <td>
                                            @can('تعديل صورة')
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateimgModal" wire:click="editImg({{$photo->id}})" class="modal-effect btn btn-sm btn-info custom-btn">
                                                    تعديل
                                                  </button>
                                            </a>
                                            @endcan
    
                                            @can('حذف صورة')
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteImgModal" wire:click="deleteImg({{$photo->id}})" class="modal-effect btn btn-sm btn-danger" >
                                                    حذف
                                                    </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    