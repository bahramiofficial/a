@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش اسلایدر </h2>
        </div>
        <form class="form-horizontal" action="{{ route('slide.update',$slide->id) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title1" class="control-label">عنوان پست1 :</label>
                    <input type="text" class="form-control" name="title1" id="title1" placeholder="عنوان را وارد کنید"
                           value="{{$slide->title1}}">
                </div>
                <div class="col-sm-6">
                    <label for="title2" class="control-label">عنوان پست2 :</label>
                    <input type="text" class="form-control" name="title2" id="title2" placeholder="عنوان را وارد کنید"
                           value="{{$slide->title2}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title3" class="control-label">عنوان پست3 :</label>
                    <input type="text" class="form-control" name="title3" id="title3" placeholder="عنوان را وارد کنید"
                           value="{{$slide->title3}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="body" class="control-label">متن اسلایدر :</label>
                    <textarea rows="5" class="form-control" name="description" id="description" placeholder="متن اسلایدر را وارد کنید">{{ $slide->description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="images" class="control-label">تصویر اسلایدر</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر مقاله را وارد کنید">
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        @foreach( $slide->images['images'] as $key => $image)
                            <div class="col-sm-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $slide->images['thumb'] == $image ? 'checked' : '' }} />
                                    <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label"> کلمه سئو</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="کلمه سئو"
                           value="{{ $slide->meta_keywords }}">
                </div>

                <div class="col-sm-6">
                    <label for="meta_title" class="control-label"> عنوان سئو</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                           placeholder="عنوان سئو"
                           value="{{ $slide->meta_title }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label"> توضیحات سئو</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           placeholder="توضیحات سئو"
                           value="{{ $slide->meta_desc }}">
                </div>

                <div class="col-sm-6">
                    <label for="type" class="control-label">موقعیت توضیحات :</label>
                    <select name="type" id="type" class="form-control">
                        <option value="home" {{ $slide->type == 'home' ? 'selected' : '' }}>صفحه اصلی</option>
                        <option value="academy" {{ $slide->type == 'academy' ? 'selected' : '' }}>صفحه آکادمی</option>
                        <option value="cooperationrequest" {{ $slide->type == 'cooperationrequest' ? 'selected' : '' }}>صفحه درخواست همکاری</option>
                        <option value="article" {{ $slide->type == 'article' ? 'selected' : '' }}>صفحه وبلاگ</option>
                        <option value="radio" {{ $slide->type == 'radio' ? 'selected' : '' }}>صفحه رادیو</option>
                        <option value="book" {{ $slide->type == 'book' ? 'selected' : '' }}>صفحه کتابخانه</option>
                        <option value="question" {{ $slide->type == 'question' ? 'selected' : '' }}>صفحه سوالات متدوال</option>
                        <option value="ide" {{ $slide->type == 'ide' ? 'selected' : '' }}>صفحه پذیرش ایده</option>
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
