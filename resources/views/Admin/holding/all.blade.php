@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>هلدینگ </h2>
            <div class="btn-group">
                <a href="{{ route('holding.create') }}" class="btn btn-sm btn-primary">ایجاد فرا گروه</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>عنوان </th>
                    <th>زیر عنوان</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($holding as $holdings)
                    <tr>

                        <td>{{$holdings->title}}</td>
                        <td>{{$holdings->subheadings}}</td>
                        <td>
                            <form action="{{route('holding.destroy',$holdings->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('holding.edit',$holdings->id)}}"  class="btn btn-primary">ویرایش</a>
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
