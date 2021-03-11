@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش پست اینستا</h2>
        </div>
        <form class="form-horizontal" action="{{ route('instagram.update',$instagram->id) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('put')}}
            @include('Admin.section.errors')


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="control-label">عنوان پست :</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید"
                           value="{{$instagram->title}}">
                </div>
                <div class="col-sm-6">
                    <label for="link" class="control-label">لینک پست :</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="لینک را وارد کنید"
                           value="{{$instagram->link}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images1" class="control-label">تصویر شماره1</label>
                    <input type="file" class="form-control" name="images1" id="images1" placeholder="تصویر دوره را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        @foreach( $instagram->images['images'] as $key => $image)
                            <div class="col-sm-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $instagram->images['thumb'] == $image ? 'checked' : '' }} />
                                    <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="تگ ها را وارد کنید"
                           value="{{ $instagram->meta_keywords}}">
                </div>
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label">عنوان سئو :</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="تگ ها را وارد کنید"
                           value="{{ $instagram->meta_title }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="meta_desc" class="control-label">توضیحات سئو :</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           placeholder="تصویر پست را وارد کنید"
                           value="{{ $instagram->meta_desc}}">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="lang" class="control-label">زبان مقاله</label>
                    <select name="lang" id="lang" class="form-control">
                        <option value="fa" {{ $instagram->lang == 'fa' ? 'selected' : '' }}>فارسی</option>
                        <option value="en" {{ $instagram->lang == 'en' ? 'selected' : '' }}>انگلیسی</option>
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
