@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>کتاب ها</h2>
            <div class="btn-group">
                <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary">ایجاد کتاب جدید</a>
                <a href="{{ route('books.index') }}" class="btn btn-sm btn-danger">بخش کتاب ها</a>
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
                @foreach($books as $book)
                    <tr>
                        <td><a href="{{ $book->path() }}">{{ $book->title }}</a></td>
                        <td>{{ $book->commentCount }}</td>
                        <td>{{ $book->viewCount }}</td>
                        <td>1</td>
                        <td>
                            @if($book->type == 'free')
                                رایگان
                            @elseif($book->type == 'vip')
                                ویژه
                            @else
                                نقدی
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('books.destroy'  ,  $book->id) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('books.edit' ,$book->id) }}" class="btn btn-primary">ویرایش</a>
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
            {!! $books->render() !!}
        </div>
    </div>
@endsection
