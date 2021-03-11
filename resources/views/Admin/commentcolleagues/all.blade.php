@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>نظر همکاران </h2>
            <a href="{{ route('colleague.create') }}" class="btn btn-sm btn-primary">ثبت نظر همکاران</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>سمت</th>
                    <th>امتیاز</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colleague as $colleagues)
                    <tr>

                        <td>{{$colleagues->position}}</td>
                        <td>{{$colleagues->score}}</td>
                        <td>
                            <form action="{{route('colleague.destroy',$colleagues->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('colleague.edit',$colleagues->id)}}"  class="btn btn-primary">ویرایش</a>
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
