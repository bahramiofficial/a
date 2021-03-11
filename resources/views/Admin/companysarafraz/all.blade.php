@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>شرکت ها</h2>
            <div class="btn-group">
                <a href="{{ route('companysarafraz.create') }}" class="btn btn-sm btn-primary">ایجاد شرکت</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>عنوان پست</th>
                    <th>لینک پست</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($company as $companys)
                    <tr>

                        <td>{{$companys->title}}</td>
                        <td>{{$companys->subheadings}}</td>
                        <td>
                            <form action="{{route('companysarafraz.destroy',$companys->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('companysarafraz.edit',$companys->id)}}"  class="btn btn-primary">ویرایش</a>
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
