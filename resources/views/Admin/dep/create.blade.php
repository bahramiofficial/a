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
            <h2>ایجاد دپارتمان </h2>
        </div>
        <form class="form-horizontal" action="{{ route('dep.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="parentfa" class="control-label"> هلدینگ :</label>
                    <select name="parentfa" id="parentfa" class="form-control">
                        @foreach($worksectionfa as $fa)
                            <option value="{{$fa->id}}" >{{$fa->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="parenten" class="control-label"> en :</label>
                    <select name="parenten" id="parenten" class="form-control">
                        @foreach($worksectionen as $en)
                            <option value="{{$en->id}}" >{{$en->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="control-label">عنوان :</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید"
                           value="{{ old('title') }}">
                </div>
                <div class="col-sm-6">
                    <label for="summary" class="control-label">خلاصه :</label>
                    <input type="text" class="form-control" name="summary" id="summary" placeholder="خلاصه را وارد کنید"
                           value="{{ old('summary') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images" class="control-label">تصویر :</label>
                    <input type="file" class="form-control" name="images" id="images"
                           placeholder="تصویر  را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <label for="subheadings" class="control-label">زیر عنوان :</label>
                    <input type="text" class="form-control" name="subheadings" id="subheadings"
                           placeholder="زیر عنوان را وارد کنید"
                           value="{{ old('subheadings') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="description" id="body"
                              placeholder="متن مقاله را وارد کنید">{{ old('description') }}</textarea>
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
                    <label for="meta_keywords" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="تگ سئو  را وارد کنید"
                           value="{{ old('meta_keywords') }}">
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








