@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>پرسش و پاسخ دوره ها</h2>
            <a href="{{ route('questionanswer.create') }}" class="btn btn-sm btn-primary">ایجاد پرسش و پاسخ دوره ها</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th># </th>
                    <th> دوره مرتبط</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questionanswer as $questionanswerS)
                    <tr>

                        <td>{{$questionanswerS->id}}</td>
                        <td>{{$questionanswerS->course_id}}</td>
                        <td>
                            <form action="{{route('questionanswer.destroy',$questionanswerS->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('questionanswer.edit',$questionanswerS->id)}}"  class="btn btn-primary">ویرایش</a>
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
