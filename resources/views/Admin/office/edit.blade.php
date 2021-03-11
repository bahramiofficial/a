@extends('Admin.master')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد دفتر</h2>
        </div>
        <form class="form-horizontal" action="{{ route('office.update',$office->id) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}

            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="country" class="control-label">کشور :</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="کشور را وارد کنید"
                    value="{{$office->country}}">

                </div>

                <div class="col-sm-6">
                    <label for="address" class="control-label">ادرس :</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="ادرس را وارد کنید"
                           value="{{$office->address}}">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="Phone" class="control-label">تلفن :</label>
                    <input type="Phone" class="form-control" name="Phone" id="Phone" placeholder="تلفن را وارد کنید"
                           value="{{$office->Phone}}">

                </div>

                <div class="col-sm-6">
                    <label for="email" class="control-label">ایمیل :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل را وارد کنید"
                           value="{{$office->email}}">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="lat" class="control-label">lat :</label>
                    <input type="text" class="form-control" name="lat" id="Phone" placeholder="تلفن را وارد کنید"
                           value="{{$office->lat}}">

                </div>

                <div class="col-sm-6">
                    <label for="lng" class="control-label">lng :</label>
                    <input type="text" class="form-control" name="lng" id="lng" placeholder="ایمیل را وارد کنید"
                           value="{{$office->lng}}">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="meta_keywords" class="control-label">کلمه کلیدی :</label>
                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="کلمه کلیدی را وارد کنید"
                    value="{{$office->meta_keywords}}">

                </div>

                <div class="col-sm-6">
                    <label for="meta_title" class="control-label">meta_title :</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="ایمیل را وارد کنید"
                           value="{{$office->meta_title}}">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="meta_desc" class="control-label">meta_desc :</label>
                    <input type="text" class="form-control" name="meta_desc" id="meta_desc" placeholder="تلفن را وارد کنید"
                           value="{{$office->meta_desc}}">

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
