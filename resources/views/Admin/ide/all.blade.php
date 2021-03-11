@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>پذیرش ایده</h2>
{{--            <a href="{{ route('accept') }}" class="btn btn-sm btn-primary">درخواست های قبول شده</a>--}}

        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>زمینه فعالیت</th>
                    <th> نام و نام خانوادگی</th>
                    <th>شماره تماس</th>
{{--                    <th>تنظیمات</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($ide as $ides)
                    <tr>

                        <td>{{ $ides->category }}</td>
                        <td>{{ $ides->name.$ides->family }}</td>
                        <td>{{ $ides->mobile }}</td>
{{--                        <td>--}}
{{--                            <form action="{{route('recruitment.destroy',$recruitments->id)}}" method="post">--}}
{{--                                {{ method_field('delete') }}--}}
{{--                                {{ csrf_field() }}--}}
{{--                                <div class="btn-group btn-group-xs">--}}


{{--                                    <button type="submit" class="btn btn-danger">رد درخواست</button>--}}

{{--                                    <form action="{{route('recruitment.update',$recruitments->id)}}" method="post">--}}
{{--                                        {{ method_field('put') }}--}}
{{--                                        {{ csrf_field() }}--}}
{{--                                        <div class="btn-group btn-group-xs">--}}
{{--                                            <button type="submit" class="btn btn-primary">قبول درخواست</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}



{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
