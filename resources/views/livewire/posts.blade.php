<div>
    @include('livewire.model-posts')
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
                          <button type="button" class="modal-effect btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#addpost">
                            اضافة بوست جديد
                          </button>
                    </div>
    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">صورة البوست</th>
                                    <th class="border-bottom-0">عنوان البوست</th>
                                    <th class="border-bottom-0">كاتب البوست</th>
                                    <th class="border-bottom-0">تاريخ البوست</th>
                                    <th class="border-bottom-0">محتوي البوست</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($posts as $post)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            <a href="{{ Storage::url($post->img) }}">
                                                <img src="{{ Storage::url($post->img) }}" style="width: 80px; height: 50px;">
                                            </a>
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->Written_by }}</td>
                                        <td>{{ $post->date }}</td>
                                        <td>{{ $post->description }}</td>
                                        <td>
                                            <div class="d-inline">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#updatepostModal" wire:click="editPost({{ $post->id }})" class="btn btn-sm btn-info custom-btn me-2">
                                                    تعديل
                                                </button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#deletepostModal" wire:click="deletePost({{ $post->id }})" class="btn btn-sm btn-danger">
                                                    حذف
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    