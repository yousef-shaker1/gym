@extends('layouts.master_admin')
@section('css')
@endsection

@section('title')
    المواعيد
@endsection

@section('content')
    <div class="row">

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show custom-alert w-100" role="alert">
                <strong>{{ session()->get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
                                    <th class="border-bottom-0">بداية الاشتراك</th>
                                    <th class="border-bottom-0">نهاية الاشتراك</th>
                                    <th class="border-bottom-0">مدة الاشتراك</th>
                                    <th class="border-bottom-0">القسم التابع للاوردر</th>
                                    <th class="border-bottom-0">السعر المدفوع</th>
                                    <th class="border-bottom-0">حالة الاوردر</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($orders as $order)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->customer->email }}</td>
                                        <td>{{ $order->customer->phone }}</td>
                                        <td>{{ $order->day }}</td>
                                        @if ($order->rale_offer->offer->subscription === '1 month')
                                            <td>{{ \Carbon\Carbon::parse($order->day)->addDays(30)->format('Y-m-d') }}</td>
                                        @elseif($order->rale_offer->offer->subscription === '3 month')
                                            <td>{{ \Carbon\Carbon::parse($order->day)->addDays(90)->format('Y-m-d') }}</td>
                                        @elseif($order->rale_offer->offer->subscription === '6 month')
                                            <td>{{ \Carbon\Carbon::parse($order->day)->addDays(180)->format('Y-m-d') }}</td>
                                        @elseif($order->rale_offer->offer->subscription === '1 year')
                                            <td>{{ \Carbon\Carbon::parse($order->day)->addDays(365)->format('Y-m-d') }}
                                            </td>
                                        @endif
                                        <td>{{ $order->rale_offer->offer->subscription }}</td>
                                        <td>{{ $order->rale_offer->section->name }}</td>
                                        <td>{{ $order->rale_offer->price }} $</td>
                                        <td style="width: 100px; padding: 17px; text-align: center; vertical-align: middle;" class="text-white 
                                            @if ($order->status == 'يتم مراجعة الطلب') bg-secondary 
                                            @elseif($order->status == 'قبول') bg-primary 
                                            @elseif($order->status == 'رفض') bg-dark 
                                            @endif">
                                            {{ $order->status }}
                                        </td>
                                        <td>
                                            @can('قبول الاوردر')
                                                <a href="{{ route('accept_order', $order->id) }}" class="btn btn-primary btn-sm mb-1">قبول</a>
                                            @endcan
                                            @can('رفض الاوردر')
                                                <a href="{{ route('reject_order', $order->id) }}" class="btn btn-dark btn-sm mb-1">رفض</a>
                                            @endcan
                                            @can('حذف الاوردر')
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $order->id }}" data-customer="{{ $order->customer->name }}"
                                                data-section="{{ $order->rale_offer->section->name }}" data-toggle="modal"
                                                href="#modaldemo9" title="حذف">حذف<i class="las la-trash"></i></a>
                                            @endcan
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($orders->hasPages())
                        <ul class="pagination justify-content-center">
                            <!-- زر الصفحة السابقة -->
                            @if ($orders->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">السابق</span></li>
                            @else
                                <li class="page-item"><a href="{{ $orders->previousPageUrl() }}" class="page-link" rel="prev">السابق</a></li>
                            @endif
                    
                            <!-- أرقام الصفحات -->
                            @foreach(range(1, $orders->lastPage()) as $page)
                                <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $orders->url($page) }}" class="page-link">{{ $page }}</a>
                                </li>
                            @endforeach
                    
                            <!-- زر الصفحة التالية -->
                            @if ($orders->hasMorePages())
                                <li class="page-item"><a href="{{ $orders->nextPageUrl() }}" class="page-link" rel="next">التالي</a></li>
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
                    <h6 class="modal-title">حذف المعاد</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_order', $i) }}" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>هل أنت متأكد من عملية الحذف؟</p>
                        <input type="hidden" name="id" id="id" value="">
                        <label>اسم العميل</label>
                        <input class="form-control" name="customer" id="customer" type="text" value="" readonly>
                        <br>
                        <label>الساعة</label>
                        <input class="form-control" name="section" id="section" type="text" value="" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تأكيد</button>
                    </div>
                </form>
            </div>
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
                var customer = button.data('customer');
                var section = button.data('section');

                var modal = $(this);
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #customer').val(customer);
                modal.find('.modal-body #section').val(section);

            });
        });
    </script>
@endsection
