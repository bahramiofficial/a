@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد پست اینستا</h2>
        </div>
        <form class="form-horizontal" action="{{ route('instagram.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="control-label">عنوان پست :</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید"
                           value="{{ old('title') }}">
                </div>
                <div class="col-sm-6">
                    <label for="link" class="control-label">لینک پست :</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="لینک را وارد کنید"
                           value="{{ old('link') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images" class="control-label">تصویر پست :</label>
                    <input type="file" class="form-control" name="images" id="images"
                           placeholder="تصویر پست را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="تگ ها را وارد کنید"
                           value="{{ old('meta_keywords') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label"> توضیحات سئو :</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           placeholder="توضیحات سئو را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                           placeholder="عنوان سئو  را وارد کنید"
                           value="{{ old('meta_keywords') }}">
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
