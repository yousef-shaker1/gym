@extends('layouts.master_admin')
@section('css')
@endsection

@section('title')
    المستخدمين
@endsection

@section('content')
    

<div class="row">


    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show custom-alert w-100" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="col-md-6">
                        </div>
                        <div class="table-responsive">
                            <table id="example1" class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">اسم العميل</th>
                                        <th class="border-bottom-0">ايميل العميل</th>
                                        <th class="border-bottom-0">تليفون العميل</th>
                                        <th class="border-bottom-0">عمر العميل</th>
                                        <th class="border-bottom-0">عدد الاشتراكات اللي عملها العميل</th>
                                        <th class="border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($customers as $customer)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->age }}</td>
                                            <td>{{ \App\Models\Order::where('customer_id', $customer->id)->count() }}</td>
                                            <td>
                                                {{-- @can('حذف وقت') --}}
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{ $customer->id }}" data-name="{{ $customer->name }}" data-email="{{ $customer->email }}"
                                                        data-toggle="modal" href="#modaldemo9" title="حذف">حذف<i
                                                            class="las la-trash"></i></a>
                                                {{-- @endcan --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($customers->hasPages())
                            <ul class="pagination justify-content-center">
                                <!-- زر الصفحة السابقة -->
                                @if ($customers->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">السابق</span></li>
                                @else
                                    <li class="page-item"><a href="{{ $customers->previousPageUrl() }}" class="page-link" rel="prev">السابق</a></li>
                                @endif
                        
                                <!-- أرقام الصفحات -->
                                @foreach(range(1, $customers->lastPage()) as $page)
                                    <li class="page-item {{ $page == $customers->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $customers->url($page) }}" class="page-link">{{ $page }}</a>
                                    </li>
                                @endforeach
                        
                                <!-- زر الصفحة التالية -->
                                @if ($customers->hasMorePages())
                                    <li class="page-item"><a href="{{ $customers->nextPageUrl() }}" class="page-link" rel="next">التالي</a></li>
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
    </div>


    <!-- delete -->
<div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف المنتج</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('delete_customer', $i) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                    <input type="hidden" name="id" id="id" value="">
                    <label>الاسم</label>
                    <input class="form-control" name="name" id="name" type="text" vlaue=""
                    readonly>
                    <label>الايميل</label>
                    <input class="form-control" name="email" id="email" type="text" vlaue=""
                        readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
        </div>
        </form>
    </div>
</div> 



    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>


@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
        });
    });
</script>
@endsection
