@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش پادکست</h2>
        </div>
        <form class="form-horizontal" action="{{ route('podcast.update' ,  $podcast->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">عنوان پادکست</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value="{{ $podcast->title }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">نوع رادیو</label>
                    <select name="type" id="type" class="form-control">
                        <option value="vip" {{ $podcast->type == 'vip' ? 'selected' : '' }}>اعضای ویژه</option>
                        <option value="cash" {{ $podcast->type == 'cash' ? 'selected' : '' }}>نقدی</option>
                        <option value="free" {{ $podcast->type == 'free' ? 'selected' : '' }}>رایگان</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="body" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="body" id="body" placeholder="متن رادیو را وارد کنید">{{ $podcast->body }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="slugvoice" class="control-label">slugvoice</label>
                    <input type="text" class="form-control" name="slugvoice" id="slugvoice" placeholder="لینک رادیو را وارد کنید ..." value="{{ $podcast->slugvoice }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">writer</label>
                    <input type="text" class="form-control" name="writer" id="writer" placeholder="نام نویسنده را وارد کنید" value="{{ $podcast->writer }}">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="summery" class="control-label">summery</label>
                    <input type="text" class="form-control" name="summery" id="summery" placeholder="j,qdphj oghwi را وارد کنید" value="{{ $podcast->summery }}">
                </div>
                <div class="col-sm-6">
                    <label for="speaker" class="control-label">speaker</label>
                    <input type="text" class="form-control" name="speaker" id="speaker" placeholder="نام گوینده را وارد کنید" value="{{ $podcast->speaker }}">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="review" class="control-label">review</label>
                    <input type="text" class="form-control" name="review" id="review" placeholder="نظر کارشناس را وارد کنید" value="{{ $podcast->review }}">
                </div>
                <div class="col-sm-6">
                    <label for="voice" class="control-label">voice</label>
                    <input type="text" class="form-control" name="voice" id="voice" placeholder="صدا را وارد کنید" value="{{ $podcast->voice }}">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="dpdfCount" class="control-label">dpdfCount</label>
                    <input type="text" class="form-control" name="dpdfCount" id="dpdfCount" placeholder="تعداد دانلود پی دی اف را وارد کنید" value="{{ $podcast->dpdfCount }}">
                </div>
                <div class="col-sm-6">
                    <label for="linkb" class="control-label">linkb</label>
                    <input type="text" class="form-control" name="linkb" id="linkb" placeholder="لینک بیلبورد را وارد کنید" value="{{ $podcast->linkb }}">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label">meta_desc</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc" placeholder="توضیحات سئو را وارد کنید" value="{{ $podcast->meta_desc }}">
                </div>
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label">meta_title</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="عنوان سئو را وارد کنید" value="{{ $podcast->meta_title }}">
                </div>

            </div>

            <div class="form-group">

                <div class="col-sm-12">
                    <label for="meta_keywords" class="control-label">meta_keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="کلمات کلیدی سئو را وارد کنید"
                           value="{{ $podcast->meta_keywords }}">
                </div>
            </div>









            <div class="form-group">
                <div class="col-sm-12">
                    <label for="images" class="control-label">تصویر رادیو</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر رادیو را وارد کنید">
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        @foreach( $podcast->images['images'] as $key => $image)
                            <div class="col-sm-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $podcast->images['thumb'] == $image ? 'checked' : '' }} />
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
                    <input type="text" class="form-control" name="price" id="price" placeholder="قیمت ها را وارد کنید" value="{{ $podcast->price }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید" value="{{ $podcast->tags }}">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ویرایش</button>
                </div>
            </div>
        </form>
    </div>
@endsection
