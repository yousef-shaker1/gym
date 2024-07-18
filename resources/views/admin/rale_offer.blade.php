@extends('layouts.master_admin')
@section('css')
@endsection

@section('title')
    الاسعار
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

    @if ($errors->any())
        <div class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </div>
    @endif

            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            @can('اضافة سعر')
                                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                    data-toggle="modal" href="#exampleModal">اضافة سعر جديد ل ( {{ $section->name }}ة )</a>
                            @endcan
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                        </div>
                        <div class="table-responsive">
                            <table id="example1" class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">قسم</th>
                                        <th class="border-bottom-0">المدة</th>
                                        <th class="border-bottom-0">السعر</th>
                                        <th class="border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($rale_offers as $rale_offer)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $rale_offer->section->name }}</td>
                                            <td>{{ $rale_offer->offer->subscription }}</td>
                                            <td>{{ $rale_offer->price }} $</td>
                                            <td>
                                                @can('تعديل سعر')
                                                    <a class="modal-effect btn btn-sm btn-info custom-btn"
                                                        data-effect="effect-scale" data-id="{{ $rale_offer->id }}"
                                                        data-offer_id="{{ $rale_offer->offer->id }}" data-price="{{ $rale_offer->price }}" data-toggle="modal"
                                                        href="#exampleModal2" title="تعديل">تعديل
                                                        <i class="las la-pen"></i>
                                                    </a>
                                                @endcan

                                                @can('حذف سعر')
                                                     <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{ $rale_offer->id }}" data-name="{{ $rale_offer->offer->subscription }}"
                                                        data-toggle="modal" href="#modaldemo9" title="حذف">حذف<i
                                                            class="las la-trash"></i></a> 
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
    </div>


        <!-- add -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة قسم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('rale_offer.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                          <div class="form-group">
                              <div class="form-group">
                                <input type="hidden" class="form-control" id="section_id" name="section_id" value='{{ $section->id }}' readonly>
                              </div>
                              <label for="name">المدة</label>
                              <select name="subscription_id" id="subscription_id" class="form-control" required>
                                  <option value="" selected disabled> -حدد المدة-</option>
                                  @foreach ($offers as $offer)
                                      <option value="{{ $offer->id }}">{{ $offer->subscription }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="price">السعر</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>

        <!-- End Basic modal -->
    <!-- edit -->
     <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل السعر</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rale_offer.update', $i) }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                              <input type="hidden" class="form-control" id="id" name="id" value="">
                              <div class="form-group">
                                <label for="name">المدة</label>
                                <select name="offer_id" id="offer_id" class="form-control" required>
                                    <option value="" selected disabled> -حدد القسم-</option>
                                    @foreach ($offers as $offer)
                                        <option value="{{ $offer->id }}">{{ $offer->subscription }}</option>
                                    @endforeach
                                </select>
                            </div>
                              <div class="form-group">
                                <label for="price">السعر</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
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
            <form action="{{ route('rale_offer.destroy', $i) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <h5>هل انت متاكد من عملية الحذف ؟</h5><br>
                    <input type="hidden" name="id" id="id" value="">
                    <input class="form-control" name="name" id="name" type="text" vlaue=""
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
    document.addEventListener('DOMContentLoaded', function() {
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var offer_id = button.data('offer_id');
            var price = button.data('price');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #offer_id').val(offer_id);
            modal.find('.modal-body #price').val(price);
            
        });
    });

    $(document).ready(function() {
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        });
    });
</script>
@endsection
