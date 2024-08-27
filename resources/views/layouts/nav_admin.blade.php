<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">متجر إلكتروني</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center">
        @can('الرئيسية')
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">الرئيسية</a>
            </li>
        @endcan
        @can('القسم')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('section.index') }}">اقسام </a>
            </li>
        @endcan
        @can('الفريق')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('team_index') }}">الفريق</a>
            </li>
        @endcan
        @can('اراء العملاء')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('message_index') }}">اراء العملاء</a>
            </li>
        @endcan
        @can('اراء العملاء')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('comment_show') }}">مشاكل العملاء</a>
            </li>
        @endcan
        @can('وقت الاشتراك')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('subscription') }}">الاشتراكات</a>
            </li>
        @endcan
        @can('الصور')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('photo.index') }}">صور</a>
            </li>
        @endcan
        @can('مواعيد الالعاب')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('time.index') }}">مواعيد الالعاب</a>
            </li>
        @endcan
        @can('الاوردرات')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('show_order') }}">الاوردرات</a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show_user') }}">المستخدمين</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show_post') }}">المنشورات</a>
        </li>
        @can('صلاحيات المستخدمين')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('roles.index') }}">الصلاحيات</a>
            </li>
        @endcan
        @can('المطورون')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">المطورون</a>
            </li>
        @endcan
    </ul>
</div>

        <form method="POST" action="/logout" class="d-flex">
            @csrf
            <button class="btn btn-outline-light" type="submit">تسجيل الخروج</button>
        </form>
    </div>
</nav>
