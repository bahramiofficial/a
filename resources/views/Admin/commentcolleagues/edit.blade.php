@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('comment', {
            filebrowserUploadUrl: '/admin/panel/upload-image',
            filebrowserImageUploadUrl: '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش نظر همکاران </h2>
        </div>
        <form class="form-horizontal" action="{{ route('colleague.update',$colleague->id) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('put')}}
            @include('Admin.section.errors')


            <div class="form-group">
                <div class="col-sm-6">
                    <label for="name" class="control-label">نام :</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="نام را وارد کنید"
                           value="{{ $colleague->name }}">
                </div>
                <div class="col-sm-6">
                    <label for="family" class="control-label">نام خانوادگی:</label>
                    <input type="text" class="form-control" name="family" id="family" placeholder="نام خانوادگی را وارد کنید"
                           value="{{ $colleague->family }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-3">
                    <label for="score" class="control-label">امتیاز پست :</label>
                    <input type="number" class="form-control" name="score" id="score" max="5" min="0"
                           placeholder="امتیاز پست را وارد کنید"
                           value="{{ $colleague->score }}">
                </div>

                <div class="col-sm-9">
                    <label for="position" class="control-label">سمت  :</label>
                    <input type="text" class="form-control" name="position" id="position"
                           placeholder="سمت را وارد کنید"  value="{{ $colleague->position }}">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="comment" class="control-label"> نظر :</label>
                    <textarea rows="5" class="form-control" name="comment" id="comment"
                              placeholder="متن مقاله را وارد کنید">{{ $colleague->comment }}</textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <label for="lang" class="control-label">زبان مقاله</label>
                    <select name="lang" id="lang" class="form-control">
                        <option value="fa" {{ $colleague->lang == 'fa' ? 'selected' : '' }}>فارسی</option>
                        <option value="en" {{ $colleague->lang == 'en' ? 'selected' : '' }}>انگلیسی</option>
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
