@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>اسلایدر</h2>
            <a href="{{ route('slide.create') }}" class="btn btn-sm btn-primary">ایجاد اسلایدر</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>تیتر</th>
                    <th>عنوان</th>
                    <th>موقعیت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slide as $slides)
                    <tr>

                        <td>{{$slides->title1}}</td>
                        <td>{{$slides->title2}}</td>
                        <td>
                            @if($slides->type == 'home')
                                <div>صفحه اصلی </div>
                            @elseif($slides->type == 'academy')
                                <div>صفحه آکادمی</div>
                            @elseif($slides->type == 'cooperationrequest')
                                <div>صفحه درخواست همکاری</div>
                            @elseif($slides->type == 'article')
                                <div>صفحه وبلاگ</div>
                            @elseif($slides->type == 'radio')
                                <div>صفحه رادیو</div>
                            @elseif($slides->type == 'book')
                                <div>صفحه کتابخانه</div>
                            @elseif($slides->type == 'question')
                                <div>صفحه سوالات متدوال</div>
                            @else
                                <div>صفحه پذیرش ایده</div>
                            @endif


                        </td>
                        <td>
                            <form action="{{route('slide.destroy',$slides->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('slide.edit',$slides->id)}}"  class="btn btn-primary">ویرایش</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">

        </div>
    </div>
@endsection
