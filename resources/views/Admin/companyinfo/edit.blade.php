@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد پست اینستا</h2>
        </div>

        <form class="form-horizontal" action="{{ route('companyinfo.update',$companyinfo->id)}}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            {{ method_field('PATCH') }}
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="humanresourse" class="control-label">نیروی انسانی:</label>
                    <input type="text" class="form-control" name="humanresourse" id="humanresourse" placeholder=" تعداد نیروی انسانی را وارد کنید "
                           value="{{$companyinfo->humanresourse}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="year" class="control-label">سال:</label>
                    <input type="text" class="form-control" name="year" id="year" placeholder=" تعداد سال را وارد کنید "
                           value="{{$companyinfo->year}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="customercompetition" class="control-label">رضایت مشتری:</label>
                    <input type="text" class="form-control" name="customercompetition" id="customercompetition" placeholder=" درصد رضایت مشتری را وارد کنید "
                           value="{{$companyinfo->customercompetition}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="ongoingproject" class="control-label"> پروژه در دست اجرا:</label>
                    <input type="text" class="form-control" name="ongoingproject" id="ongoingproject" placeholder=" تعداد پروژه در دست اجرا را وارد کنید "
                           value="{{$companyinfo->ongoingproject}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="projectdone" class="control-label"> پروژه انجام شده:</label>
                    <input type="text" class="form-control" name="projectdone" id="projectdone" placeholder=" تعداد پروژه انجام شده را وارد کنید "
                           value="{{$companyinfo->projectdone}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="lang" class="control-label">زبان مقاله</label>
                    <select name="lang" id="lang" class="form-control">
                        <option value="fa" {{ $companyinfo->lang == 'fa' ? 'selected' : '' }}>فارسی</option>
                        <option value="en" {{ $companyinfo->lang == 'en' ? 'selected' : '' }}>انگلیسی</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>
@endsection
