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
            <h2>توضیحات</h2>
        </div>
        <form class="form-horizontal" action="{{ route('homedescription.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="control-label">عنوان:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید">

                </div>
                <div class="col-sm-6">
                    <label for="link" class="control-label">لینک:</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="لینک را وارد کنید">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">متن توضیحات :</label>
                    <textarea rows="5" class="form-control" name="description" id="description"
                              placeholder="متن توضیحات را وارد کنید"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="summary" class="control-label">توضیحات کوتاه :</label>
                    <input type="text" class="form-control" name="summary" id="summary"
                           placeholder="توضیحات کوتاه را وارد کنید">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images1" class="control-label">تصویر یک :</label>
                    <input type="file" class="form-control" name="images1" id="images1"
                           placeholder="تصویر یک  را وارد کنید">
                </div>

                <div class="col-sm-6">
                    <label for="images2" class="control-label">تصویر دو :</label>
                    <input type="file" class="form-control" name="images2" id="images2"
                           placeholder="تصویر دو  را وارد کنید">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images3" class="control-label">تصویر سه :</label>
                    <input type="file" class="form-control" name="images3" id="images3"
                           placeholder="تصویر سه را وارد کنید">
                </div>

                <div class="col-sm-6">
                    <label for="type" class="control-label"> موقعیت توضیحات :</label>
                    <select name="type" id="type" class="form-control">
                        <option value="top" selected>بالا</option>
                        <option value="down">پایین</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label">توضیحات سئو :</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           placeholder="توضیحات سئو را وارد کنید">

                </div>
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label">عنوان سئو :</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                           placeholder="عنوان سئو را وارد کنید">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label">کلمه کلیدی :</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="عنوان را وارد کنید">

                </div>

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
