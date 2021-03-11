@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>دفتر ها</h2>
            <a href="{{ route('office.create') }}" class="btn btn-sm btn-primary">ایجاد دفتر</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>کشور</th>
                    <th>تلفن</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($office as $offices)
                    <tr>

                        <td>{{$offices->country}}</td>
                        <td>{{$offices->Phone}}</td>
                        <td>
                            <form action="{{route('office.destroy',$offices->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('office.edit',$offices->id)}}"  class="btn btn-primary">ویرایش</a>
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
