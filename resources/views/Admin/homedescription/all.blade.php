@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>توضیحات</h2>
            <a href="{{ route('homedescription.create') }}" class="btn btn-sm btn-primary">ایجاد توضیحات</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>توضیح کوتاه</th>
                    <th> نوع </th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($description as $descriptions)
                    <tr>

                        <td>{{$descriptions->title}}</td>
                        <td>{{$descriptions->summary}}</td>
                        <td>
                            @if($descriptions->type == 'top')
                                <b>بالا</b>
                            @else
                                <b>پایین</b>
                            @endif
                        </td>

                        <td>
                            <form action="{{route('homedescription.destroy',$descriptions->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('homedescription.edit',$descriptions->id)}}"  class="btn btn-primary">ویرایش</a>
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
