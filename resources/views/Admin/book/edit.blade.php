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
            <h2>ایجاد کتاب</h2>
        </div>
        <form class="form-horizontal" action="{{ route('books.update' , $book->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="control-label">عنوان کتاب :</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید"
                           value="{{ $book->title }}">
                </div>
                <div class="col-sm-6">
                    <label for="voice" class="control-label"> صدا : </label>
                    <input type="text" class="form-control" name="voice" id="voice"
                           placeholder="صدا"
                           value="{{ $book->voice }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="linkb" class="control-label"> لینک بیلبورد :</label>
                    <input type="text" class="form-control" name="linkb" id="linkb"
                           placeholder="لینک بیلبورد"
                           value="{{ $book->linkb }}">
                </div>
                <div class="col-sm-6">
                    <label for="review" class="control-label">نظرکارشناس :</label>
                    <input type="text" class="form-control" name="review" id="writer"
                           placeholder="نظر در باره ..."
                           value="{{ $book->review }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="speaker" class="control-label">گوینده :</label>
                    <input type="text" class="form-control" name="speaker" id="speaker"
                           placeholder="توضیحات کوتاه را وارد کنید"
                           value="{{ $book->speaker }}">
                </div>
                <div class="col-sm-6">
                    <label for="writer" class="control-label">نویسنده :</label>
                    <input type="text" class="form-control" name="writer" id="writer"
                           placeholder="توضیحات کوتاه را وارد کنید"
                           value="{{ $book->writer }}">
                </div>
            </div>

            <hr>


            <div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="summery" class="control-label">توضیحات کوتاه</label>
                        <input type="text" class="form-control" name="summery" id="summery"
                               placeholder="توضیحات کوتاه را وارد کنید"
                               value="{{ $book->summery }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="body" class="control-label">متن</label>
                        <textarea rows="5" class="form-control" name="body" id="body"
                                  placeholder="متن مقاله را وارد کنید">{{ $book->body }}</textarea>
                    </div>
                </div>
            </div>


            <hr>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label"> عنوان سئو :</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                           placeholder="عنوان سئو"
                           value="{{ $book->meta_title }}">
                </div>
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label"> توضیحات سئو:</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           placeholder="توضیحات سئو"
                           value="{{ $book->meta_desc }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label"> تگ</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                           placeholder="تگ"
                           value="{{ $book->meta_keywords }}">
                </div>
                <div class="col-sm-6">
                    <label for="type" class="control-label">نوع دوره</label>
                    <select name="type" id="type" class="form-control">
                        <option value="cash">نقدی</option>
                        <option value="free" selected>رایگان</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <label for="images" class="control-label">تصویر رادیو</label>
                    <input type="file" class="form-control" name="images" id="images"
                           placeholder="تصویر رادیو را وارد کنید">
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        @foreach( $book->images['images'] as $key => $image)
                            <div class="col-sm-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb"
                                           value="{{ $image }}" {{ $book->images['thumb'] == $image ? 'checked' : '' }} />
                                    <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="price" class="control-label">قیمت</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="قیمت ها را وارد کنید"
                           value="{{ $book->price }}">
                </div>

                    <div class="col-sm-6">
                        <label for="title" class="control-label">زبان مقاله</label>
                        <select name="lang" id="lang" class="form-control">
                            <option value="fa" {{ $book->lang == 'fa' ? 'selected' : '' }}>فارسی</option>
                            <option value="en" {{ $book->lang == 'en' ? 'selected' : '' }}>انگلیسی</option>
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
