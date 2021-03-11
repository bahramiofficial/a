@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>رادیو ها</h2>
           <div class="btn-group">
               <a href="{{ route('radio.create') }}" class="btn btn-sm btn-primary">ایجاد رادیو جدید</a>
               <a href="{{ route('radio.index') }}" class="btn btn-sm btn-danger">بخش رادیو ها</a>
           </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>عنوان رادیو</th>
                    <th>تعداد نظرات</th>
                    <th>مقدار بازدید</th>
                    <th>تعد شرکت کننده ها</th>
                    <th>وضعیت دوره</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($radio as $radios)
                    <tr>
                        <td><a href="{{ $radios->path() }}">{{ $radios->title }}</a></td>
                        <td>{{ $radios->commentCount }}</td>
                        <td>{{ $radios->viewCount }}</td>
{{--                        todo add bkldsmfksvxmcvdfkgdkfvdmvkdfvksdm,md--}}
                        <td>{{ $radios->viewCount }}</td>
                        <td>{{ $radios->viewCount }}</td>
                        <td>
                            <form action="{{ route('radio.destroy'  ,  $radios->id) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('radio.edit' ,$radios->id) }}"  class="btn btn-primary">ویرایش</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
