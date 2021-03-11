@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>اطلاعات شرکت</h2>
            <a href="{{ route('companyinfo.create') }}" class="btn btn-sm btn-primary">ایجاد اطلاعات شرکت</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th> نیرو</th>
                    <th>سال</th>
                    <th>مشتری</th>
                    <th>پروژه ها</th>
                    <th>پروژه ها تموم شده</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companyinfo as $companyinfos)
                    <tr>

                        <td>{{$companyinfos->humanresourse}}</td>
                        <td>{{$companyinfos->year}}</td>
                        <td>{{$companyinfos->customercompetition}}</td>
                        <td>{{$companyinfos->ongoingproject}}</td>
                        <td>{{$companyinfos->projectdone}}</td>
                        <td>
                            <form action="{{route('companyinfo.destroy',$companyinfos->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('companyinfo.edit',$companyinfos->id)}}"  class="btn btn-primary">ویرایش</a>
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
