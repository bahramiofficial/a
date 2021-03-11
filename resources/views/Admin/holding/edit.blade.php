@extends('Admin.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش پست اینستا</h2>
        </div>
        <form class="form-horizontal" action="{{ route('holding.update',$holding->id) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('put')}}
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="title" class="control-label">عنوان :</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید"
                           value="{{ $holding->title }}">
                </div>
                <div class="col-sm-6">
                    <label for="summary" class="control-label">خلاصه :</label>
                    <input type="text" class="form-control" name="summary" id="summary" placeholder="خلاصه را وارد کنید"
                           value="{{ $holding->summary }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="subheadings" class="control-label">زیر عنوان :</label>
                    <input type="text" class="form-control" name="subheadings" id="subheadings"
                           placeholder="زیر عنوان را وارد کنید"
                           value="{{ $holding->subheadings }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="description" id="description"
                              placeholder="متن مقاله را وارد کنید">{{ $holding->description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_desc" class="control-label"> توضیحات سئو :</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                           placeholder="توضیحات سئو را وارد کنید" value="{{ $holding->meta_desc }}">
                </div>
                <div class="col-sm-6">
                    <label for="meta_title" class="control-label"> عنوان سئو</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                           placeholder="عنوان سئو  را وارد کنید"
                           value="{{ $holding->meta_title }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images" class="control-label">تصویر</label>
                    <input type="file" class="form-control" name="images" id="images"
                           placeholder="تصویر دوره را وارد کنید">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        @foreach( $holding->images['images'] as $key => $image)
                            <div class="col-sm-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb"
                                           value="{{ $image }}" {{ $holding->images['thumb'] == $image ? 'checked' : '' }} />
                                    <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <label for="lang" class="control-label">زبان مقاله</label>
                    <select name="lang" id="lang" class="form-control">
                        <option value="fa" {{ $holding->lang == 'fa' ? 'selected' : '' }}>فارسی</option>
                        <option value="en" {{ $holding->lang == 'en' ? 'selected' : '' }}>انگلیسی</option>
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
