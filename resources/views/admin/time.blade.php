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
                            @can('اضافة معاد')
                                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                    data-toggle="modal" href="#exampleModal">اضافة معاد جديد</a>
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
                                        <th class="border-bottom-0">القسم</th>
                                        <th class="border-bottom-0">اليوم</th>
                                        <th class="border-bottom-0">الوقت</th>
                                        <th class="border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($times as $time)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $time->section->name }}</td>
                                            <td>{{ $time->day->day }}</td>
                                            <td>{{ $time->time }}</td>
                                            <td>
                                                @can('تعديل معاد')
                                                    <a class="modal-effect btn btn-sm btn-info custom-btn"
                                                        data-effect="effect-scale" data-id="{{ $time->id }}"
                                                        data-section_id="{{ $time->section->id }}" data-day_id="{{ $time->day->id }}" data-time="{{ $time->time }}" data-toggle="modal"
                                                        href="#exampleModal2" title="تعديل">تعديل
                                                        <i class="las la-pen"></i>
                                                    </a>
                                                @endcan

                                                @can('حذف معاد')
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{ $time->id }}"
                                                        data-section_id="{{ $time->section->id }}" data-day_id="{{ $time->day->id }}" data-time="{{ $time->time }}"
                                                        data-toggle="modal" href="#modaldemo9" title="حذف">حذف<i
                                                            class="las la-trash"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($times->hasPages())
                            <ul class="pagination justify-content-center">
                                <!-- زر الصفحة السابقة -->
                                @if ($times->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">السابق</span></li>
                                @else
                                    <li class="page-item"><a href="{{ $times->previousPageUrl() }}" class="page-link" rel="prev">السابق</a></li>
                                @endif
                        
                                <!-- أرقام الصفحات -->
                                @foreach(range(1, $times->lastPage()) as $page)
                                    <li class="page-item {{ $page == $times->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $times->url($page) }}" class="page-link">{{ $page }}</a>
                                    </li>
                                @endforeach
                        
                                <!-- زر الصفحة التالية -->
                                @if ($times->hasMorePages())
                                    <li class="page-item"><a href="{{ $times->nextPageUrl() }}" class="page-link" rel="next">التالي</a></li>
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
                    <form action="{{ route('time.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="name">المدة</label>
                              <select name="section_id" id="section_id" class="form-control" required>
                                  <option value="" selected disabled> -حدد القسم-</option>
                                  @foreach ($sections as $section)
                                      <option value="{{ $section->id }}">{{ $section->name }}</option>
                                  @endforeach
                              </select>
                              <label for="name">اليوم</label>
                              <select name="day_id" id="day_id" class="form-control" required>
                                  <option value="" selected disabled> -حدد القسم-</option>
                                  @foreach ($days as $day)
                                      <option value="{{ $day->id }}">{{ $day->day }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="price">الوقت</label>
                                <select name="time" id="time" class="form-control" required>
                                    <option value="" selected disabled> -حدد الوقت-</option>
                                    <option value="06:00:00">6:00am</option>
                                    <option value="08:00:00">8:00am</option>
                                    <option value="10:00:00">10:00am</option>
                                    <option value="12:00:00">12:00pm</option>
                                    <option value="14:00:00">2:00pm</option>
                                    <option value="16:00:00">4:00pm</option>
                                    <option value="18:00:00">6:00pm</option>
                                    <option value="20:00:00">8:00pm</option>
                                    <option value="22:00:00">10:00pm</option>
                                    <option value="00:00:00">12:00am</option>
                                </select>
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
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('time.update', $i) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                      @method('PATCH')
                      @csrf
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id">
                          <label for="section_id">المدة</label>
                          <select name="section_id" id="section_id" class="form-control" required>
                              <option value="" selected disabled> -حدد القسم-</option>
                              @foreach ($sections as $section)
                                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="day_id">اليوم</label>
                          <select name="day_id" id="day_id" class="form-control" required>
                              <option value="" selected disabled> -حدد اليوم-</option>
                              @foreach ($days as $day)
                                  <option value="{{ $day->id }}">{{ $day->day }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="time">الوقت</label>
                          <select name="time" id="time" class="form-control" required>
                            <option value="" selected disabled> -حدد الوقت-</option>
                            <option value="06:00:00">6:00am</option>
                            <option value="08:00:00">8:00am</option>
                            <option value="10:00:00">10:00am</option>
                            <option value="12:00:00">12:00pm</option>
                            <option value="14:00:00">2:00pm</option>
                            <option value="16:00:00">4:00pm</option>
                            <option value="18:00:00">6:00pm</option>
                            <option value="20:00:00">8:00pm</option>
                            <option value="22:00:00">10:00pm</option>
                            <option value="00:00:00">12:00am</option>
                        </select>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">تأكيد</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  


    <!-- delete -->
<div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف المعاد</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('time.destroy', $i) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                    <input type="hidden" name="id" id="id" value="">
                    <label>اسم القسم</label>
                    <select name="section_id" id="section_id" class="form-control" required>
                      @foreach ($sections as $section)
                          <option value="{{ $section->id }}" selected disabled>{{ $section->name }}</option>
                      @endforeach
                  </select>
                    <label>اليوم</label>
                    <select name="day_id" id="day_id" class="form-control" required>
                      @foreach ($days as $day)
                          <option value="{{ $day->id }}" selected disabled>{{ $day->day }}</option>
                      @endforeach
                  </select>
                    <label>الساعة</label>
                    <input class="form-control" name="time" id="time" type="text" vlaue=""
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
            // الحصول على الزر الذي أطلق الحدث
            var button = $(event.relatedTarget);
            // استخراج المعلومات من سمات البيانات
            var id = button.data('id');
            var section_id = button.data('section_id');
            var day_id = button.data('day_id');
            var time = button.data('time');
            
            // تحديث محتوى الحقول في النموذج داخل الـ modal
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_id').val(section_id);
            modal.find('.modal-body #day_id').val(day_id);
            modal.find('.modal-body #time').val(time);
        });
    });

    $(document).ready(function() {
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var section_id = button.data('section_id');
            var day_id = button.data('day_id');
            var time = button.data('time');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_id').val(section_id);
            modal.find('.modal-body #day_id').val(day_id);
            modal.find('.modal-body #time').val(time);
        });
    });
</script>
@endsection
