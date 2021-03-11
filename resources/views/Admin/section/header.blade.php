<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">سرافراز</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <div class="navbar-left">
                <p style="margin: 15px" class="btn btn-sm btn-warning"> نام کاربر :{{ Auth::user()->name }}</p>
            </div>
            <div class="navbar-left">
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-sm btn-warning" style="margin: 15px"> خروج از پنل کاربری</button>
                </form>
            </div>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="/admin/panel">پنل اصلی</a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="/admin/articles">وبلاگ</a></li>
                <li><a href="{{route('categories.index')}}">دسته بندی مقالات </a></li>
            </ul>


            <ul class="nav nav-sidebar">
                <li><a href="/admin/courses">دوره آموزشی</a></li>
                <li><a href="/admin/radio">رادیو</a></li>
                <li><a href="/admin/books">کتاب</a></li>
                <li><a href="/admin/podcast">پادکست</a></li>
                <li><a href="{{route('questionanswer.index')}}">پرسش و پاسخ دوره</a></li>

            </ul>


            <ul class="nav nav-sidebar">
                <li><a href="{{route('slide.index')}}">اسلایدر</a></li>
                <li><a href="{{route('companyinfo.index')}}">درباره شرکت</a></li>
                <li><a href="{{route('homedescription.index')}}">توضیحات</a></li>
                <li><a href="{{route('holding.index')}}">هلدینگ سرافراز</a></li>
                <li><a href="{{route('companysarafraz.index')}}">شرکت</a></li>
                <li><a href="{{route('dep.index')}}">دپارتمان</a></li>
                <li><a href="{{route('ourresource.index')}}">سرمایه های ما</a></li>
                <li><a href="{{route('instagram.index')}}">اینستاگرام</a></li>
                <li><a href="{{route('colleague.index')}}">کامنت همکارن</a></li>
                <li><a href="{{route('office.index')}}">دفتر های ما</a></li>
                <li><a href="{{route('setting.index')}}">تنضیمات سایت</a></li>

            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="{{route('recruitment.index')}}">درخواست همکاری</a></li>
                <li><a href="{{route('ide.index')}}">پذیرش ایده</a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="/admin/comments"> همه نظرات<span class="badge"></span></a></li>
                <li><a href="/admin/comments/unsuccessful"> نظرات تایید نشده<span class="badge"></span></a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="/admin/users">کاربران <span class="badge">0</span></a></li>
                <li><a href="/admin/payments">پرداختی های موفق <span class="badge"> </span></a></li>
                <li><a href="/admin/payments/unsuccessful">پرداختی های ناموفق <span class="badge"></span></a></li>
            </ul>


            <ul class="nav nav-sidebar">
                {{--                                @can('show-comment')--}}
                {{--                                    <li><a href="">همه نظرات</a></li>--}}
                {{--                                    <li><a href="">نظرات تایید نشده <span class="badge">0</span></a></li>--}}
                {{--                                @endcan--}}
                {{--                <li><a href="">Another nav item</a></li>--}}
            </ul>
        </div>
    </div>
</div>


