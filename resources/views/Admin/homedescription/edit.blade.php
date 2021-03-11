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
            <h2>توضیحات</h2>
        </div>
        <form class="form-horizontal" action="{{ route('homedescription.update' ,  $description->id) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="control-label">عنوان:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید"
                    value="{{$description->title}}">
                </div>
                <div class="col-sm-6">
                    <label for="link" class="control-label">لینک:</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="لینک را وارد کنید"
                           value="{{$description->link}}">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">متن توضیحات :</label>
                    <textarea rows="5" class="form-control" name="description" id="description" placeholder="متن توضیحات را وارد کنید">{{$description->description}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="summary" class="control-label">توضیحات کوتاه :</label>
                    <input type="text" class="form-control" name="summary" id="summary" placeholder="توضیحات کوتاه را وارد کنید"
                           value="{{$description->summary}}">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images1" class="control-label">تصویر شماره1</label>
                    <input type="file" class="form-control" name="images1" id="images1" placeholder="تصویر دوره را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        @foreach( $description->images1['images'] as $key => $image)
                            <div class="col-sm-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb1" value="{{ $image }}" {{ $description->images1['thumb'] == $image ? 'checked' : '' }} />
                                    <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="images2" class="control-label">تصویر شماره2</label>
                    <input type="file" class="form-control" name="images2" id="images2" placeholder="تصویر دوره را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        @foreach( $description->images2['images'] as $key => $image)
                            <div class="col-sm-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb2" value="{{ $image }}" {{ $description->images2['thumb'] == $image ? 'checked' : '' }} />
                                    <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                    <div class="col-sm-6">
                        <label for="images3" class="control-label">تصویر شماره3</label>
                        <input type="file" class="form-control" name="images3" id="images3" placeholder="تصویر دوره را وارد کنید">
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            @foreach( $description->images3['images'] as $key => $image)
                                <div class="col-sm-2">
                                    <label class="control-label">
                                        {{ $key }}
                                        <input type="radio" name="imagesThumb3" value="{{ $image }}" {{ $description->images3['thumb'] == $image ? 'checked' : '' }} />
                                        <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>


                <div class="col-sm-6">
                    <label for="type" class="control-label">موقعیت توضیحات :</label>
                    <select name="type" id="type" class="form-control">
                        <option value="top" {{ $description->type == 'top' ? 'selected' : '' }}>بالا</option>
                        <option value="down" {{ $description->type == 'down' ? 'selected' : '' }}>پایین</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label">توضیحات سئو:</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc" placeholder="توضیحات سئو را وارد کنید"
                           value="{{$description->meta_desc}}">

                </div>
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label">عنوان سئو:</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="عنوان سئو را وارد کنید"
                           value="{{$description->meta_title}}">
                </div>

            </div>

            <div class="form-group">
                    <div class="col-sm-12">
                        <label for="meta_keywords" class="control-label">کلمه کلیدی :</label>
                        <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                               placeholder="کلمه کلیدی را وارد کنید" value="{{$description->meta_keywords}}">

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
