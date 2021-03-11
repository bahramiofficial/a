@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: '/admin/panel/upload-image',
            filebrowserImageUploadUrl: '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاداسلایدر</h2>
        </div>
        <form class="form-horizontal" action="{{ route('slide.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title1" class="control-label">عنوان1 پست :</label>
                    <input type="text" class="form-control" name="title1" id="title1" placeholder="عنوان را وارد کنید">

                </div>
                <div class="col-sm-6">
                    <label for="title2" class="control-label">عنوان2 پست :</label>
                    <input type="text" class="form-control" name="title2" id="title2" placeholder="عنوان را وارد کنید">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title3" class="control-label">عنوان3 پست :</label>
                    <input type="text" class="form-control" name="title3" id="title3" placeholder="عنوان را وارد کنید">

                </div>
                <div class="col-sm-6">
                    <label for="images" class="control-label">تصویر اسلایدر :</label>
                    <input type="file" class="form-control" name="images" id="images"
                           placeholder="تصویر اسلایدر را وارد کنید">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">متن اسلایدر :</label>
                    <textarea rows="5" class="form-control" name="description" id="description"
                              placeholder="متن اسلایدر را وارد کنید"></textarea>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label"> کلمه سئو</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="کلمه سئو"
                           value="{{ old('meta_keywords') }}">
                </div>

                <div class="col-sm-6">
                    <label for="meta_title" class="control-label"> عنوان سئو</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                           placeholder="عنوان سئو"
                           value="{{ old('meta_title') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label"> توضیحات سئو</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           placeholder="توضیحات سئو"
                           value="{{ old('meta_desc') }}">
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
            <div class="col-sm-6">
                <label for="type" class="control-label"> موقعیت اسلایدر  :</label>
                <select name="type" id="type" class="form-control">
                    <option value="home" selected>صفحه اصلی </option>
                    <option value="academy">صفحه آکادمی</option>
                    <option value="cooperationrequest">صفحه درخواست همکاری</option>
                    <option value="article">صفحه وبلاگ</option>
                    <option value="radio">صفحه رادیو</option>
                    <option value="book">صفحه کتابخانه</option>
                    <option value="question">صفحه سوالات متدوال</option>
                    <option value="ide">صفحه پذیرش ایده</option>
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
