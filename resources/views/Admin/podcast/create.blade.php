@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: '/admin/panel/upload-image',
            filebrowserImageUploadUrl: '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد پادکست</h2>
        </div>
        <form class="form-horizontal" action="{{ route('podcast.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="control-label">عنوان پادکست</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید"
                           value="{{ old('title') }}">
                </div>
                <div class="col-sm-6">
                    <label for="voice" class="control-label"> صدا :</label>
                    <input type="text" class="form-control" name="voice" id="voice"
                           placeholder="voice"
                           value="{{ old('voice') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="linkb" class="control-label"> لینک بیلورد :</label>
                    <input type="text" class="form-control" name="linkb" id="linkb"
                           placeholder="لینک بیلبورد"
                           value="{{ old('linkb') }}">
                </div>

                <div class="col-sm-6">
                    <label for="review" class="control-label">نظرکارشناس</label>
                    <input type="text" class="form-control" name="review" id="writer"
                           placeholder="نظر در باره ..."
                           value="{{ old('review') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="speaker" class="control-label">گوینده</label>
                    <input type="text" class="form-control" name="speaker" id="speaker"
                           placeholder="توضیحات کوتاه را وارد کنید"
                           value="{{ old('speaker') }}">
                </div>

                <div class="col-sm-6">
                    <label for="writer" class="control-label">نویسنده</label>
                    <input type="text" class="form-control" name="writer" id="writer"
                           placeholder="توضیحات کوتاه را وارد کنید"
                           value="{{ old('writer') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="summery" class="control-label">توضیحات کوتاه</label>
                    <input type="text" class="form-control" name="summery" id="summery"
                           placeholder="توضیحات کوتاه را وارد کنید"
                           value="{{ old('summery') }}">
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

                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label"> تگ</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="تگ"
                           value="{{ old('meta_keywords') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="type" class="control-label">نوع دوره</label>
                    <select name="type" id="type" class="form-control">
                        {{--                   <option value="vip">اعضای ویژه</option>--}}
                        <option value="cash">نقدی</option>
                        <option value="free" selected>رایگان</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="slug" class="control-label">ادرس اینترنتی :</label>
                    <input type="text" class="form-control" name="slug" id="slug"
                           placeholder="ادرس اینترنتی را وارد کنید"
                           value="{{ old('slug') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="body" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="body" id="body"
                              placeholder="متن مقاله را وارد کنید">{{ old('body') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images" class="control-label">تصویر دوره</label>
                    <input type="file" class="form-control" name="images" id="images"
                           placeholder="تصویر مقاله را وارد کنید" value="{{ old('imageUrl') }}">
                </div>
                <div class="col-sm-6">
                    <label for="price" class="control-label">قیمت</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="قیمت ها را وارد کنید"
                           value="{{ old('price') }}">
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
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید"
                           value="{{ old('tags') }}">
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
