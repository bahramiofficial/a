@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>سرمایه های ما</h2>
            <a href="{{ route('ourresource.create') }}" class="btn btn-sm btn-primary">ایجاد سرمایه های ما</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>شرکت</th>
                    <th>لینک شرکت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ourresource as $ourresources)
                    <tr>

                        <td>{{$ourresources->company}}</td>
                        <td><a href="{{$ourresources->link}}">{{$ourresources->link}}</a></td>
                        <td>
                            <form action="{{route('ourresource.destroy',$ourresources->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('ourresource.edit',$ourresources->id)}}"  class="btn btn-primary">ویرایش</a>
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
