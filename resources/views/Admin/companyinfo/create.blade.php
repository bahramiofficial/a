@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>اطلاعات شرکت</h2>
        </div>
        <form class="form-horizontal" action="{{ route('companyinfo.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="humanresourse" class="control-label">نیروی انسانی:</label>
                    <input type="text" class="form-control" name="humanresourse" id="humanresourse" placeholder=" تعداد نیروی انسانی را وارد کنید "
                           value="{{ old('humanresourse') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="year" class="control-label">سال:</label>
                    <input type="text" class="form-control" name="year" id="year" placeholder=" تعداد سال را وارد کنید "
                           value="{{ old('year') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="customercompetition" class="control-label">رضایت مشتری:</label>
                    <input type="text" class="form-control" name="customercompetition" id="customercompetition" placeholder=" درصد رضایت مشتری را وارد کنید "
                           value="{{ old('customercompetition') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="ongoingproject" class="control-label"> پروژه در دست اجرا:</label>
                    <input type="text" class="form-control" name="ongoingproject" id="ongoingproject" placeholder=" تعداد پروژه در دست اجرا را وارد کنید "
                           value="{{ old('ongoingproject') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="projectdone" class="control-label"> پروژه انجام شده:</label>
                    <input type="text" class="form-control" name="projectdone" id="projectdone" placeholder=" تعداد پروژه انجام شده را وارد کنید "
                           value="{{ old('projectdone') }}">
                </div>
            </div>

            <div class="col-sm-6">
                <label for="lang" class="control-label"> زبان  :</label>
                <select name="lang" id="lang" class="form-control">
                    <option value="fa" selected>فارسی</option>
                    <option value="en">انگلیسی</option>
                </select>
            </div>




            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>
@endsection
