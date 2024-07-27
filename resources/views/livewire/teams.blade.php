<div>
    @include('livewire.model-team')
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
                        @can('اضافة كابتن')
                          <button type="button" class="modal-effect btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#addcaptain">
                            اضافة كابتن جديد
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
                                    <th class="border-bottom-0">صورة الكابتن</th>
                                    <th class="border-bottom-0">اسم الكابتن</th>
                                    <th class="border-bottom-0">عمر الكابتن</th>
                                    <th class="border-bottom-0">قسم الخاص بالكابتن</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($teams as $team)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a href="{{ Storage::url($team->img) }}"><img
                                            src="{{ Storage::url($team->img) }}"
                                            style="width: 80px; height: 50px;"></a></td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->age }}</td>
                                        <td>{{ $team->section->name }}</td>
                                        <td>
                                            @can('تعديل كابتن')
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#updatecaptenModal" wire:click="editSection({{$team->id}})" class="modal-effect btn btn-sm btn-info custom-btn">
                                                    تعديل
                                                  </button>
                                            @endcan
    
                                            @can('حذف كابتن')
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#deletecaptionModal" wire:click="deleteSection({{$team->id}})" class="modal-effect btn btn-sm btn-danger" >
                                                    حذف
                                                    </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($teams->hasPages())
                        <ul class="pagination justify-content-center">
                            <!-- زر الصفحة السابقة -->
                            @if ($teams->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">السابق</span></li>
                            @else
                                <li class="page-item"><a href="{{ $teams->previousPageUrl() }}" class="page-link" rel="prev">السابق</a></li>
                            @endif
                    
                            <!-- أرقام الصفحات -->
                            @foreach(range(1, $teams->lastPage()) as $page)
                                <li class="page-item {{ $page == $teams->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $teams->url($page) }}" class="page-link">{{ $page }}</a>
                                </li>
                            @endforeach
                    
                            <!-- زر الصفحة التالية -->
                            @if ($teams->hasMorePages())
                                <li class="page-item"><a href="{{ $teams->nextPageUrl() }}" class="page-link" rel="next">التالي</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">التالي</span></li>
                            @endif
                        </ul>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    