@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد سرمایه های ما</h2>
        </div>
        <form class="form-horizontal" action="{{ route('ourresource.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="company" class="control-label"> اسم شرکت : </label>
                    <input type="text" class="form-control" name="company" id="company" placeholder="اسم شرکت را وارد کنید"
                           value="{{ old('company') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="link" class="control-label">لینک شرکت :</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="لینک را وارد کنید"
                           value="{{ old('link') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images" class="control-label">تصویر شرکت :</label>
                    <input type="file" class="form-control" name="images" id="images"
                           placeholder="تصویر شرکت را وارد کنید">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="lang" class="control-label"> زبان :</label>
                    <select name="lang" id="lang" class="form-control">
                        <option value="fa" selected>فارسی</option>
                        <option value="en">انگلیسی</option>
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
