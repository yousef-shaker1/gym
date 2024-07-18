<div>
    @include('livewire.model-section')
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
                        @can('اضافة قسم')
                          <button type="button" class="modal-effect btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#addsection">
                            اضافة قسم جديد
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
                                    <th class="border-bottom-0">صورة القسم</th>
                                    <th class="border-bottom-0">اسم القسم</th>
                                    <th class="border-bottom-0">اسعار الاشتراكات</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($sections as $section)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a href="{{ Storage::url($section->img) }}"><img
                                                    src="{{ Storage::url($section->img) }}"
                                                    style="width: 80px; height: 50px;"></a></td>
                                        <td>{{ $section->name }}</td>
                                        <td>
                                            @can('عرض السعر')
                                            <a href="{{ route('rale_offer.show', $section->id) }}" class="btn btn-secondary">
                                                عرض السعر
                                            </a>
                                            @endcan
                                        </td>
                                        
                                        <td>
                                            @can('تعديل قسم')
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateSectionModal" wire:click="editSection({{$section->id}})" class="modal-effect btn btn-sm btn-info custom-btn">
                                                    تعديل
                                                  </button>
                                            @endcan
    
                                            @can('حدف قسم')
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteSectionModal" wire:click="deleteSection({{$section->id}})" class="modal-effect btn btn-sm btn-danger" >
                                                    حذف
                                                    </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-4">
                            {{ $sections->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    