@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>تنظیمات سایت</h2>
            <a href="{{ route('setting.create') }}" class="btn btn-sm btn-primary">تنظیمات</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>زبان</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($setting as $settings)

                    <tr>

                        <td>{{$settings->id}}</td>
                        <td>
                            @if($settings->lang  == 'fa')
                                <div>فارسی</div>
                            @else
                                <div>انگلیسی</div>
                            @endif
                        </td>
                        <td>
                            <form action="{{route('setting.destroy',$settings->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('setting.edit',$settings->id)}}"  class="btn btn-primary">ویرایش</a>
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
